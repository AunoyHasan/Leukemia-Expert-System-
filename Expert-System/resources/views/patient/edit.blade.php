@extends('layouts.app2')

@section('title', 'Edit Patient')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <p class="m-0">Edit Patient</p>
        <a href="{{ route('patient.index') }}" title="Back" class="btn btn-sm btn-info">Back</a>
    </div>

    <div class="card-body" style="width:70%">
        <form action="{{ route('patient.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="m-0">Edit Patient</p>
                    </div>

                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name"><b>Name</b></label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ ($patient->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email"><b>Email Address</b></label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ ($patient->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Gender --}}
                        <div class="form-group mt-3 ">
                            <label for="gender"><b>Gender</b> </label>
                            <select name="gender" id="gender" value="{{ ($patient->gender) }}"
                                    class="form-select @error('gender') is-invalid @enderror">
                                <option>--Select gender--</option>
                                <option value="1" @if($patient->gender == 1) selected @endif>Male</option>
                                <option value="2" @if($patient->gender == 2) selected @endif>Female</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="row mt-2">
                            <div class="form-group col-md-4 ">
                                <label for="gender"><b>Gender</b> </label>
                                <select name="gender" id="gender" value="{{ ($patient->gender) }}"
                                        class="form-select @error('gender') is-invalid @enderror">
                                    <option value="1" @if($patient->gender == 1) selected @endif>Male</option>
                                    <option value="2" @if($patient->gender == 2) selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="age"><b>Age</b></label>
                                <input type="number" name="age" id="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ ($patient->age) }}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="contact_number"><b>Contact Number</b></label>
                                <input type="text" name="contact_number" id="contact_number"
                                    class="form-control @error('contact_number') is-invalid @enderror"
                                    value="{{ ($patient->contact_number) }}">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="address"><b>Current Address</b></label>
                                <textarea name="address" id="address" rows="4"
                                    class="form-control @error('address') is-invalid @enderror"
                                > {{  $patient->address }} </textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description"><b>Patient Description</b></label>
                                <textarea name="note" class="form-control" id="note" cols="40" rows="4">{{  $patient->note }}</textarea>
                                @error('note')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mb-5"></div>
    </div>
</div>
@endsection
