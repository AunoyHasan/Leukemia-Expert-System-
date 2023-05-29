@extends('layouts.home')

@section('title', 'Actuate Mylogeneous Leukemia')

<style>
    th{
        width: 400px;
    }
</style>

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header" style="text-align: center; background-color:aquamarine"> <h4>To See The Level Of Leukemia</h4> </div>
                    <div class="card-body">
                        <table class="table table-bordered" style="text-align: center">
                            <tr>
                                <th>About Patient</th>
                                <td>
                                    <a href="{{ route('pateint.information', ['id'=>$patient_id]) }}" class="btn btn-outline-dark">Patient Information</a>
                                    <a href="{{ route('pateint.symptoms', ['id'=>$patient_id]) }}"    class="btn btn-outline-dark">Patient Symptoms</a>
                                    <a href="{{ route('pateint.cbc.view', ['id'=>$patient_id]) }}"    class="btn btn-outline-dark">CBC C PBF Test</a>
                                    <a href="{{ route('pateint.bone.view', ['id'=>$patient_id]) }}"   class="btn btn-outline-dark">Bone Marrow Study</a>
                                </td>
                            </tr>

                            <tr>
                                <th>Disease</th>
                                <td style="color: red">
                                    Actuate Mylogeneous Leukemia - AML
                                </td>
                            </tr>

                            <tr>
                                <th>Suggested Test</th>
                                <td>
                                    <a href="{{ route('disease.biochemistry.view', [ 'id' => $patient_id ] ) }}" class="btn btn-success">Biochemitry Testing</a>
                                    {{-- <a href="{{ route('disease.radiological.view', [ 'id' => $patient_id ] ) }}" class="btn btn-primary">Radiological Testing</a> --}}
                                </td>
                            </tr>

                            <tr>
                                <th>Explanation</th>
                                <td>
                                    To see the current condition of the leukemic condition
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine">Patient CBC C PBF Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered" style="text-align: center">
                        <tbody>
                            <tr>
                                <th>Myloid</th>
                                <td>{{ $boneMarrow->myloid }}</td>
                            </tr>
                            <tr>
                                <th>Blast Cell</th>
                                <td>{{ $boneMarrow->blast_cell }}</td>
                            </tr>
                            <tr>
                                <th>Periodic Acid</th>
                                <td>{{ $boneMarrow->periodic_acid }}</td>
                            </tr>
                            <tr>
                                <th>Acid Phosphatex</th>
                                <td>{{ $boneMarrow->acid_phosphatex }}</td>
                            </tr>
                            <tr>
                                <th>Sudan Black</th>
                                <td>{{ $boneMarrow->sudan_black }}</td>
                            </tr>
                            <tr>
                                <th>Myelopsroxidsx</th>
                                <td>{{ $boneMarrow->myelopsroxidsx }}</td>
                            </tr>

                            <tr>
                                <th>Markers</th>
                                <td>
                                    <table>
                                        <tr>
                                            @foreach ($markers as $item)
                                                <td>{{ $item }} </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('images/bone-marrow/'.$boneMarrow->report)}}" alt="Image" class=" img-fluid" style="width: 300px;">
                </div>
            </div>
        </div>
    </div>

@endsection
