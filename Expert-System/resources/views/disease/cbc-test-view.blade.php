@extends('layouts.home')

@section('title', 'Pathelogical Testing')

<style>
    .ck-editor__editable {
       min-height: 200px;
    }

    .dropify-wrapper{
       min-height: 500px;
    }

    #explanation{
        background-color:darkorange;
        color: rgba(0, 0, 0, 0.927);
        text-align: center;
        border-radius: 5px solid black;
        height: 35%;
        width: 100%;
        margin: 10px;
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
<form action="{{ route('disease.pathelogical.cbc') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color:aquamarine">
                    <h5 class="m-0">CBC C PBF Test(2nd Session)</h5>
                </div>
                <div class="card-body" style="background-color:greenyellow">
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                    <div class="row mt-3">
                        <div class="form-group col-md-6">
                            <label for="hemoglobin"><b>Hemoglobin(gm/dl)</b></label>
                            <input type="number" name="hemoglobin" class="form-control" step="0.01"
                                id="hemoglobin" placeholder="Enter Hemoglobin">
                            @error('hemoglobin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="platelet"><b>Platelet(/L)</b></label>
                            <input type="number" name="platelet" step="0.01" class="form-control"
                                id="platelet" placeholder="Enter Platelete">
                            @error('platelet')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-6">
                            <label for="white_blood_cell"><b>White Blood Cell(/L)</b></label>
                            <input type="number" name="white_blood_cell" step="0.01" class="form-control"
                                id="white_blood_cell" placeholder="Enter White Blood Cell">
                            @error('white_blood_cell')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="red_blood_cell"><b>Red Blood Cell(/L)</b></label>
                            <input type="number" name="red_blood_cell" step="0.01" class="form-control"
                                id="red_blood_cell" placeholder="Enter Red Blood Cell">
                            @error('red_blood_cell')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div id="explanation">
                        <div>Explanation:  A complete blood count (CBC) is a blood test used to evaluate your overall health and detect a wide range of disorders, including anemia, infection and leukemia.</div>
                        <div class="cbc-status-positive"></div>
                        <div class="cbc-status-negative"></div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="note"><b>Note</b> </label>
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <b>Report upload(JPG, PNG image only)</b>
                </div>
                <div class="card-body">
                    <div class="form-group mt-3">
                        <input type="file" id="report"
                            class="dropify form-control @error('report') is-invalid @enderror"
                            name="report">
                        @error('report')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- JQuery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{-- Dropify CDN --}}
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

{{-- Ck Editor CDN --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify();

        $('#explanation').hide();

        $('#red_blood_cell').on('keyup', function(){
            var hemoglobin       = $('#hemoglobin').val();
            var platelet         = $('#platelet').val();
            var white_blood_cell = $('#white_blood_cell').val();
            var red_blood_cell   = $('#red_blood_cell').val();
            cbcInfo(hemoglobin, platelet, white_blood_cell, red_blood_cell);
        })

        function cbcInfo(hemoglobin, platelet, white_blood_cell, red_blood_cell){
            if(hemoglobin <=13 && platelet<=150000000000 && white_blood_cell >= 3000000007 && red_blood_cell <= -4999999995){
                $explain1 = "Hemoglobin = "+hemoglobin + " Platelet = " + platelet + " White Blood Cell = " + white_blood_cell + " Red Blood Cell = " + red_blood_cell ;
                $explain2 = "As, Hemoglobin  <= 13  and Platelet <= 150000000000 and White Blood Cell >= 3000000007 and Red Blood Cell <= -4999999995, <br> <b>So the patient may have leukemia and the probablity is 80%</b> <br>";
                $message = $explain1 + '\n'+ $explain2;
                $('.cbc-status-positive').html($message);
                $('.cbc-status-negative').hide();
                $('#explanation').show();
                $('.cbc-status-positive').show();
            }
            else{
                $explain1 = "Patient's Hemoglobin = "+hemoglobin + " Platelet = " + platelet + " White Blood Cell = " + white_blood_cell + " Red Blood Cell = " + red_blood_cell ;
                $explain2 = "<br><b>The patient may not have leukemia </b> because <br> Hemoglobin  <= 13  and Platelet <= 150000000000 and White Blood Cell >= 3000000007 and Red Blood Cell <= -4999999995";
                $message = $explain1 + '\n'+ $explain2;
                $('.cbc-status-negative').html($message);
                $('.cbc-status-positive').hide();
                $('#explanation').show();
                $('.cbc-status-negative').show();
            }
        }

    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#note'), {
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
