@extends('layouts.home')

@section('title', 'Biochemistry Testing')

<style>
    .ck-editor__editable {
        min-height: 250px;
    }

    .dropify-wrapper{
        min-height: 300px;
    }

    #explanation{
        background-color:darkorange;
        color: rgba(0, 0, 0, 0.927);
        text-align: center;
        border-radius: 5px solid black;
        height: 20%;
        width: 100%;
        margin: 10px;
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

{{-- @if (!$biochemistry) --}}
    <form action="{{ route('disease.biochemistry.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Biochemistry Test (4th Session)</h5>
                    </div>
                    <div class="card-body" style="background-color:greenyellow">
                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                        <div class="row mt-3">
                            <div class="form-group col-md-6">
                                <label for="uric_acid"><b>Uric Acid <span style="color: red">*</span> </b></label>
                                <select name="uric_acid" id="uric_acid" class="form-control">
                                    <option value="">--Select Uric Acid--</option>
                                    <option value="normal">Normal</option>
                                    <option value="increase">Increase</option>
                                    <option value="decrease">Decrease</option>
                                </select>
                                @error('uric_acid')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="electrolyte"><b>Electrolyte <span style="color: red">*</span></b></label>
                                <select name="electrolyte" id="electrolyte" class="form-control">
                                    <option value="">--Select Electrolyte--</option>
                                    <option value="is_hyperkalemia">Is Hyperkalemia</option>
                                    <option value="is_not_hyperkalemia">Is Not Hyperkalemia</option>
                                </select>
                                @error('electrolyte')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label for="pog_2"><b>Select POG-2 <span style="color: red">*</span></b></label>
                                <select name="pog_2" id="pog_2" class="form-control">
                                    <option value="">--Select POG-2--</option>
                                    <option value="is_hyperphosphatemia">Is Hyperphosphatemia</option>
                                    <option value="is_not_hyperphosphatemia">Is Not Hyperphosphatemia</option>
                                </select>
                                @error('pog_2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label for="ca_2"><b>Ca2+ <span style="color: red">*</span></b></label>
                                <select name="ca_2" id="ca_2" class="form-control">
                                    <option value="">--Select Ca2+--</option>
                                    <option value="is_hypocalcemia">Is Hypocalcemia</option>
                                    <option value="is_not_hypocalcemia">Is Not Hypocalcemia</option>
                                </select>
                                @error('ca_2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="ldh"><b>LDH <span style="color: red">*</span></b></label>
                                <select name="ldh" id="ldh" class="form-control">
                                    <option value="">--Select LDH--</option>
                                    <option value="increase">Increase</option>
                                    <option value="decrease">Decrease</option>
                                </select>
                                @error('ldh')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="explanation">
                            {{-- <div>Explanation: Diagnostic Clinical Biochemistry uses biochemical knowledge and techniques to assist in the diagnosis of human disease, to follow its progress and to monitor the effect of treatment. The scope of investigations varies from assessment of organ function and endocrine glands to therapeutic drug monitoring.</div> --}}
                            <div class="biochemistry-status-positive"></div>
                            <div class="biochemistry-status-negative"></div>
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
                        <b>Report upload(JPG, PNG, PDF, Excel, CSV Only)</b>
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
{{-- @elseif ($biochemistry && !$radioLogical)
    <div align="center">
        <h4  style="color: green">You Have Already Tested Biochemisty</h4>
        <span style="font-size: 20px">Suggest Test are:</span>
        <a href="{{ route('disease.radiological.view', ['id'=>$patient_id]) }}" class="btn btn-primary">Radiological Testing</a>
    </div>
@endif --}}


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

        var uric_acid, electrolyte, pog_2, ca_2, ldh;

        $('#uric_acid').on('change', function(){
            uric_acid  =  $(this).val();
        })
        $('#electrolyte').on('change', function(){
            electrolyte  =  $(this).val();
        })
        $('#pog_2').on('change', function(){
            pog_2  = $(this).val();
        })
        $('#ca_2').on('change', function(){
            ca_2 = $(this).val();
        })
        $('#ldh').on('change', function(){
            ldh = $('#ldh').val();
            cbcInfo(uric_acid, electrolyte, pog_2, ca_2, ldh);
        })

        function cbcInfo(uric_acid, electrolyte, pog_2, ca_2, ldh){
            console.log('uric_acid   : '+uric_acid);
            console.log('electrolyte : '+electrolyte);
            console.log('pog_2       : '+pog_2);
            console.log('ca_2        : '+ca_2);
            console.log('ldh         : '+ldh);
            if( uric_acid === 'increase' && electrolyte === 'is_hyperkalemia' && pog_2 === 'is_hyperphosphatemia' && ca_2 === 'is_hypocalcemia' && ldh === 'increase'){
                $explain1 = "Explanation: Uric Acid is increased, Electrolyte is increased, POG2- is  Hyperphosphatemia,  CA2+ is Hypocalcemia and LDH is increased.";
                $explain2 = "<br> <b>So the condition of the patient is not good.</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.biochemistry-status-positive').html($message);
                $('.biochemistry-status-negative').hide();
                $('#explanation').show();
                $('.biochemistry-status-positive').show();
            }
            else{
                $explain1 = "Explanation: Uric Acid = "+uric_acid + ", Electrolyte = "+electrolyte + ", POG2- = " + pog_2 + ", CA2+ = " + ca_2 + " and LDH = " + ldh ;
                $explain2 = "<br> <b>So the condition of the patient is not bad.</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.biochemistry-status-negative').html($message);
                $('.biochemistry-status-positive').hide();
                $('#explanation').show();
                $('.biochemistry-status-negative').show();
            }
        }

    });

    ClassicEditor
        .create(document.querySelector('#note'), {
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
