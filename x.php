<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Sekolah Asal</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pegawai";
        $query = mysqli_query($db, $sql);

        while($pegawai = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$pegawai['id_pegawai']."</td>";
            echo "<td>".$pegawai['username']."</td>";
            echo "<td>".$pegawai['password']."</td>";
            echo "<td>".$pegawai['nama_pegawai']."</td>";
            echo "<td>".$pegawai['alamat_pegawai']."</td>";
            echo "<td>".$pegawai['hp_pegawai']."</td>";
            echo "<td>".$pegawai['id_bagian']."</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>