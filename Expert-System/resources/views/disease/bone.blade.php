@extends('layouts.app2')

@section('title', 'Bone Marrow Study')

<style>
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


    <div class="container">
        <div class="pathelogical_test">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color:aquamarine">
                    Bone Marrow Test (3rd Session)
                </div>
                <div class="card-body" style="background-color:greenyellow">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="hemoglobin">Sudan Black: </label>
                            <input type="checkbox" name="sudan_black" value="positive">Positive
                            <input type="checkbox" name="sudan_black" value="negative">Negative
                        </div>

                        <div class="form-group mt-3">
                            <label for="hemoglobin">Periodic Acid Shift: </label>
                            <input type="checkbox" name="periodic_acid_shift" value="positive">Positive
                            <input type="checkbox" name="periodic_acid_shift" value="negative">Negative
                        </div>

                        <div class="form-group mt-3">
                            <label for="hemoglobin">Myelopseroxides: </label>
                            <input type="checkbox" name="myelopseroxides" value="positive">Positive
                            <input type="checkbox" name="myelopseroxides" value="negative">Negative
                        </div>

                        <div class="form-group mt-3">
                            <label for="hemoglobin">Acid Phosphatex: </label>
                            <input type="checkbox" name="acid_phosphatex" value="positive">Positive
                            <input type="checkbox" name="acid_phosphatex" value="negative">Negative
                        </div>
                    </form>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
