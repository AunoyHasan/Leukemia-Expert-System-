<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\CbcCPbf;
use App\Models\Disease;
use App\Models\History;
use App\Models\Patient;
use App\Models\Symptom;
use App\Models\BoneMarrow;
use App\Models\Biochemistry;
use App\Models\Radiological;
use Illuminate\Http\Request;
use App\Models\PatientSymptom;

class DiseaseController extends Controller
{
    public function diseaseHistroy($id){
        $patient_id = $id;
        $histories = History::select('id', 'patient_id', 'test', 'symptom_id', 'disease', 'disease_level', 'date')->where('patient_id', $id)->get();
        $symtomIds = [];
        foreach( $histories as  $history){
            $symtomIds[] = (array)json_decode($history->symptom_id);
        }
        $arraySingle = array_unique(call_user_func_array('array_merge', $symtomIds));
        $symtoms = Symptom::whereIn('id', $arraySingle)->get();
        $symptomNames= '';
        foreach($symtoms as $key=>$item) {
            $symptomNames .= $item->name.", ";
        }
        $symptomNames = substr($symptomNames, 0, -2);
        return view('disease.history', compact('histories', 'patient_id', 'symptomNames'));
    }

    public function diseaseCheck($id){
        $patient_id     =   $id;
        $p_symptom      =   PatientSymptom::where('patient_id', $id)->first();
        $cbc_test       =   CbcCPbf::where('patient_id', $id)->first();
        $bone_marrow    =   BoneMarrow::where('patient_id', $id)->first();
        $biochemistry   =   Biochemistry::where('patient_id', $id)->first();
        $radiology      =   Radiological::where('patient_id', $id)->first();
        if($p_symptom != ''){
            if($cbc_test != ''){
                if($bone_marrow != ''){
                    if($biochemistry != ''){
                        if($radiology != ''){
                            $latestHistory = History::latest()->first();
                            $disease       = $latestHistory->disease;
                            if( ($radiology->chest_xray >=  '100' || $radiology->chest_xray <= '200') && $radiology->xray_bone_and_spine  == 'altered_medulary_cavity' && $radiology->usg_leukemic_infaction == 'yes' && $radiology->usg_intraabdeminal  == 'yes'){
                                return view('diagnosis.radiological_bad_condition', compact('patient_id', 'radiology', 'disease'));
                            }
                            else{
                                return view('diagnosis.radiological_good_condition', compact('patient_id', 'radiology', 'disease'));
                            }
                        }else{
                            $latestHistory = History::latest()->first();
                            $disease       = $latestHistory->disease;
                            if( ($biochemistry->uric_acid == 'normal' || $biochemistry->uric_acid == 'increase') && $biochemistry->electrolyte  == 'is_hyperkalemia' && $biochemistry->pog_2 == 'is_hyperphosphatemia' && $biochemistry->ca_2 == 'is_hypocalcemia' && $biochemistry->ldh == 'increase'){
                                return view('diagnosis.biochemisty_bad_condition', compact('patient_id', 'disease', 'biochemistry'));
                            }
                            else{
                                return view('diagnosis.biochemisty_good_condition', compact('patient_id', 'disease', 'biochemistry'));
                            }
                        }
                    }
                    else{
                        $boneMarrow =  BoneMarrow::where('patient_id', $patient_id)->first();
                        $markers = json_decode($boneMarrow->markers);
                        if($bone_marrow->myloid == 'erythroid_ratio_altrud' && $bone_marrow->blast_cell == 'yes' && $bone_marrow->periodic_acid == 'positive'  && $bone_marrow->acid_phosphatex  == 'positive'){
                            $markers = json_decode($boneMarrow->markers);
                            return view('diagnosis.all', compact('patient_id', 'boneMarrow', 'markers'));
                        }
                        else if($bone_marrow->myloid == 'not_erythroid_ratio_altrud'  && $bone_marrow->blast_cell == 'yes' && $bone_marrow->sudan_black == 'positive' && $bone_marrow->myelopsroxidsx  == 'positive'){
                            $markers = json_decode($boneMarrow->markers);
                            return view('diagnosis.aml', compact('patient_id', 'boneMarrow', 'markers'));
                        }
                        else{
                            return view('disease.bone-marrow-test-not-leukemia', compact('patient_id', 'boneMarrow', 'markers'));
                        }
                    }
                }
                else{
                    $cbc =  CbcCPbf::where('patient_id', $patient_id)->first();
                    if( ($cbc->hemoglobin <= 13) && ($cbc->platelet  <= 150000000000) && ($cbc->white_blood_cell >= 3000000007)&& ($cbc->red_blood_cell <= -4999999995)){
                        return view('disease.bone-marrow-test-suggest', compact('patient_id', 'cbc'));
                    }else{
                        return view('disease.cbc-test-not-leukemia', compact('patient_id', 'cbc'));
                    }
                }
            }
            else{
                $patientSymptom =  PatientSymptom::where('patient_id', $patient_id)->first();
                $symptomIds     =  json_decode($patientSymptom->symptom_id);
                $symptoms       =  Symptom::whereIn('id', $symptomIds)->get();
                return view('disease.cbc-test-suggest', compact('patient_id', 'symptoms'));
            }
        }
        else{
            $symptoms = Symptom::all();
            return view('disease.check', compact('symptoms', 'patient_id'));
        }
    }

