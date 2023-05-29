@extends('layouts.home')

@section('title', 'CBC Test Suggestion')

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
                        </td>
                    </tr>

                    <tr>
                        <th>Suggested Test</th>
                        <td>
                            <a href="{{ route('disease.pathelogical.cbc.view', ['id'=>$patient_id]) }}" class="btn btn-success">CBC C PBF(Pathelogical Test)</a>
                        </td>
                    </tr>

                    <tr>
                        <th>Explanation</th>
                        <td>
                            A complete blood count (CBC) is a blood test used to evaluate your overall health and detect a wide range of disorders, including anemia, infection and leukemia.
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <br>
    <div>
        <div class="card">
            <div class="card-header" style="text-align: center; background-color:aquamarine">
                <h4>Patient Symptoms</h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered" style="text-align: center">
                    <tbody>
                        <tr>
                            <th>Symptom Number</th>
                            <th>Symptom Name</th>
                        </tr>
                        @foreach ($symptoms as $key => $item)
                            @php $key++ @endphp
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
