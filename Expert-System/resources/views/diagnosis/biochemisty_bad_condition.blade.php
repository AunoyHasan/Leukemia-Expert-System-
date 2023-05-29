@extends('layouts.home')

@section('title', 'Biochemistry Bad Condition')

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

<br>


<div>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine"> Biochemistry Testing Result : Bad Condition</div>

        <div class="card-body">
            <table class="table table-bordered" style="text-align: center;">
                <tr>
                    <th>About Pateint</th>
                    <td><a href="{{ route('pateint.information', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Information</a>
                        <a href="{{ route('pateint.symptoms', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Patient Symptoms</a>
                        <a href="{{ route('pateint.cbc.view', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">CBC C PBF Test</a>
                        <a href="{{ route('pateint.bone.view', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">Bone Marrow Study</a>
                        <a href="{{ route('pateint.bioChemistry', ['id'=>$patient_id]) }} " class="btn btn-outline-dark">BioChemistry</a>
                    </td>
                </tr>

                <tr>
                    <th>Suggested Test</th>
                    <td>
                        <a href="{{ route('disease.radiological.view', ['id'=>$patient_id]) }}" class="btn btn-success">Radiological Testing</a>
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
            <h4>Biological Information</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-bordered" style="text-align: center">
                        <tbody>
                            <tr>
                                <th>Uric Acid</th>
                                <td>{{ $biochemistry->uric_acid }}</td>
                            </tr>
                            <tr>
                                <th>Electrolyte</th>
                                <td>{{ $biochemistry->electrolyte }}</td>
                            </tr>
                            <tr>
                                <th>POG2-</th>
                                <td>{{ $biochemistry->pog_2 }}</td>
                            </tr>
                            <tr>
                                <th>Ca2+</th>
                                <td>{{ $biochemistry->ca_2 }}</td>
                            </tr>
                            <tr>
                                <th>LDH</th>
                                <td>{{ $biochemistry->ldh }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <img src="{{ asset('images/biochemistry/'.$biochemistry->report)}}" alt="Image" class=" img-fluid" style="width: 200px;">
                </div>

            </div>

        </div>
    </div>
</div>


@endsection
