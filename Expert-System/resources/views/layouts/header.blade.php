<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>

    <style>
        .dil{
            margin-left: 480px;
        }
        .aun{
            display: flex;
        }
        #dil{
            margin-left: 510px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="aun">
            <h5 class="dil" style="color:blue">Expert System For Child Leukemia</h5>
            <h5 id="dil"><a href="{{ route('doctor.logout') }}" class="btn btn-dark">Logout</a></h5>
        </div>
    </div>

</body>
</html>
