@extends('layouts.app2')

@section('title', 'Patient Information')

@section('content')

    <div>
        <div>
            <center>
                <a href="" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Patient Basic Information Information</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $patient->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $patient->email }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $patient->gender }}</td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td>{{ $patient->blood_group }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{ $patient->age }}</td>
                    </tr>
                    <tr>
                        <th>Height</th>
                        <td>{{ $patient->height }}</td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td>{{ $patient->weight }}</td>
                    </tr>
                    <tr>
                        <th>BMI</th>
                        <td>{{ $patient->bmi }}</td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td>{{ $patient->contact_number }}</td>
                    </tr>
                    <tr>
                        <th>Current Address</th>
                        <td>{{ $patient->current_address }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $patient->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
