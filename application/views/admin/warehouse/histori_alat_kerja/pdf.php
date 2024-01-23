<!DOCTYPE html>
<html>

<head>
    <title>PDF Histori Alat Kerja</title>
</head>

<style>
    .table-header {
        border-collapse: collapse;
        /* Menggabungkan border-cells untuk hasil yang lebih konsisten */
        width: 100%;
        padding: 10px;
    }

    .table-content {
        border-collapse: collapse;
        width: 100%;
    }

    .table-content th,
    .table-content td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    .footer-kanan {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }

    .footer-kiri {
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    .styled-list li {
        margin-left: -20px;
    }


    .titikdua {
        padding: 0 20px;
        /* Tambahkan jarak 10 piksel ke kiri dan kanan dalam setiap td */
    }
</style>

<body>
    <?php if (!empty($query)) { ?>
        <div class="container mt-5">
            <table class="table-header" style="background-color: #2f519e; color: white; border: 0px !important">
                <tr>
                    <td rowspan="4">
                        <img src="<?= $foto ?>" style="width: 80px;">
                    </td>
                    <td rowspan="4" style=" text-align:center">
                        <h2>FORM STOK KELUAR/MASUK GUDANG</h2>
                    </td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td style="text-align: left;">Petugas</td>
                    <td class="titikdua">: <?= $query[0]['penanggung_jawab'] ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Tanggal Keluar</td>
                    <td class="titikdua">: <?= $query[0]['tanggal_keluar'] ?></td>
                </tr>
                <?php if ($query[0]['tanggal_masuk'] == '0000-00-00') : ?>
                    <tr>
                        <td style="text-align: left;">Tanggal Masuk</td>
                        <td class="titikdua">: -</td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td style="text-align: left;">Tanggal Masuk</td>
                        <td class="titikdua">: <?= $query[0]['tanggal_masuk'] ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td style="text-align: left;">Jenis Pekerjaan</td>
                    <td class="titikdua">: <?= $query[0]['keterangan'] ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Status</td>
                    <td class="titikdua">: <?= $query[0]['status'] ?></td>
                </tr>
            </table>


            <br>
            <table class=" table-content">
                <tbody>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Spesifikasi</th>
                        <th>Stok</th>
                        <th>Jumlah Alat Keluar</th>
                    </tr>
                    <?php $nomor = 1; ?>
                    <?php foreach ($query as $q) : ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td>
                                <!-- <ul class="styled-list">
                                    <li><= $q['nama_alat_kerja'] . ' (' . $q['jumlah'] . ')' ?></li>
                                </ul> -->
                                <?= $q['nama_alat_kerja'] ?>
                            </td>
                            <td><?= $q['jenis'] ?></td>
                            <td><?= $q['spesifikasi'] ?></td>
                            <td><?= $q['jumlah'] ?></td>
                            <td><?= $q['jumlah_barang_keluar'] ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach; ?>
                    <!-- Anda dapat menambahkan lebih banyak baris transaksi di sini -->
                </tbody>
            </table>
        </div>

        <div class="footer-kiri">
            <div style="margin-bottom: 120px; text-align: center;">
                <?= $query[0]['penanggung_jawab'] ?>
            </div>
            <div style="border-top: 1px solid #000; width: 100px;"></div>
        </div>

        <div class="footer-kanan">
            <div style="margin-bottom: 120px; text-align: center;">
                Atasan
            </div>
            <div style="border-top: 1px solid #000; width: 100px;"></div>
        </div>
    <?php } else { ?>
        <h2 style="text-align: center;">Gagal Memuat PDF</h2>
    <?php } ?>
</body>

</html>