    public function diseaseCheckSubmit(Request $request){
        $patient_id = $request->patient_id;
        $patinetSymptom              =  new PatientSymptom();
        $patinetSymptom->date        =  now();
        $patinetSymptom->patient_id  =  $patient_id;
        $patinetSymptom->symptom_id  =  json_encode($request->symptom_id);
        $patinetSymptom->note        =  $request->note;
        $patinetSymptom->save();

        $history                =  new History();
        $history->date          =  now();
        $history->patient_id    =  $patient_id;
        $history->suggest_test  =  '---';
        $history->test          =  '---';
        $history->disease_level =  '---';
        $history->disease       =  '---';
        $history->symptom_id    =  json_encode($request->symptom_id);
        $history->save();

        $patientSymptom =  PatientSymptom::where('patient_id', $patient_id)->first();
        $symptomIds     =  json_decode($patientSymptom->symptom_id);
        $symptoms       =  Symptom::whereIn('id', $symptomIds)->get();

        $patientSymtoms = $request->symptom_id;
        if(sizeof($patientSymtoms)>3){
            return view('disease.cbc-test-suggest', compact('patient_id', 'symptoms'));
        }else{
            return view('disease.symptom-not-leukemia', compact('patient_id', 'symptoms'));
            return "Not Leukemia";
        }
    }

    // CBC C PBF Start
    public function CBC_pathelogical_view($id){
        $patient_id = $id;
        return view('disease.cbc-test-view', compact('patient_id'));
    }

