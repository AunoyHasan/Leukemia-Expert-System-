<?php

namespace App\Http\Controllers;

use session;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\PatientDoctor;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function indexPage(){
        return view('index.index');
    }

    public function signup(){
        return view('doctor.signup');
    }

    public function signupSubmit(Request $request){
        $this->validate($request,
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'email' => 'required|unique:doctors',
                'password'=>'required|min:6',
            ],
            [
                'name.required'=>'Please provide name',
                'email.required'=>'Please provide email',
                'password.required'=>'Please provide password',
            ]
        );

        $doctor = new Doctor();
        $doctor->name               =       $request->name;
        $doctor->email              =       $request->email;
        $doctor->password           =       md5($request->password);
        $doctor->gender             =       $request->gender;
        $doctor->age                =       $request->age;
        $doctor->address            =       $request->address;
        $doctor->contact_number     =       $request->contact_number;

        if($doctor->save()){
            session()->flash('message', 'New Doctor Has Registered Successfully');
            return redirect()->route('doctor.login');
        }
    }

    public function login(){
        return view('doctor.login');
    }

    public function loginsubmit(Request $request){
        $this->validate($request,
            [
                'email'     => 'required',
                'password'  => 'required|min:6',
            ],
            [
                'email.required'      =>   'Please provide email',
                'password.required'   =>   'Please provide password',
            ]
        );
        $doctor = Doctor::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if($doctor){
            session()->put('logged_name', $doctor->name);
            session()->put('logged_id', $doctor->id);
            $doctor_id = $doctor->id;
            return redirect()->route('doctor.index');
        }

        session()->flash('message', 'Email Password Invalid');
        return redirect()->route('doctor.login');
    }

    public function getList(Request $request){
        try {
            $data = Patient::select('id', 'name', 'email', 'status')
                ->orderBy('id', 'DESC')
                ->where('doctor_id', $request->session()->get('logged_id'))
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
                        $patientDiagnosis = '<a href="' . route('disease.check', $data->id) . '" class="btn btn-sm btn-warning" title="Symptom"><i class=\'bx bxs-edit-alt\'>Start Diagnosis</i></a>';
                        $history = '<a href="' . route('disease.history', $data->id) . '" class="btn btn-sm btn-info" title="Symptom"><i class=\'bx bxs-edit-alt\'>History</i></a>';
                    return '<div class = "btn-group">'. $patientShow . $patientEdit . $patientDelete . $patientDiagnosis . $history .'</div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function index(){
        return view('doctor.index');
    }

    public function logout(){
        session()->flush();
        // $request->session()->flash('status', 'Task was successful!');
        return redirect()->route('doctor.login');
    }

    public function patient_doctor(){

    }
}
