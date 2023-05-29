@extends('layouts.app2')

@section('title', 'Bio Chemistry Details')

@section('content')

    <div>
        <div>
            <center>
                <a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Biochemistry Details</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Uric Acid</th>
                        <td>{{ $bio->uric_acid }}</td>
                    </tr>
                    <tr>
                        <th>Electrolyte</th>
                        <td>{{ $bio->electrolyte }}</td>
                    </tr>
                    <tr>
                        <th>POG2-</th>
                        <td>{{ $bio->pog_2 }}</td>
                    </tr>
                    <tr>
                        <th>Ca2+</th>
                        <td>{{ $bio->ca_2 }}</td>
                    </tr>
                    <tr>
                        <th>LDH</th>
                        <td>{{ $bio->ldh }}</td>
                    </tr>
                    <tr>
                        <th>Explanation</th>
                        <td>{{ $bio->note }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
