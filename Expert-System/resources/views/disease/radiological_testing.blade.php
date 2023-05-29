@extends('layouts.home')

@section('title', 'Radiological Testing')

<style>
    table, th, td {
      border: 1px solid;
    }
    tr:hover {background-color: coral;}
    th {
        background-color: #04AA6D;
        color: black;
    }

    .ck-editor__editable {
        min-height: 200px;
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
</style>

@section('content')
{{-- @if (!$radioLogical) --}}
    <form action="{{ route('disease.radiological.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color:aquamarine">
                        <p class="m-0">Radiological Test (5th Session)</p>
                    </div>
                    <div class="card-body" style="background-color:greenyellow">
                        <div align="center">
                            @if(Session::has('message'))<span class="alert alert-info">{{Session::get('message')}}</span><br><br>@endif
                        </div>

                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient_id }}">

                        <div class="row">
                            <div class="form-group">
                                <label for="chest_xray"><b>Chest X-Ray <span style="color:red">*</span></b></label>
                                <input type="text" class="form-control" id="chest_xray" name="chest_xray" placeholder="Enter Mediastinal Mass">
                                @error('chest_xray')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="xray_bone_and_spine"><b>X-Ray Long Bone & Spine <span style="color:red">*</span></b></label>
                                <select name="xray_bone_and_spine" id="xray_bone_and_spine" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="altered_medulary_cavity">Altered Medulary Cavity </option>
                                    <option value="not_altered_medulary_cavity">Not Altered Medulary Cavity</option>
                                </select>
                                @error('electxray_bone_and_spinerolyte')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="usg_leukemic_infaction" style="color: blue"><b>USG Of Whole Abdomen</b></label>
                            <div class="form-group col-md-6">
                                <label for="usg_leukemic_infaction"><b>Leukemic Infaction <span style="color:red">*</span></b></label>
                                <select name="usg_leukemic_infaction" id="usg_leukemic_infaction" class="form-control">
                                    <option value="">--Select Leukemic Infaction--</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @error('usg_leukemic_infaction')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="usg_intraabdeminal"><b>Intraabdeminal Lymphadenopathy <span style="color:red">*</span></b></label>
                                <select name="usg_intraabdeminal" id="usg_intraabdeminal" class="form-control">
                                    <option value="">--Select Intraabdeminal Lymphadenopathy--</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @error('usg_intraabdeminal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="explanation">
                            {{-- <div>Explanation: Diagnostic Clinical Biochemistry uses biochemical knowledge and techniques to assist in the diagnosis of human disease, to follow its progress and to monitor the effect of treatment. The scope of investigations varies from assessment of organ function and endocrine glands to therapeutic drug monitoring.</div> --}}
                            <div class="radiological-status-positive"></div>
                            <div class="radiological-status-negative"></div>
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
{{-- @elseif (!$biochemistry && $radioLogical)
    <div align="center">
        <h4  style="color: green">You Have Already Tested Radiological</h4>
        <span style="font-size: 20px">Suggest Test are:</span>
        <a href="{{ route('disease.biochemistry.view', ['id'=>$patient_id]) }}" class="btn btn-success">Biochemitry Testing</a>
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
    });


    $('#explanation').hide();

        var chest_xray, xray_bone_and_spine, usg_leukemic_infaction, usg_intraabdeminal;

        $('#chest_xray').on('keyup', function(){
            chest_xray  =  $(this).val();
        })
        $('#xray_bone_and_spine').on('change', function(){
            xray_bone_and_spine  =  $(this).val();
        })
        $('#usg_leukemic_infaction').on('change', function(){
            usg_leukemic_infaction  =  $(this).val();
        })
        $('#usg_intraabdeminal').on('change', function(){
            usg_intraabdeminal  =  $(this).val();
            cbcInfo(chest_xray, xray_bone_and_spine, usg_leukemic_infaction, usg_intraabdeminal);
        })

        function cbcInfo(chest_xray, xray_bone_and_spine, usg_leukemic_infaction, usg_intraabdeminal){
            console.log('chest_xray   : '+chest_xray);
            console.log('xray_bone_and_spine : '+xray_bone_and_spine);
            console.log('usg_leukemic_infaction  : '+usg_leukemic_infaction);
            console.log('usg_intraabdeminal  : '+usg_intraabdeminal);
            if( (chest_xray >= 100 || chest_xray <= 200) &&  xray_bone_and_spine === 'altered_medulary_cavity' && usg_leukemic_infaction === 'yes' && usg_intraabdeminal === 'yes'){
                $explain1 = "Explanation: Paatient's Chest Xray is more than 100, Xray Bone And Spine is Altered Medulary Cavity, has Usg Leukemic Infaction and has Usg Intraabdeminal.";
                $explain2 = "<br> <b>So the condition of the patient is not good.</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.radiological-status-positive').html($message);
                $('.radiological-status-negative').hide();
                $('#explanation').show();
                $('.radiological-status-positive').show();
            }
            else{
                $explain1 = "Explanation:Patient's  Chest Xray = "+chest_xray + ", Xray Bone And Spine = "+xray_bone_and_spine + ", Usg Leukemic Infaction = " + usg_leukemic_infaction + ", Usg Intraabdeminal = " + usg_intraabdeminal ;
                $explain2 = "<br> <b>So the condition of the patient is not bad.</b>";
                $message = $explain1 + '\n'+ $explain2;
                $('.radiological-status-negative').html($message);
                $('.radiological-status-positive').hide();
                $('#explanation').show();
                $('.radiological-status-negative').show();
            }
        }


    ClassicEditor
        .create(document.querySelector('#note'), {
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
