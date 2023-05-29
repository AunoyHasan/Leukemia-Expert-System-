@extends('layouts.signup')
@section('title', 'Login Doctor')

<style>

    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    html,
    body {
        display: grid;
        height: 100%;
        width: 100%;
        place-items: center;
        background: -webkit-linear-gradient(left, #a445b2, #42fa6a);
    }

    ::selection {
        background: #42fa61;
        color: #fff;
    }

    .wrapper {
        overflow: hidden;
        max-width: 390px;
        background: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title-text {
        display: flex;
        width: 200%;
    }

    .wrapper .title {
        width: 50%;
        font-size: 35px;
        font-weight: 600;
        text-align: center;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .slide-controls {
        position: relative;
        display: flex;
        height: 50px;
        width: 100%;
        overflow: hidden;
        margin: 30px 0 10px 0;
        justify-content: space-between;
        border: 1px solid lightgrey;
        border-radius: 5px;
    }

    .slide-controls .slide {
        height: 100%;
        width: 100%;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        text-align: center;
        line-height: 48px;
        cursor: pointer;
        z-index: 1;
        transition: all 0.6s ease;
    }

    .slide-controls label.signup {
        color: #000;
    }

    .slide-controls .slider-tab {
        position: absolute;
        height: 100%;
        width: 50%;
        left: 0;
        z-index: 0;
        border-radius: 5px;
        background: -webkit-linear-gradient(left, #a445b2, #fa4299);
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    input[type="radio"] {
        display: none;
    }

    #signup:checked~.slider-tab {
        left: 50%;
    }

    #signup:checked~label.signup {
        color: #fff;
        cursor: default;
        user-select: none;
    }

    #signup:checked~label.login {
        color: #000;
    }

    #login:checked~label.signup {
        color: #000;
    }

    #login:checked~label.login {
        cursor: default;
        user-select: none;
    }

    .wrapper .form-container {
        width: 100%;
        overflow: hidden;
    }

    .form-container .form-inner {
        display: flex;
        width: 200%;
    }

    .form-container .form-inner form {
        width: 50%;
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-inner form .field {
        height: 50px;
        width: 100%;
        margin-top: 20px;
    }

    .form-inner form .field input {
        height: 100%;
        width: 100%;
        outline: none;
        padding-left: 15px;
        border-radius: 5px;
        border: 1px solid lightgrey;
        border-bottom-width: 2px;
        font-size: 17px;
        transition: all 0.3s ease;
    }

    .form-inner form .field input:focus {
        border-color: #fc83bb;
    /* box-shadow: inset 0 0 3px #fb6aae; */
    }

    .form-inner form .field input::placeholder {
        color: #999;
        transition: all 0.3s ease;
    }

    form .field input:focus::placeholder {
        color: #b3b3b3;
    }

    .form-inner form .pass-link {
        margin-top: 5px;
    }

    .form-inner form .signup-link {
        text-align: center;
        margin-top: 30px;
    }

    .form-inner form .pass-link a,
    .form-inner form .signup-link a {
        color: #fa4299;
        text-decoration: none;
    }

    .form-inner form .pass-link a:hover,
    .form-inner form .signup-link a:hover {
        text-decoration: underline;
    }

    form .btn {
        height: 50px;
        width: 100%;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    form .btn .btn-layer {
        height: 100%;
        width: 300%;
        position: absolute;
        left: -100%;
        background: -webkit-linear-gradient(right, #4550b2, #fab042, #45abb2, #61fa42);
        border-radius: 5px;
        transition: all 0.4s ease;
    }

    form .btn:hover .btn-layer {
        left: 0;
    }

    form .btn input[type="submit"] {
        height: 100%;
        width: 100%;
        z-index: 1;
        position: relative;
        background: none;
        border: none;
        color: #fff;
        padding-left: 0;
        border-radius: 5px;
        font-size: 20px;
        font-weight: 500;
        cursor: pointer;
    }
    .address{
        margin-bottom: 55px;
    }

</style>

@section('content')
<div class="card align-items-center justify-center form-inner">
    <div class="card-body" style="width:100%">
        <div align="center">
            @if(Session::has('message'))<span class="alert alert-info">{{Session::get('message')}}</span><br><br>@endif
        </div>
        <div class="wrapper">
            <div class="title-text">
              <div class="title login">Login Form</div>
              <div class="title signup">Register Doctor</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form action="{{ route('doctor.login.submit') }}" enctype="multipart/form-data" method="POST" class="login">
                        @csrf
                        <div class="row">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <p class="m-0"><h5>Login Doctor</h5></p>
                                </div> --}}

                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group col-md-12  field">
                                            {{-- <label for="email"><b>Email</b><span style="color: red">*</span></label> --}}
                                            <input type="text" name="email" id="email"
                                                class=" form-control @error('email') is-invalid @enderror" value="{{ old('name') }}"
                                                placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-2 ">
                                        <div class="form-group col-md-12 field">
                                            {{-- <label for="password"><b>Password</b> <span style="color: red">*</span></label> --}}
                                            <input type="password" name="password" id="password"
                                                class=" form-control @error('password') is-invalid @enderror"
                                                value="{{ old('password') }}" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="pass-link" style="padding: 15px"><a href="#">Forgot password?</a></div>
                                    </div>
                                    <div class="field btn">
                                        <div class="btn-layer"></div>
                                        <input type="submit" value="Login">
                                      </div>


                                    {{-- <div class="row mt-2 field">
                                        <div class="form-group col-md-12 field">
                                            <div class=" btn form-group d-flex justify-content-between align-items-center">
                                                <button>
                                                    <a href="{{ route('doctor.signup') }}" >Sign Up</a>
                                                </button>
                                                <button type="submit">Login</button>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>

                            {{-- <div class="card">
                                <div class="card-body">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <a href="{{ route('doctor.signup') }}" class="btn btn-success">Sign Up</a>
                                        <button type="submit" class="btn btn-sm btn-primary" align="right">Login</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>

                    <form action="{{ route('doctor.signup.submit') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <p class="m-0"></p>
                                </div> --}}

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
                                        <div class="form-group col-md-6 field my-2">
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
                                    </div>
                                    <br>

                                    <div class="row mt-2">
                                        <div class="form-group col-md-6 field my-2">
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
                                    <br>

                                    <div class="row mt-2">
                                        <div class="form-group col-md-6 field my-2 ">
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
                                    </div>
                                    <br>

                                    <div class="row mt-2">
                                        <div class="form-group col-md-6 field my-2">
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
                                    <br>

                                    <div class="row mt-2">
                                        <div class="form-group col-md-4 field my-2">
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

                                        <div class="form-group col-md-4  my-3 field">
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

                                        <div class="form-group col-md-4  my-4 field">
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
                                        <div class="form-group col-md-6  field address">
                                            <label for="current_address"><b>Current Address</b> <span style="color: red">*</span></label>
                                            <textarea name="address" id="current_address" rows="3"
                                                class="form-control @error('current_address') is-invalid @enderror" placeholder="Current Address...">{{ old('current_address') }}</textarea>
                                            @error('current_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 field address">
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

                            {{-- <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary">Register</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class=" mt-4 field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Signup">
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;
    });
  </script>
@endsection
