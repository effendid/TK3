<?php
// header('Content-Type: application/json');

// require_once('config.php');

// $sqlQuery = "SELECT id_pesanan,nama_pemesan,jumlah_pesanan FROM pemesanan ORDER BY id_pesanan";

// $result = mysqli_query($db,$sqlQuery);

// $data = array();
// foreach ($result as $row) {
// 	$data[] = $row;
// }

// mysqli_close($conn);

// echo json_encode($data);
header('Content-Type: application/json');
require_once("config.php");

//query tabel
$sqlQuery =
    "SELECT barang.nama_barang, ROUND(
    (
            1 + ((2 * produksi.lead_time) / 30) + (
            (2 * produksi.lead_time ^ 2) / (30 ^ 2)
            )
        ),
    3
) AS parameter,
 ROUND(
    (
        (
            STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)
        ) / (
            STDDEV(jumlah_produksi) / AVG(jumlah_produksi)
        )
    ),
    3
) AS BE
FROM barang
    INNER JOIN pemesanan ON pemesanan.id_barang = barang.id_barang
    INNER JOIN produksi ON produksi.id_barang = pemesanan.id_barang
GROUP BY barang.nama_barang,
    produksi.lead_time";
$result = mysqli_query($db, $sqlQuery);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
