@extends('layouts.home')

@section('title', 'Radiological Bad Condition')

<style>
    th{
        width: 400px;
    }

    table, th, td {
      border: 1px solid;
    }

    tr:hover {background-color: coral;}

    th {
        background-color: #04AA6D;
        color: black;
    }
</style>

@section('content')

<div>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine"> Biochemistry Testing Result : Bad Condition</div>

        <div class="card-body">
            <table class="table table-bordered" style="text-align: center;">
                <tr>
                    <th>About Pateint</th>
                    <td>
                        <a href="{{ route('pateint.information', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Information</a>
                        <a href="{{ route('pateint.symptoms', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Symptoms</a>
                        <a href="{{ route('pateint.cbc.view', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">CBC C PBF Test</a>
                        <a href="{{ route('pateint.bone.view', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Bone Marrow Study</a>
                        <a href="{{ route('pateint.bioChemistry', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">BioChemistry</a>
                        <a href="{{ route('pateint.radio', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Radiological</a>
                    </td>
                </tr>

                <tr>
                    <th>Disease</th>
                    <td>{{ $disease }}</td>
                </tr>

                <tr>
                    <th>Condition</th>
                    <td>Bad Condition</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<br>
<div>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine">
            <h4>Radiological Information</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-bordered" style="text-align: center">
                        <tbody>
                            <tr>
                                <th>Chest Xray</th>
                                <td>{{ $radiology->chest_xray }}</td>
                            </tr>
                            <tr>
                                <th>Xray Bone And Spine</th>
                                <td>{{ $radiology->xray_bone_and_spine }}</td>
                            </tr>
                            <tr>
                                <th>Usg Leukemic Infaction</th>
                                <td>{{ $radiology->usg_leukemic_infaction }}</td>
                            </tr>
                            <tr>
                                <th>Usg Intraabdeminal</th>
                                <td>{{ $radiology->usg_intraabdeminal }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <img src="{{ asset('images/radiological/'.$radiology->report)}}" alt="Image" class=" img-fluid" style="width: 200px;">
                </div>

            </div>

        </div>
    </div>
</div>

{{-- <div>
    @if (!$biochemistry)
        <div align="center">
            <span style="font-size: 20px">Suggest Test are:</span>
            <a href="{{ route('disease.biochemistry.view', ['id'=>$patient_id]) }}" class="btn btn-success">Biochemitry Testing</a>
        </div>
    @endif
</div> --}}
@endsection
