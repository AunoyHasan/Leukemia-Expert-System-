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

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <title>
        @yield('title')
    </title>

    <style>
        .dropify-message p {
           font-size: initial;
           min-height: 500px;
       }
       .ck-editor__editable {
           min-height: 200px;
       }
       .dropify-wrapper{
           height: 700px;
       }
    </style>

</head>

<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
   
</body>
</html>
