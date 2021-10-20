<?php

session_start();

require 'functions.php';

if (isset($_POST["login"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_md5 = md5($password);
    $pin = $_POST['pin'];
    $pin_sha1 = sha1($pin);

    $result = mysqli_query($conn, "SELECT * FROM data_akun WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($result);

    include "lib/lib.php";
    $enkripsi = str_replace(" ", "", $rows['enkripsi']);
    $panjang_kunci = strlen($pin);
    $panjang_ciper = strlen($enkripsi);
    $index_x = 0;
    $index_y = 0;
    $hasil_konversi = array();
    $dekripsi = "";
    while ($index_x < $panjang_ciper) {
        $x = substr($enkripsi, $index_x, 1);
        $y = substr($pin, $index_y, 1);
        $konversi_x = huruf_ke_angka($x);
        $konversi_y = $y;
        if ($konversi_x >= $konversi_y) {
            $hasil = $konversi_x - $konversi_y;
        } else {
            $hasil = $konversi_x + (26 - $konversi_y);
        }
        $hasil_konversi[$index_x] = angka_ke_huruf($hasil);
        $index_x++;
        $index_y++;
        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }
    $i = 0;
    while ($i < $index_x) {
        $dekripsi .= $hasil_konversi[$i];
        $i++;
    }

    if (mysqli_num_rows($result)) {

        if ($password_md5 == $rows['password']) {

            if ($pin_sha1 == $rows['pin']) {

                if ($dekripsi == $rows['username']) {
                    echo "
                    <script>
                        alert('Login Berhasil')
                    </script>
                    ";

                    $_SESSION["login"] = true;
                    header("Location: dashboard\index.php?id=$rows[id]");
                    exit;
                }
            }
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <title>Login</title>
</head>

<body>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Login - PPDB</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label">Pin</label>
                    <div class="col-sm-10">
                        <input type="password" name="pin" class="form-control" id="pin" placeholder="6 Digit PIN" onkeypress="return hanyaAngka(event)" minlength="6" maxlength="6" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-secondary float-right" name="login" type="submit">Login</button>
                <a href="index.php" type="submit" class="btn btn-default float-right">Cancel</a>
                <div class="checkbox">
                    Belum memiliki akun? <a href="registrasi.php" style="text-decoration: none;" class="link-primary">Klik disini untuk Registrasi!</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>