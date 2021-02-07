SELECTROUND(
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
    produksi.lead_time