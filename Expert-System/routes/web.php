<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/doctor/signup',[DoctorController::class,'signup'])->name('doctor.signup');
Route::post('/doctor/signup',[DoctorController::class,'signupSubmit'])->name('doctor.signup.submit');
Route::get('/', [DoctorController::class, 'indexPage'])->name('indexPage');
Route::get('/doctor/login', [DoctorController::class, 'login'])->name('doctor.login');
// Route::get('/', [DoctorController::class, 'login'])->name('doctor.login');
// Route::get('/doctor/login',[DoctorController::class,'login'])->name('doctor.login');
Route::post('/doctor/login',[DoctorController::class,'loginSubmit'])->name('doctor.login.submit');
Route::get('/doctor/index',[DoctorController::class, 'index'])->name('doctor.index')->middleware('doctorAuthorized');
Route::get('/doctor/logout',[DoctorController::class,'logout'])->name('doctor.logout');
Route::get('/patient/list', [DoctorController::class, 'getList'])->name('patient.lists')->middleware('doctorAuthorized');

Route::get('/patient/index',[PatientController::class,'index'])->name('patient.index')->middleware('doctorAuthorized');
Route::get('/patient/create',[PatientController::class,'create'])->name('patient.create')->middleware('doctorAuthorized');
// Route::get('/patient/create/{doctor_id}',[PatientController::class,'create'])->name('patient.create')->middleware('doctorAuthorized');
Route::post('/patient/store',[PatientController::class,'store'])->name('patient.store')->middleware('doctorAuthorized');
Route::get('/patient/show/{id}',[PatientController::class,'show'])->name('patient.show')->middleware('doctorAuthorized');
Route::get('/patient/edit/{id}',[PatientController::class,'edit'])->name('patient.edit')->middleware('doctorAuthorized');
Route::put('/patient/update',[PatientController::class,'update'])->name('patient.update')->middleware('doctorAuthorized');
Route::get('/patient/destroy/{id}',[PatientController::class,'destroy'])->name('patient.destroy')->middleware('doctorAuthorized');
Route::get('/patient/get', [PatientController::class, 'getList'])->name('patient.list')->middleware('doctorAuthorized');
Route::put('patient/change-status/{teacher}', [PatientController::class, 'changeStatus'])->name('patient.change-status')->middleware('doctorAuthorized');

Route::get('patient/information/{id}', [PatientController::class, 'information'])->name('pateint.information')->middleware('doctorAuthorized');
Route::get('patient/symptoms/{id}', [PatientController::class, 'symptoms'])->name('pateint.symptoms')->middleware('doctorAuthorized');
Route::get('patient/cbc/{id}', [PatientController::class, 'cbcView'])->name('pateint.cbc.view')->middleware('doctorAuthorized');
Route::get('patient/bone/{id}', [PatientController::class, 'boneView'])->name('pateint.bone.view')->middleware('doctorAuthorized');
Route::get('patient/bio-chemistry/{id}', [PatientController::class, 'bioChemistry'])->name('pateint.bioChemistry')->middleware('doctorAuthorized');
Route::get('patient/radio/{id}', [PatientController::class, 'radio'])->name('pateint.radio')->middleware('doctorAuthorized');

Route::get('/disease/history/{id}',[DiseaseController::class,'diseaseHistroy'])->name('disease.history')->middleware('doctorAuthorized');
Route::get('/disease/check/{id}',[DiseaseController::class,'diseaseCheck'])->name('disease.check')->middleware('doctorAuthorized');
Route::post('/disease/check/submit',[DiseaseController::class,'diseaseCheckSubmit'])->name('disease.check.submit')->middleware('doctorAuthorized');


Route::get('/disease/biochemistry/view/{id}',[DiseaseController::class,'biochemistry_view'])->name('disease.biochemistry.view')->middleware('doctorAuthorized');
Route::post('/disease/biochemistry/submit',[DiseaseController::class,'biochemistry'])->name('disease.biochemistry.submit')->middleware('doctorAuthorized');

Route::get('/disease/radiological/view/{id}',[DiseaseController::class,'radiological_view'])->name('disease.radiological.view')->middleware('doctorAuthorized');
Route::post('/disease/radiological/submit',[DiseaseController::class,'radiological'])->name('disease.radiological.submit')->middleware('doctorAuthorized');

Route::get('/disease/pathelogical/cbc/view/{id}',[DiseaseController::class,'CBC_pathelogical_view'])->name('disease.pathelogical.cbc.view')->middleware('doctorAuthorized');
Route::post('/disease/pathelogical/cbc',[DiseaseController::class,'CBC_pathelogical'])->name('disease.pathelogical.cbc')->middleware('doctorAuthorized');

Route::get('/disease/pathelogical/bone/view/{id}',[DiseaseController::class,'CBC_pathelogical_bone_view'])->name('disease.pathelogical.bone.view')->middleware('doctorAuthorized');
Route::post('/disease/pathelogical/bone',[DiseaseController::class,'CBC_pathelogical_bone'])->name('disease.pathelogical.bone')->middleware('doctorAuthorized');

Route::post('/disease/pathelogical/bone/marrow',[DiseaseController::class,'pathelogicalBoneMarrow'])->name('disease.pathelogical.bone.marrow')->middleware('doctorAuthorized');
// Route::get('/disease/index',[DiseaseController::class,'index'])->name('diagnosis.index');

Route::get('/diagnosis/index',[DiagnosisController::class,'index'])->name('diagnosis.index')->middleware('doctorAuthorized');

Route::post('/patient-doctor',[DoctorController::class,'patient_doctor'])->name('patient_doctor')->middleware('doctorAuthorized');
