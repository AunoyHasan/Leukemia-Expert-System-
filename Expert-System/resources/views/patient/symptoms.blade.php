@extends('layouts.app2')

@section('title', 'Patient Symptoms')

@section('content')
    <div>
        <div>
            <center>
                <a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Patient Symptoms</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Symptom Name</th>
                    </tr>
                    @foreach ($symptoms as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