    public function CBC_pathelogical(Request $request){
        $patient_id = $request->patient_id;
        $cbcCpbf                    =   new CbcCPbf();
        $cbcCpbf->patient_id        =   $request->patient_id;
        $cbcCpbf->date              =   now();
        $cbcCpbf->hemoglobin        =   $request->hemoglobin;
        $cbcCpbf->platelet          =   $request->platelet;
        $cbcCpbf->white_blood_cell  =   $request->white_blood_cell;
        $cbcCpbf->red_blood_cell    =   $request->red_blood_cell;

        if ($request->has('report')) {
            $imageUploade = $request->file('report');
            $imageName = time() . '.' . $imageUploade->getClientOriginalExtension();
            $imagePath = public_path('images/cbc-c-pbf/');
            $imageUploade->move($imagePath, $imageName);
            $cbcCpbf->report = $imageName;
        } else {
            $cbcCpbf->report = 'cbc.jpg';
        }
        $cbcCpbf->save();

        // History
        $history                  =  new History();
        $history->date            =  now();
        $history->patient_id      =  $request->patient_id;
        $history->test            =  "CBC C PBF";
        $history->suggest_test    =  '---';
        $history->disease_level   =  '---';
        $history->disease         =  '---';

        $patient = Patient::findOrFail($patient_id);
        if($patient->gender == 1){
            if( ($request->hemoglobin        <=  13) &&
                ($request->platelet          <= 150000000000)&&
                ($request->white_blood_cell  >= 3000000007)&&
                ($request->red_blood_cell    <= -4999999995)
            ){
                $history->disease_level   =     "Possiblity that Leukemia";
            }
            else{
                $history->disease_level   =     "No Leukemia";
            }
        }

        if($patient->gender == 2){
            if( ($request->hemoglobin        <=  12.2) &&
                ($request->platelet          <= 150000000000)&&
                ($request->white_blood_cell  >= 3000000007)&&
                ($request->red_blood_cell    <= -4999999995)
            ){
                $history->disease_level   =     "Possiblity that Leukemia";
            }
            else{
                $history->disease_level   =     "No Leukemia";
            }
        }
        $history->save();

        $cbc =  CbcCPbf::where('patient_id', $patient_id)->first();
        $patient = Patient::findOrFail($patient_id);
        if($patient->gender == 1){
            if( ($request->hemoglobin        <=  13) &&
                ($request->platelet          <= 150000000000)&&
                ($request->white_blood_cell  >= 3000000007)&&
                ($request->red_blood_cell    <= -4999999995)
            ){
                return view('disease.bone-marrow-test-suggest', compact('patient_id', 'cbc'));
            }
            else{
                return view('disease.cbc-test-not-leukemia', compact('patient_id', 'cbc'));
            }
        }

        if($patient->gender == 2){
            if( ($request->hemoglobin        <=  12.2) &&
                ($request->platelet          <= 150000000000)&&
                ($request->white_blood_cell  >= 3000000007)&&
                ($request->red_blood_cell    <= -4999999995)
            ){
                $cbc =  CbcCPbf::where('patient_id', $patient_id)->first();
                return view('disease.bone-marrow-test-suggest', compact('patient_id', 'cbc'));
            }
            else{
                return view('disease.cbc-test-not-leukemia');
            }
        }
    }

    public function CBC_pathelogical_bone_view($id){
        $patient_id = $id;
        $markers = Marker::get();
        return view('disease.bone_marrow-study-view', compact('patient_id', 'markers'));
    }

    public function CBC_pathelogical_bone(Request $request){
        // dd($request->all());
        $patient_id = $request->patient_id;
        $bone_marrow                   =   new BoneMarrow();
        $bone_marrow->patient_id       =   $request->patient_id;
        $bone_marrow->date             =   now();
        $bone_marrow->myloid           =   $request->myloid;
        $bone_marrow->blast_cell       =   $request->blast_cell;
        $bone_marrow->sudan_black      =   $request->sudan_black;
        $bone_marrow->periodic_acid    =   $request->periodic_acid;
        $bone_marrow->myelopsroxidsx   =   $request->myelopsroxidsx;
        $bone_marrow->acid_phosphatex  =   $request->acid_phosphatex;
        $bone_marrow->markers          =   json_encode($request->markers);
        $bone_marrow->note             =   $request->note;

        if ($request->has('report')) {
            $imageUploade = $request->file('report');
            $imageName = time() . '.' . $imageUploade->getClientOriginalExtension();
            $imagePath = public_path('images/bone-marrow/');
            $imageUploade->move($imagePath, $imageName);
            $bone_marrow->report = $imageName;
        } else {
            $bone_marrow->report = 'boneMarrow.jpg';
        }

        $bone_marrow->save();

        // History
        $history              =  new History();
        $history->date        =  now();
        $history->patient_id  =  $request->patient_id;
        $history->test        =  "Bone Marrow Study";

        if($request->periodic_acid    ==  'positive'    &&
            $request->acid_phosphatex ==  'positive'    &&
            $request->myloid          ==  'erythroid_ratio_altrud')
        {
            $history->disease         =   "ALL";
            $history->disease_level   =   "Patient Have ALL Leukemia";
        }

        if($request->sudan_black      ==  'positive'     &&
            $request->myelopsroxidsx  ==  'positive'     &&
            $request->myloid          ==  'not_erythroid_ratio_altrud')
        {
            $history->disease         =   "AML";
            $history->disease_level   =   "Patient Have AML Leukemia";
        }

        if($request->blast_cell == 'no')
        {
            $history->disease         =   "No Leukemia";
            $history->disease_level   =   "Patient does not have any leukemia";
        }

        $history->save();

        $boneMarrow =  BoneMarrow::where('patient_id', $patient_id)->first();
        $markers = json_decode($boneMarrow->markers);
        if( $request->myloid          ==  'erythroid_ratio_altrud'  &&
            $request->blast_cell      ==  'yes'                     &&
            $request->periodic_acid   ==  'positive'                &&
            $request->acid_phosphatex ==  'positive'
        ){
            return view('diagnosis.all', compact('patient_id', 'boneMarrow', 'markers'));
        }

        else if( $request->myloid     ==      'not_erythroid_ratio_altrud'  &&
            $request->blast_cell      ==      'yes'                         &&
            $request->sudan_black     ==      'positive'                    &&
            $request->myelopsroxidsx  ==      'positive'
        ){
            return view('diagnosis.aml', compact('patient_id', 'boneMarrow', 'markers'));
        }

        else{
            return view('disease.bone-marrow-test-not-leukemia', compact('patient_id', 'boneMarrow', 'markers'));
        }
    }


