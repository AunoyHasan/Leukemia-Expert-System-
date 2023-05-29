@extends('layouts.app2')

@section('title', 'Bone Marrow Study Details')

@section('content')

    <div>
        <div>
            <center>
                <a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a>
                <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
            </center>
        </div>
        <div class="card">
            <div class="card-header">Patient Bone Marrow Study Information</div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Myloid</th>
                        <td>{{ $bone->myloid }}</td>
                    </tr>
                    <tr>
                        <th>Blast Cell</th>
                        <td>{{ $bone->blast_cell }}</td>
                    </tr>
                    <tr>
                        <th>Periodic Acid</th>
                        <td>{{ $bone->periodic_acid }}</td>
                    </tr>
                    <tr>
                        <th>Acid Phosphatex</th>
                        <td>{{ $bone->acid_phosphatex }}</td>
                    </tr>
                    <tr>
                        <th>Sudan Black</th>
                        <td>{{ $bone->sudan_black }}</td>
                    </tr>
                    <tr>
                        <th>Myelopsroxidsx</th>
                        <td>{{ $bone->myelopsroxidsx }}</td>
                    </tr>

                    <tr>
                        <th>Markers</th>
                        <td>
                            <table>
                                @foreach ($markers as $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
