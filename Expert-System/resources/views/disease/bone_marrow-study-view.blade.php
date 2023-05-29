@extends('layouts.home')

@section('title', 'Pathelogical Testing')

<style>
    .ck-editor__editable {
        min-height: 250px;
    }
    .dropify-wrapper{
        min-height: 600px;
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

<form action="{{ route('disease.pathelogical.bone') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color:aquamarine">
                    <h5 class="m-0">Bone Marrow Study(3rd Session)</h5>
                </div>
                <div class="card-body" style="background-color:greenyellow">
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">
                    <div class="row mt-3">
                        <label for="morphology" style="color:blueviolet; background-color:aquamarine"><b>Morphology Checking</b></label>
                        <div class="form-group col-md-6">
                            <label for="myloid"><b>Myloid <span style="color: red">*</span></b></label>
                            <select name="myloid" id="myloid" class="form-control">
                                <option value="">--Select Myloid --</option>
                                <option value="erythroid_ratio_altrud">Erythroid Ratio-Altrud</option>
                                <option value="not_erythroid_ratio_altrud">Not Erythroid Ratio-Altrud</option>
                            </select>
                            @error('myloid')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="blast_cell"><b>Blast Cell <span style="color: red">*</span></b></label>
                            <select name="blast_cell" id="blast_cell" class="form-control">
                                <option value="">--Select Blast Cell --</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            @error('blast_cell')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="Cytochemistry" style="color:blueviolet; background-color:aquamarine"><b>Cytochemistry Checking</b></label>
                        {{-- Sudan Black --}}
                        <div class="form-group col-md-6">
                            <label for="sudan_black"><b>Sudan Black <span style="color: red">*</span></b></label>
                            <select name="sudan_black" id="sudan_black" class="form-control">
                                <option value="">--Select White Blood Cell--</option>
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                            </select>
                            @error('white_blood_cell')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Periodic Acid --}}
                        <div class="form-group col-md-6">
                            <label for="periodic_acid"><b>Periodic Acid <span style="color: red">*</span></b></label>
                            <select name="periodic_acid" id="periodic_acid" class="form-control">
                                <option value="">--Periodic Acid--</option>
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                            </select>
                            @error('periodic_acid')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Myelopsroxidsx --}}
                        <div class="form-group col-md-6">
                            <label for="myelopsroxidsx"><b>Myelopsroxidsx <span style="color: red">*</span></b></label>
                            <select name="myelopsroxidsx" id="myelopsroxidsx" class="form-control">
                                <option value="">--Myelopsroxidsx--</option>
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                            </select>
                            @error('myelopsroxidsx')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Acid Phosphatex --}}
                        <div class="form-group col-md-6">
                            <label for="acid_phosphatex"><b>Acid Phosphatex <span style="color: red">*</span></b></label>
                            <select name="acid_phosphatex" id="acid_phosphatex" class="form-control">
                                <option value="">--Acid Phosphatex--</option>
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                            </select>
                            @error('acid_phosphatex')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-12">
                            <label for="markes"> <b>Immunophenotyping <span style="color: red">*</span></b></label>
                                {{-- @forelse ($markers as $marker)
                                    <input type="checkbox" name="markes[]" id="" value="{{ $marker->id }}"> {{ $marker->name }}
                                @empty
                                    <option>--No Marker--</option>
                                @endforelse --}}
                                <input type="checkbox" name="markers[]" value="CD1">CD1
                                <input type="checkbox" name="markers[]" value="CD2">CD2
                                <input type="checkbox" name="markers[]" value="CD3">CD3
                                <input type="checkbox" name="markers[]" value="CD5">CD5
                                <input type="checkbox" name="markers[]" value="CD7">CD7
                                <input type="checkbox" name="markers[]" value="CD13">CD13
                                <input type="checkbox" name="markers[]" value="CD10+">CD10
                                <input type="checkbox" name="markers[]" value="CD19">CD19
                                <input type="checkbox" name="markers[]" value="CD20">CD20
                                <input type="checkbox" name="markers[]" value="CD22">CD22
                                <input type="checkbox" name="markers[]" value="CD24">CD24
                                <input type="checkbox" name="markers[]" value="CD79">CD79
                            </select>
                            @error('marker')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div id="explanation">
                        {{-- <div>Explanation:  Bone marrow tests check to see if your bone marrow is working correctly and making normal amounts of blood cells. The tests can help diagnose and monitor bone marrow disorders, blood disorders, and certain types of cancer.</div> --}}
                        <div class="bone-marrow-status-all"></div>
                        <div class="bone-marrow-status-aml"></div>
                        <div class="bone-marrow-status-none"></div>
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

        var myloid, blast_cell, sudan_black, periodic_acid, myelopsroxidsx, acid_phosphatex;

        $('#myloid').on('change', function(){
            myloid  =  $(this).val();
        });
        $('#blast_cell').on('change', function(){
            blast_cell  =  $(this).val();
        });
        $('#sudan_black').on('change', function(){
            sudan_black  =  $(this).val();
        });
        $('#periodic_acid').on('change', function(){
            periodic_acid     =  $(this).val();
        });
        $('#myelopsroxidsx').on('change', function(){
            myelopsroxidsx  =  $(this).val();
        });

        $('#acid_phosphatex').on('change', function(){
            acid_phosphatex =  $(this).val();
            boneMarrowInfo(myloid, blast_cell, sudan_black, periodic_acid, myelopsroxidsx, acid_phosphatex);
        });

        function boneMarrowInfo(myloid, blast_cell, sudan_black, periodic_acid, myelopsroxidsx, acid_phosphatex){
            // console.log(myloid);
            // console.log(blast_cell);
            // console.log(sudan_black);
            // console.log(periodic_acid);
            // console.log(myelopsroxidsx);
            // console.log(acid_phosphatex);
            if( myloid == 'erythroid_ratio_altrud' && blast_cell == 'yes' && periodic_acid == 'postitive' && acid_phosphatex == 'postitive')
            {
                $explain1 = "Explanation: Patient's Myloid is Erythroid Ratio Altrud, Blast Cell is present, Periodic Acid is positive and Acid Phosphatex is positive";
                $explain2 = "<br> <b>So these are signal of Acute lymphoblastic leukaemia-ALL<b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.bone-marrow-status-all').html($message);
                $('.bone-marrow-status-aml').hide();
                $('.bone-marrow-status-none').hide();
                $('#explanation').show();
                $('.bone-marrow-status-all').show();
            }
            else if(myloid == 'not_erythroid_ratio_altrud' && blast_cell == 'yes' && sudan_black == 'postitive' && myelopsroxidsx == 'postitive')
            {
                $explain1 = "Explanation: Patient's Myloid is Not Erythroid Ratio Altrud, Blast Cell is present, Sudan Black is positive and Myelopsroxidsx is positive";
                $explain2 = "<br> <b>So these are signal of Acute myeloid leukemia-AML</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.bone-marrow-status-aml').html($message);
                $('.bone-marrow-status-all').hide();
                $('.bone-marrow-status-none').hide();
                $('#explanation').show();
                $('.bone-marrow-status-aml').show();
            }
            else{
                $explain1 = "Explanation: All criteria don't match for a leukemic patient.";
                $explain2 = "<br> <b>So patient doesn't have any leukemia</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.bone-marrow-status-none').html($message);
                $('.bone-marrow-status-all').hide();
                $('.bone-marrow-status-aml').hide();
                $('#explanation').show();
                $('.bone-marrow-status-none').show();
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
