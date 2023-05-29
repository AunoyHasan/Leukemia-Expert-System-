@extends('layouts.signup')

@section('title', 'Register Doctor')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <p class="m-0"><h5>Registration</h5></p>
    </div>

    <div class="card-body" style="width:100%">
        <form action="{{ route('doctor.signup.submit') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="m-0">Register Doctor</p>
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
                                <label for="name"><b>Name</b><span style="color: red">*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Enter name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email"><b>Email Address</b> <span style="color: red">*</span></label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="Enter email address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="password"><b>Password</b> <span style="color: red">*</span></label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="confirm_password"><b>Contrim Password</b> <span style="color: red">*</span></label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('confirm_password') }}" placeholder="Confrim password">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-4 ">
                                <label for="gender"><b>Gender</b> <span style="color: red">*</span></label>
                                <select name="gender" id="gender"
                                    class="form-select @error('gender') is-invalid @enderror">
                                    <option value="">--Select gender--</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="age"><b>Age</b> <span style="color: red">*</span></label>
                                <input type="text" name="age" id="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}" placeholder="Enter age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="contact_number"><b>Contact Number</b> <span style="color: red">*</span></label>
                                <input type="text" name="contact_number" id="contact_number"
                                    class="form-control @error('contact_number') is-invalid @enderror"
                                    value="{{ old('contact_number') }}" placeholder="Enter contact number">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="current_address"><b>Current Address</b> <span style="color: red">*</span></label>
                                <textarea name="address" id="current_address" rows="4"
                                    class="form-control @error('current_address') is-invalid @enderror" placeholder="Current Address...">{{ old('current_address') }}</textarea>
                                @error('current_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description"><b>Doctor Description</b></label>
                                <textarea name="note" class="form-control" id="note" cols="40" rows="4"></textarea>
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
                            <button type="submit" class="btn btn-sm btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mb-5"></div>
    </div>
</div>
@endsection
