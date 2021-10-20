<?php

require 'functions.php';

if (isset($_POST["registrasi"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Registrasi berhasil');
            document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <title>Registrasi</title>
</head>

<body>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Registrasi - PPDB</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="username" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Minimal 8 Karakter" minlength="8" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repassword" class="col-sm-2 col-form-label">Re-Type Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Re-Type Password" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label">Pin</label>
                    <div class="col-sm-10">
                        <input type="password" name="pin" class="form-control" id="pin" placeholder="6 Digit PIN" onkeypress="return hanyaAngka(event)" minlength="6" maxlength="6" required autofocus>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-secondary float-right" name="registrasi" type="submit">Submit</button>
                <a href="index.php" type="submit" class="btn btn-default float-right">Cancel</a>
                <div class="checkbox">
                    Sudah Punya Akun? <a href="login.php" style="text-decoration: none;" class="link-primary">Klik disini untuk Masuk!</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</body>

</html>