    public function biochemistry_view($id){
        $biochemistry = Biochemistry::where('patient_id', $id)->first();
        $radioLogical = Radiological::where('patient_id', $id)->first();
        $patient_id = $id;
        $markers = Marker::get();
        return view('disease.biochemistry_testing',
            compact('patient_id', 'markers', 'biochemistry', 'radioLogical'));
    }

    public function biochemistry(Request $request){
        $patient_id   =   $request->patient_id;
        $radioLogical = Radiological::where('patient_id', $request->patient_id)->first();
        $biochemistry               =   new Biochemistry();
        $biochemistry->patient_id   =   $request->patient_id;
        $biochemistry->date         =   now();
        $biochemistry->uric_acid    =   $request->uric_acid;
        $biochemistry->electrolyte  =   $request->electrolyte;
        $biochemistry->pog_2        =   $request->pog_2;
        $biochemistry->ca_2         =   $request->ca_2;
        $biochemistry->ldh          =   $request->ldh;
        $biochemistry->note         =   $request->note;

        if ($request->has('report')) {
            $imageUploade = $request->file('report');
            $imageName = time() . '.' . $imageUploade->getClientOriginalExtension();
            $imagePath = public_path('images/biochemistry/');
            $imageUploade->move($imagePath, $imageName);
            $biochemistry->report = $imageName;
        } else {
            $biochemistry->report = 'biochemistry.jpg';
        }
        $biochemistry->save();

        $latestHistory = History::latest()->first();
        $history                    =   new History();
        $history->date              =   now();
        $history->patient_id        =   $request->patient_id;
        $history->disease           =   $latestHistory->disease;
        $history->test              =   "Biochemistry";
        if( ($request->uric_acid    ==  'normal' || $request->uric_acid == 'increase') &&
            $request->electrolyte   ==  'is_hyperkalemia' &&
            $request->pog_2         ==  'is_hyperphosphatemia' &&
            $request->ca_2          ==  'is_hypocalcemia' &&
            $request->ldh           ==  'increase'
        ){
            $history->disease_level = "Not Good";
            $history->suggest_test  = "Radiological Test";
        }else{
            $history->disease_level = "Good";
            $history->suggest_test  = "Radiological Test";
        }

        $history->save();
        $disease = $latestHistory->disease;

        if( ($request->uric_acid    == 'normal' || $request->uric_acid == 'increase') &&
             $request->electrolyte  == 'is_hyperkalemia' &&
             $request->pog_2        == 'is_hyperphosphatemia' &&
             $request->ca_2         == 'is_hypocalcemia' &&
             $request->ldh          == 'increase'
        ){
            $biochemistry =  Biochemistry::where('patient_id', $patient_id)->first();
            return view('diagnosis.biochemisty_bad_condition', compact('patient_id', 'radioLogical', 'disease', 'biochemistry'));
        }
        else{
            $biochemistry =  Biochemistry::where('patient_id', $patient_id)->first();
            return view('diagnosis.biochemisty_good_condition', compact('patient_id', 'radioLogical', 'disease', 'biochemistry'));
        }
    }


