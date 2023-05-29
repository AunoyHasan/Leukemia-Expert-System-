@extends('layouts.app')

@section('title', 'Symptom List')

@section('content')

<form action="{{ route('disease.check.submit') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="m-0">Patient Symptoms</p>
                </div>
                <div class="card-body">
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="start_time">Date and Time</label>
                            <input type="datetime-local" name="start_time" class="form-control" placeholder="Start Time" value="{{ old('start_time') }}">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="symptom_name">Select Symptoms</label>
                            @forelse ($symptoms as $symptom)
                                <p>
                                    <input type="checkbox" name="symptom_id[]" id="symptom_id" value="{{ $symptom->id }}">{{ $symptom->name }}
                                </p>
                            @empty
                                <option>--No Symptoms--</option>
                            @endforelse
                        </select>
                        @error('symptom_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Symptom Note</label>
                        <textarea name="note" class="form-control" id="note" cols="40" rows="6"></textarea>
                        @error('note')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
