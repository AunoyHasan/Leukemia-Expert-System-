
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .span1{
        text-align: left;
        font-size: 28px;
    }
</style>
</head>
<body>

    <div class="body">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="system-name col-lg-6">
                       <p class="p1"><span class="span1"><b>Expert System For Padiatric Leukemia</b></span></p>
                    </div>
                    <div class="nav-bar col-lg-6 text-right">
                        <a href="{{  route('doctor.login') }}" class="sign-in">Signin/Signup</a>
                        <!-- <a href="" class="sign-up">Signup</a> -->
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div>
            <div class="row">
                <div class="col-md-6">
                    <img src="images/index" alt="fff" id="image1">
                </div>

                <div class="col-md-6">
                    <img src="images/index" alt="" id="image2">
                </div>
            </div>
        </div>
        <br>

        <div class="developper">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-1" id="card-1">
                        <div class="card-header"><b>Developper</b></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Mahmudul Hasan Aunoy</td>
                                </tr>

                                <tr>
                                    <th>Id</th>
                                    <td>19-41110-2</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-2">
                        <div class="card-header"><b>Developper</b></div>
                        <!-- <div class="card-header"><b>Database Maintainer</b></div> -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Md Shariar</td>
                                </tr>

                                <tr>
                                    <th>Id</th>
                                    <td>18-37789-2</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-3">
                        <div class="card-header"><b>Developper</b></div>
                        <!-- <div class="card-header"><b>SRS Provider</b></div> -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Md. Ibrahim Hossain Rifat</td>
                                </tr>

                                <tr>
                                    <th>Id</th>
                                    <td>18-37888-2</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-4">
                        <div class="card-header"><b>Developper</b></div>
                        <!-- <div class="card-header"><b>Tester</b></div> -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Ali Antoraj</td>
                                </tr>

                                <tr>
                                    <th>Id</th>
                                    <td>18-38901-3</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="domain-expert">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-5">
                        <div class="card-header"><b>Domain Expert</b></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Dr Farhana Arju</td>
                                </tr>

                                <tr>
                                    <th>Education</th>
                                    <td>MBBS,BCS, MCPS(pediatrics), FCPS - PART ii, MD.</td>
                                </tr>

                                <tr>
                                    <th>Expertise Area</th>
                                    <td>Pediatric Hematology & Oncology</td>
                                </tr>

                                <tr>
                                    <th>Current Position</th>
                                    <td>OSD, DGHS, Deputation - BSMMU</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="domain-expert">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-5">
                        <div class="card-header"><b>Supervisor</b></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>Md Anwarul Kabir</td>
                                </tr>

                                <tr>
                                    <th>Position</th>
                                    <td>
                                        Associate Professor <br>
                                        American Internation University-Bangladesh
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <script src="{{asset('images/index')}}javascript.js"></script> -->
    <script>
        let images = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg', 'image6.jpg', 'image7.jpg', 'image8.jpg', 'image9.jpeg'];
        let images2 = ['p1.png', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p5.jpg', 'p6.jpg', 'p7.png', 'p8.jpg', 'p9.jpg'];
        var index = 0;
        function change() {
            document.getElementById("image1").src = images[index];
            document.getElementById("image2").src = images2[index];
            if (index == 9) {
                index = 0;
            } else {
                index++;
            }
            setTimeout(change, 3000);
        }
        window.onload = change();
    </script>

</body>
</html>
