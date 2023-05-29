<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Bootstrap CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .dil{
            margin-left: 600px;
        }
        .aun{
            display: flex;
        }
        #dil{
            margin-left: 510px;
            color: white;
        }
    </style>

    <title>
        @yield('title')
    </title>
</head>

<body>
    <div class="row">
        <div class="">
            <div class="aun">
                <h5 class="dil" >Expert System For Child Leukemia</h5>
                <h5 id="dil"><a href="{{ route('doctor.logout') }}" class="btn btn-dark">Logout</a></h5>
            </div>
            <div align="center">
            </div>
        </div>
    </div>

    @yield('content')
</body>
</html>
