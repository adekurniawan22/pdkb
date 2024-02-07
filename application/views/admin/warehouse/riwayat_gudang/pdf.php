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
        margin-bottom: 150px;
    }

    .table-content th,
    .table-content td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
        vertical-align: top;
    }

    footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .left-signature {
        margin-left: 50px;
        float: left;
    }

    .right-signature {
        margin-right: 50px;
        float: right;
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
                        <h3>FORM STOK KELUAR/MASUK GUDANG TOWER ERS</h3>
                    </td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td style="text-align: left;">Petugas</td>
                    <td class="titikdua">: <?= $riwayat_gudang->penanggung_jawab ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Tanggal Keluar</td>
                    <td class="titikdua">: <?= date('d/m/Y', strtotime($riwayat_gudang->tanggal_keluar))  ?></td>
                </tr>
                <?php if ($riwayat_gudang->tanggal_masuk == null) : ?>
                    <tr>
                        <td style="text-align: left;">Tanggal Masuk</td>
                        <td class="titikdua">: -- / -- / ----</td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td style="text-align: left;">Tanggal Masuk</td>
                        <td class="titikdua">: <?= date('d/m/Y', strtotime($riwayat_gudang->tanggal_masuk)) ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td style="text-align: left;">Jenis Pekerjaan</td>
                    <td class="titikdua">: <?= $riwayat_gudang->keterangan ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Status</td>
                    <td class="titikdua">: <?= $riwayat_gudang->status ?></td>
                </tr>
            </table>


            <br>
            <table class=" table-content">
                <tbody>
                    <tr>
                        <th>No.</th>
                        <th>Nama Alat</th>
                        <th>Jenis</th>
                        <th>Merk</th>
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
                                <?= $q['nama_alat_tower_ers'] ?>
                            </td>
                            <td><?= $q['jenis'] ?></td>
                            <td><?= $q['merk'] ?></td>
                            <td><?= $q['spesifikasi'] ?></td>
                            <td><?= $q['jumlah'] ?></td>
                            <td><?= $q['jumlah_barang_keluar'] ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <footer>
            <div class="signatures">
                <div class="left-signature">
                    <div style="text-align: center;">
                        Penanggung Jawab
                        <div>
                            <img width="200px" src="<?= base_url() ?>assets/img/tanda-tangan/<?= $riwayat_gudang->tanda_tangan ?>" alt="" style="margin-top: 20px;">
                        </div>
                    </div>
                    <p style="text-align: center;"><?= $riwayat_gudang->penanggung_jawab ?></p>
                </div>
                <div class="right-signature">
                    <?php if ($atasan) : ?>
                        <div style="text-align: center;">
                            <?= $atasan->nama_jabatan ?>
                            <div>
                                <img width="200px" src="<?= base_url() ?>assets/img/tanda-tangan/<?= $atasan->tanda_tangan ?>" alt="" style="margin-top: 20px;">
                            </div>
                        </div>
                        <p style="text-align: center;"><?= $atasan->nama ?></p>
                    <?php else : ?>
                        <div style="margin-bottom: 150px; text-align: center;">
                            Atasan
                        </div>
                        <div style="border-top: 1px solid #000; width: 100px;"></div>
                    <?php endif ?>
                </div>
            </div>
        </footer>

    <?php } else { ?>
        <h2 style="text-align: center;">Gagal Memuat PDF</h2>
    <?php } ?>
</body>

</html>