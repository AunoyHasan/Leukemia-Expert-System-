<?php

namespace App\Http\Controllers;
use App\Models\Marker;

// use Session;
use App\Models\CbcCPbf;
use App\Models\Disease;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\BoneMarrow;
use Illuminate\Http\Request;
use App\Models\PatientDoctor;
use App\Models\PatientSymptom;
use App\Http\Controllers\Controller;
use App\Models\Biochemistry;
use App\Models\Radiological;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Session\Session;


class PatientController extends Controller
{
    public function getList(Request $request)
    {
        try {
            // $doctorIds = PatientDoctor::where('doctor_id', $request->session()->get('logged_id'))->get();
            $data = Patient::select('id', 'name', 'email', 'status')
                ->orderBy('id', 'DESC')
                ->get();

            return DataTables::of($data)->addIndexColumn()
                //status
                ->addColumn('status', function ($data) {
                        $button = ' <div class="form-check form-switch">';
                        $button .= ' <input onclick="statusConfirm(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';

                        if ($data->status == 1) {
                            $button .= "checked";
                        }
                        $button .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';

                        return $button;
                })
                //Action
                ->addColumn('action', function ($data) {
                        $patientShow = '<a href="' . route('patient.show', $data->id) . '" class="btn btn-sm btn-info" title="view"><i class=\'bx bxs-low-vision\'>Show</i></a>';
                        $patientEdit = '<a href="' . route('patient.edit', $data->id) . '" class="btn btn-sm btn-warning" title="edit"><i class=\'bx bxs-edit-alt\'>Edit</i></a>';
                        $patientDelete = '<a href="' . route('patient.destroy', $data->id) . '" class="btn btn-sm btn-danger" title="delete"><i class=\'bx bxs-edit-alt\'>Delete</i></a>';
                        $patientProblem = '<a href="' . route('disease.check', $data->id) . '" class="btn btn-sm btn-success" title="Symptom"><i class=\'bx bxs-edit-alt\'>Start Diagnosis</i></a>';
                        $history = '<a href="' . route('disease.history', $data->id) . '" class="btn btn-sm btn-primary" title="Symptom"><i class=\'bx bxs-edit-alt\'>History</i></a>';
                    return '<div class = "btn-group">'. $patientShow . $patientEdit . $patientDelete . $patientProblem . $history .'</div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            return view('patient.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function create(Request $request){
        return view('patient.create');
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'email' => 'required|unique:patients',
            ]
        );

        $patient = new Patient();
        $patient->doctor_id          =       $request->session()->get('logged_id');
        $patient->name               =       $request->name;
        $patient->email              =       $request->email;
        $patient->gender             =       $request->gender;
        $patient->age                =       $request->age;
        $patient->blood_group        =       $request->blood_group;
        $patient->height             =       $request->height;
        $patient->weight             =       $request->weight;
        $patient->bmi                =       $request->bmi;
        $patient->address            =       $request->address;
        $patient->contact_number     =       $request->contact_number;
        $patient->save();

        $doctorPatient = new PatientDoctor();
        $doctorPatient->patient_id  =   $patient->id;
        $doctorPatient->doctor_id   =   $request->session()->get('logged_id');
        $doctorPatient->save();

        session()->flash('message', 'New Patient Has Added Successfully');
        return redirect()->route('patient.index');
    }

    public function edit($id){
        $patient_id = $id;
        $patient = Patient::findOrFail($id);
        return  view('patient.edit', compact('patient', 'patient_id'));
    }

    public function update(Request $request){
        $patient = Patient::findOrFail($request->patient_id);
        $patient->name               =       $request->name;
        $patient->email              =       $request->email;
        $patient->gender             =       $request->gender;
        $patient->age                =       $request->age;
        $patient->address            =       $request->address;
        $patient->contact_number     =       $request->contact_number;

        $patient->update();
        session()->flash('message', 'Patient Updated Successfully');
        return redirect()->route('patient.index');

    }

    // Delete
    public function destroy($id){
        $patient = Patient::where('id', $id)->delete();
        session()->flash('message', 'Patient Deleted Successfully');
        return redirect()->route('patient.index');
    }

    //status
    public function changeStatus(Patient $patient)
    {
        try {
            if ($patient->status == 1) {
                $patient->status = 0;
                $patient->update();
                session()->flash('message', 'Patient Status Change Successfully');
                return redirect()->route('patient.index');
            }

            $patient->status = 1;
            $patient->update();
            session()->flash('message', 'Patient Status Change Successfully');
            return redirect()->route('patient.index');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // information
    public function information($id){
        $patient = Patient::findOrFail($id);
        return view('patient.information', compact('patient'));
    }

    // symptoms
    public function symptoms($id){
        $patientSymptom =  PatientSymptom::where('patient_id', $id)->first();
        $symptomIds = json_decode($patientSymptom->symptom_id);
        $symptoms = Symptom::whereIn('id', $symptomIds)->get();
        return view('patient.symptoms', compact('symptoms'));
    }

    // CBC
    public function cbcView($id){
        $cbc =  CbcCPbf::where('patient_id', $id)->first();
        return view('patient.cbc', compact('cbc'));
    }

    // Bone
    public function boneView($id){
        $bone =  BoneMarrow::where('patient_id', $id)->first();
        $markers = json_decode($bone->markers);
        return view('patient.bone', compact('bone', 'markers'));
    }

    // bio-chemistry
    public function bioChemistry($id){
        $bio =  Biochemistry::where('patient_id', $id)->first();
        return view('patient.bio-chemistry', compact('bio'));
    }

    // radio
    public function radio($id){
        $radio =  Radiological::where('patient_id', $id)->first();
        return view('patient.radio', compact('radio'));
    }

}
