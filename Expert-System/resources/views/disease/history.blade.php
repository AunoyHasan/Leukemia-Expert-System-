@extends('layouts.app')

@section('title', 'Patient History')

<style>
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

@if (count($histories)>0)
    <div class="table table-bordered">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Session No</th>
                    <th>Date</th>
                    <th style="width: 400px;">Symptoms</th>
                    <th>Suggest Test</th>
                    <th>Test Done</th>
                    <th>Disease</th>
                    <th>Disease Level</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $x = 1;
                @endphp

                @foreach ($histories as $history)
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $history->date }}</td>
                        <td>
                            @isset($symptomNames)
                                {{ $symptomNames }}
                            @endisset
                        </td>

                        <td>
                            {{ $history->test }}
                        </td>

                        {{-- Disease --}}
                        <td>
                            {{ $history->disease }}
                        </td>

                        {{-- Disease Level --}}
                        <td>
                            {{ $history->disease_level }}
                        </td>
                    </tr>

                    @php
                        $x = $x + 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div>
        <h5 align="center">No History</h5>
    </div>
@endif


@endsection
