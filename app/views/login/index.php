<?php

$error = false;
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Koneksi Ke Server Errror!");
mysqli_select_db($koneksi, DB_NAME) or die('Koneksi ke database error!');

if (isset($_POST['submit'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $sql_login = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$user' AND nim ='$pass'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($sql_login) > 0) {
        session_start();
        $_SESSION['username'] = $user;
        echo $_SESSION['username'];
        header("Location: profile");
    } elseif ($user == "admin" && $pass == "admin") {
        session_start();
        $_SESSION['admin'] = $user;
        header("Location: admin");
    } else {
        $error = true;
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">

    <!-- Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/437e7a97ad.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Costum Style -->
    <link rel="stylesheet" href="<?= BASEURL ?>/css/Stylelogin.css" />
</head>

<body>
    <?php if ($error == true) : ?>
        <div class="alert alert-danger alert-dismissable alertgagal" role="alert">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <p id="pesanalert">Username atau Password yang dimasukan salah ! </p>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row col-12">
            <div class="col-sm-7 panel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= BASEURL ?>/img/undraw_authentication_fsn5.svg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= BASEURL ?>/img/undraw_fingerprint_swrc.svg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= BASEURL ?>/img/undraw_personal_data_29co.svg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-sm-4 login" style="background:whitesmoke">
                <form action="" method="post">
                    <h2 class="judulLogin">ErdEv</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk Mahasiswa</label>

                        <input autocomplete="off" type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nim">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your nim with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Read Me!
                    </button>

                </form>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catatan Developer </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: red">This website is still under development !!!</p>
                    <p>Untuk melakukan CRUD Data mahasiswa silahkan memasukan User Admin dibawah !</p>
                    Username : admin <br> Password : admin
                    <br>
                    <br>
                    <hr>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha256-251s88HEsEfGL2RufZmRwGohKTHDYr9T+aJAazDwlGY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>