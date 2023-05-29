@extends('layouts.app2')

@section('title', 'CBC C PBF Details')

@section('content')

    <div>
        <div>
            <center>
                <a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Patient CBC C PBF Information</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
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
    </div>

@endsection
