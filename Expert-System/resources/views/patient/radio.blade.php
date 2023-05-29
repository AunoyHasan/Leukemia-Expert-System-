@extends('layouts.app2')

@section('title', 'Radiological Details')

@section('content')

    <div>
        <div>
            <center>
                <a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Radiological Details</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Chest Xray</th>
                        <td>{{ $radio->chest_xray }}</td>
                    </tr>
                    <tr>
                        <th>Xray Bone And Spine</th>
                        <td>{{ $radio->xray_bone_and_spine }}</td>
                    </tr>
                    <tr>
                        <th>Usg Leukemic Infaction-</th>
                        <td>{{ $radio->usg_leukemic_infaction }}</td>
                    </tr>
                    <tr>
                        <th>Usg Intraabdeminal+</th>
                        <td>{{ $radio->usg_intraabdeminal }}</td>
                    </tr>
                    <tr>
                        <th>Explanation</th>
                        <td>{{ $radio->note }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