    // Radiological Test
    public function radiological_view($id){
        $radioLogical = Radiological::where('patient_id', $id)->first();
        $biochemistry = Biochemistry::where('patient_id', $id)->first();
        $patient_id = $id;
        return view('disease.radiological_testing',
            compact('patient_id', 'radioLogical', 'biochemistry'));
    }

    public function radiological(Request $request){
        $biochemistry = Biochemistry::where('patient_id', $request->patient_id)->first();

        $radioLogical                           =  new Radiological();
        $radioLogical->patient_id               =  $request->patient_id;
        $radioLogical->date                     =  now();
        $radioLogical->chest_xray               =  $request->chest_xray;
        $radioLogical->xray_bone_and_spine      =  $request->xray_bone_and_spine;
        $radioLogical->usg_leukemic_infaction   =  $request->usg_leukemic_infaction;
        $radioLogical->usg_intraabdeminal       =  $request->usg_intraabdeminal;

        if ($request->has('report')) {
            $imageUploade = $request->file('report');
            $imageName = time() . '.' . $imageUploade->getClientOriginalExtension();
            $imagePath = public_path('images/radiological/');
            $imageUploade->move($imagePath, $imageName);
            $radioLogical->report = $imageName;
        } else {
            $radioLogical->report = 'radiological.jpg';
        }

        $radioLogical->save();

        //Histry Start
        $latestHistory = History::latest()->first();
        $history              =  new History();
        $history->date        =  now();
        $history->patient_id  =  $request->patient_id;
        $history->disease     =  $latestHistory->disease;
        $history->test        =  "Radiological";
        $history->suggest_test  = "---";

        if( ($request->chest_xray == '100' || $request->chest_xray == '200') &&
            $request->elexray_bone_and_spinectrolyte  == 'altered_medulary_cavity' &&
            $request->usg_leukemic_infaction  == 'yes' && $request->usg_intraabdeminal  == 'yes'
        ){
            $history->disease_level = "Not Good";
        }else{
            $history->disease_level = "Good";
        }
        $history->save();
        $disease = $latestHistory->disease;
        $patient_id = $request->patient_id;
        if( ($request->chest_xray            ==   '100' || $request->chest_xray == '200') &&
            $request->xray_bone_and_spine    ==   'altered_medulary_cavity' &&
            $request->usg_leukemic_infaction ==   'yes' &&
            $request->usg_intraabdeminal     ==   'yes'
        ){
            $radiology = Radiological::where('patient_id', $request->patient_id)->first();
            return view('diagnosis.radiological_bad_condition', compact('patient_id', 'biochemistry', 'radiology', 'disease'));
        }
        else{
            $radiology = Radiological::where('patient_id', $request->patient_id)->first();
            return view('diagnosis.radiological_good_condition', compact('patient_id', 'biochemistry', 'radiology', 'disease'));
        }

    }

    // Bone Marrow
    // public function pathelogicalBoneMarrow(Request $request){
    //     $patient_id = $request->patient_id;
    //     $cbc_c_pbf                           =       new Radiological();
    //     $cbc_c_pbf->patient_id               =       $request->patient_id;
    //     $cbc_c_pbf->date                     =       now();
    //     $cbc_c_pbf->hemoglobin               =       $request->hemoglobin;
    //     $cbc_c_pbf->platelet                 =       $request->platelet;
    //     $cbc_c_pbf->white_blood_cell         =       $request->white_blood_cell;
    //     $cbc_c_pbf->blest_cell               =       $request->blest_cell;
    //     $cbc_c_pbf->save();

    //     if( $request->hemoglobin        ==      'decrease' &&
    //         $request->platelet          ==      'decrease' &&
    //         $request->white_blood_cell  ==      'increase' &&
    //         $request->blest_cell        ==      'present'
    //     ){
    //         return view('disease.bone_marrow-study-view', compact('patient_id'));
    //     }
    //     else{
    //         return "Not Leukemia";
    //     }
    // }
}
