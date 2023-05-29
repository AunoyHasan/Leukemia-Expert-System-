@extends('layouts.home')

@section('title', 'Bone Marrow Test Suggestion')

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
            <div class="card-header" style="text-align: center; background-color:aquamarine"><h4>About Patient</h4></div>
            <div class="card-body">
                <table class="table table-bordered" style="text-align: center">
                    <tr>
                        <th>Patient Information</th>
                        <td>
                            <a href="{{ route('pateint.information', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Information</a>
                            <a href="{{ route('pateint.symptoms', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Symptoms</a>
                            <a href="{{ route('pateint.cbc.view', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">CBC C PBF(Pathelogical Test)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Disease Level</th>
                        <td>80% chance that patient have leukemia</td>
                    </tr>

                    <tr>
                        <th>Suggested Test</th>
                        <td>
                            <a href="{{ route('disease.pathelogical.bone.view', ['id'=>$patient_id]) }}" class="btn btn-success">Pathelogical Bone Marrow Study</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Explanation</th>
                        <td>
                            Bone marrow tests check to see if your bone marrow is working correctly and making normal amounts of blood cells. The tests can help diagnose and monitor bone marrow disorders, blood disorders, and certain types of cancer.
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine">Patient CBC C PBF Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-bordered" style="text-align: center">
                        <tbody>
                            <tr>
                                <th>Hemoglobin</th>
                                <td>{{ $cbc->hemoglobin }}</td>
                            </tr>
                            <tr>
                                <th>Platelet</th>
                                <td>{{ $cbc->platelet }}</td>
                            </tr>
                            <tr>
                                <th>White Blood Cell</th>
                                <td>{{ $cbc->white_blood_cell }}</td>
                            </tr>
                            <tr>
                                <th>White Blood Cell</th>
                                <td>{{ $cbc->red_blood_cell }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <img src="{{ asset('images/cbc-c-pbf/'.$cbc->report)}}" alt="Image" class=" img-fluid" style="width: 200px; height: 150px;">
                </div>
            </div>
        </div>
    </div>

@endsection
