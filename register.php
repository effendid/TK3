<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nama_pegawai = filter_input(INPUT_POST, 'nama_pegawai', FILTER_SANITIZE_STRING);
    $alamat_pegawai = filter_input(INPUT_POST, 'alamat_pegawai', FILTER_SANITIZE_STRING);
    $hp_pegawai = filter_input(INPUT_POST, 'hp_pegawai', FILTER_SANITIZE_STRING);
    $id_bagian = filter_input(INPUT_POST, 'id_bagian', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $sql = "INSERT INTO pegawai (username, password, nama_pegawai, alamat_pegawai, hp_pegawai, id_bagian) 
            VALUES (:username, :password, :nama_pegawai, :alamat_pegawai, :hp_pegawai, :id_bagian)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":nama_pegawai" => $nama_pegawai,
        ":alamat_pegawai" => $alamat_pegawai,
        ":hp_pegawai" => $hp_pegawai,
        ":id_bagian" => $id_bagian
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">username</label>
                <input class="form-control" type="text" name="username" placeholder="username" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <div class="form-group">
                <label for="nama_pegawai">nama pegawai</label>
                <input class="form-control" type="text" name="nama_pegawai" placeholder="nama pegawai" />
            </div>

            <div class="form-group">
                <label for="alamat_pegawai">alamat pegawai</label>
                <input class="form-control" type="text" name="alamat_pegawai" placeholder="alamat pegawai" />
            </div>

            <div class="form-group">
                <label for="hp_pegawai">No HP</label>
                <input class="form-control" type="text" name="hp_pegawai" placeholder="08116116116" />
            </div>

            <div class="form-group">
                <label for="id_bagian">bagian</label>
                <input class="form-control" type="text" name="id_bagian" placeholder="e.g : 1 or 2" />
            </div>

            

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>
