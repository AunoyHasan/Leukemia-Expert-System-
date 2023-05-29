<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <title>
         @yield('title')
    </title>

    <style>
        /* .heading{
            margin-left: 480px;
        } */
        /* #home{
            margin-left: 480px;
            color: white;
        }
        #logout{
            margin-left: 510px;
            color: white;
        } */
        .rt-list{
            float: right;
        }
        .rt-list li{
            list-style: none;
            padding-left: 10px;
            float: right;
        }

        body{
            background-color:wheat;
        }

        #row{
            margin-top: 20px;
        }

        .heading{
            margin-top: 15px;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="container">
            <div class="row" id="row" style="margin-top: 10px">
                <div class="col-lg-8 text-center">
                    <h5 class="heading" style="color:blue">Expert System For Pediatric Leukemia</h5>
                </div>
                <div class="col-lg-4">
                    <ul class="d-flex rt-list" style="margin-top: 10px">
                        <li><h5 id="home"><a href="{{ route('doctor.index') }}" class="btn btn-primary">Home</a></h5>
                            </li>
                        <li><h5 id="logout"><a href="{{ route('doctor.logout') }}" class="btn btn-dark">Logout</a></h5></li>
                    </ul>
                </div>
            </div>


        </div>
    </div>

    @yield('content')

</body>
</html>
