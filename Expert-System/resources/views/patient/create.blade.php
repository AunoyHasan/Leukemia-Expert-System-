@extends('layouts.home')

@section('title', 'Create Patient')
<style>
    #bmi-explanation{
        /* background-color: rgb(159, 217, 237); */
        /* background-color:darkkhaki; */
        /* background-color:bisque; */
        background-color:darkorange;
        color: rgba(0, 0, 0, 0.927);
        text-align: center;
        border-radius: 5px solid black;
        height: 25%;
        width: 100%;
        margin: 10px;
        color: black;
        font-size: 20px;
        padding: 10px;
    }

    .non-age{
        background-color:rgb(21, 171, 217);
        color: rgba(0, 0, 0, 0.927);
        text-align: center;
        border-radius: 5px solid black;
        padding: 10px;
        margin: 10px;
        font-size: 25px;
    }

    #container{
        background-color: grey;
    }

    #form{
        background-color:darkgoldenrod;
    }

    #div-1{
        background-color:darkgoldenrod;
    }
</style>

@section('content')
<div class="card" id="container">

    <div class="card-body" style="width:100%">
        <form id="form" action="{{ route('patient.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row" id="div-1" style="background-color: darkgoldenrod">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <p class="m-0"><b>Register Patient</b></p>
                        <a href="{{ route('patient.index') }}" title="Back" class="btn btn-sm btn-info">Back</a>
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

                            <div class="form-group col-md-6">
                                <label for="blood_group"><b>Blood Group</b> <span style="color: red">*</span></label>
                                <select name="blood_group" id="blood_group"
                                    class="form-select @error('blood_group') is-invalid @enderror">
                                    <option value="">--Select Blood Group--</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-3">
                                <label for="age"><b>Age</b> <span style="color: red">*</span></label>
                                <input type="number" name="age" id="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}" placeholder="Enter age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="height"><b>Height(meter)</b> <span style="color: red">*</span></label>
                                <input type="number" name="height" id="height" step="0.01"
                                    class="form-control @error('height') is-invalid @enderror"
                                    value="{{ old('height') }}" placeholder="Enter Height">
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="weight"><b>Weight(KG)</b> <span style="color: red">*</span></label>
                                <input type="number" name="weight" id="weight" step="0.01"
                                    class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight') }}" placeholder="Enter Weight">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="bmi"><b>BMI</b></label>
                                <input type="number" name="bmi" id="bmi"
                                    class="form-control @error('bmi') is-invalid @enderror"
                                    value="{{ old('bmi') }}" readonly>

                                @error('bmi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="non-age">
                            Explanation: The patient is not child case the age of the patient is more than 16
                        </div>

                        <div id="bmi-explanation">
                            <div>
                                Expnation: Body Mass Index (BMI) is a person’s weight in kilograms (or pounds) divided by the square of height in meters (or feet). A high BMI can indicate high body fatness. BMI screens for weight categories that may lead to health problems, but it does not diagnose the body fatness or health of an individual.
                            </div>

                            <div id="bmi-status"></div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-md-12">
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
                                <label for="description"><b>Note</b></label>
                                <textarea name="note" class="form-control" id="note" cols="40" rows="4"></textarea>
                                @error('note')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>

                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>
        <div class="mb-5"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $('#bmi-explanation').hide();
    $('.non-age').hide();
    $('#weight').on('keyup', function(){
        bmiCal();
    })

    $('#height').on('keyup', function(){
        bmiCal();
    })

    function bmiCal(){
        var weight = $('#weight').val();
        var height = $('#height').val() * 0.3048;
        var bmi_weight;
        bmi_weight = weight/(height*height);
        $('#bmi').val( parseFloat(bmi_weight).toFixed(2) );

        if(weight && height){
            $explain = " <b> Calculation: Height = "+height + " feet and  Weight = " + weight + " kg So, BMI =  </b>";
            $message = $explain + '  <b>'+(+weight + '/' + (height) + '^' + 2) + '=' + parseFloat(bmi_weight).toFixed(2) + '</b>';
            $('#bmi-status').html($message);
            $('#bmi-explanation').show();
        }
    }

    $('#age').on('keyup', function(){
        var age = $('#age').val();
        if(age > 16){
            $('.non-age').show();
            $(':input[type="submit"]').prop('disabled', true);
        }
    })
</script>

@endsection
