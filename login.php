<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Sistem Ekstrakurikuler Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Ekstrakurikuler Siswa" name="description" />
    <meta content="FRORP Creative Studio" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern" style="background-image: url('smk.jpg');">
    <div class="home-btn d-none d-sm-block">
        <a href="index.php" class="text-white"> Home <i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h5 class="font-size-16 text-white-50 mb-4">SISTEM EKSTRAKULIKULER SISWA</h5>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <form class="form-horizontal" action="login_verification.php" method="post">

                                    <div class="form-group mb-4">
                                        <label for="username">Email / Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Email/Username">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Masukan password">
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <!-- <a href="register.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Buat Akun Baru</a> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>
