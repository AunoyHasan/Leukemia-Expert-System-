@extends('layouts.home')

@section('title', 'Taking Symptoms')

<style>
    #no-found{
        text-align: center;
        background-color:darkorange;
        color: black;
        font-size: 20px;
        padding: 10px;
    }

    #found{
        text-align: center;
        background-color:darkorange;
        color: black;
        font-size: 20px;
        padding: 10px;
    } 

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

<div>
    <div class="card">
        <div class="card-header" style="text-align: center; background-color:aquamarine"><h4>About Patient</h4></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Patient Information</th>
                    <td>
                        <a href="{{ route('pateint.information', ['id'=> $patient_id]) }} " class="btn btn-outline-dark">Patient Information</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</div>

<br>

<form action="{{ route('disease.check.submit') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color:aquamarine">
                    <div align="center">
                        @if(Session::has('message'))<span class="alert alert-info">{{Session::get('message')}}</span><br><br>@endif
                    </div>
                    <p class="m-0"><h4>Patient Symptoms (First Session)</h4></p>
                </div>

                <div class="card-body" style="background-color:greenyellow">
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                    <div class="form-group mt-2">
                        <label for="symptom_name"> <b>Select Symptoms <span style="color:red">*</span></b></label>
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

                    <div id="no-found">
                        <h4>Explanation: This patient has not more than 3 symptoms. So he/she may suffer other disease.</h4>
                    </div>

                    <div id="found">
                        <h4>Explanation: This patient has more than 3 symptoms. So he/she may have leukemia.</h4>
                    </div>

                    <div class="form-group mt-2">
                        <label for="description"><b>Note</b></label>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#no-found').hide();
        $('#found').hide();
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $(this).addClass('active')
                let active =  $('.active').length
                if(active == 1){
                    alert('Explanation: Patient have only 1 symptom. So, this patient does not have any leukemia. Patient may suffer another disease')
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#no-found').show();
                    $('#found').hide();
                }
                if(active == 2){
                    alert('Explanation: Patient have only 2 symptoms. So, this patient does not have any leukemia. Patient may suffer another disease')
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#no-found').show();
                    $('#found').hide();
                }
                if(active == 3){
                    alert('Explanation: Patient have 3 symptoms. So, this patient does not have any leukemia. Patient may suffer another disease')
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#no-found').show();
                    $('#found').hide();
                }
                if(active == 4 ){
                    alert('Explanation: Patient have 4 symptoms. So, this patient may have leukemia.')
                    $(':input[type="submit"]').prop('disabled', false);
                    $('#no-found').hide();
                    $('#found').show();
                }

                if(active > 4 ){
                    alert('Explanation: Patient have more than 4 symptoms. So, this patient may have leukemia.')
                    $(':input[type="submit"]').prop('disabled', false);
                    $('#found').show();
                }
            }
            else if($(this).prop("checked") == false){
                $(this).removeClass('active')
            }
        });
    });
</script>

@endsection
