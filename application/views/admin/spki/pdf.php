<!DOCTYPE html>
<html>

<head>
    <title>PDF SPKI</title>
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
        vertical-align: top;
    }

    .signature {
        margin-top: 30px;
        float: right;
        padding-top: 10px;
        text-align: center;
        page-break-inside: avoid;
    }

    .styled-list li {
        margin-left: -20px;
    }

    .titikdua {
        padding: 0 5px;
    }

    .bn {
        border-top: none !important;
        border-bottom: none !important;
        ;
        border-left: none !important;
        ;
        border-right: none !important;
        ;
    }

    .bn-xr {
        border-top: none !important;
        border-bottom: none !important;
        ;
        border-left: none !important;
        ;
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
                    <td rowspan="4" style="padding-left:20px; text-align:left">
                        <h4>PT PLN (PERSERO) UNIT INDUK PENYALURAN DAN PUSAT PENGATUR BEBAN KALIMANTAN</h4>
                        <h4>UNIT PEMELIHARAAN TRANSMISI</h4>
                    </td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td style="text-align: left;">Kepada</td>
                    <td class="titikdua">: <?= $query[0]['kepada'] ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Dari</td>
                    <td class="titikdua">: <?= $query[0]['dari'] ?></td>
                </tr>
            </table>
            <br>
            <table class="table-content">
                <tr>
                    <th>Macam Pekerjaan</th>
                    <td colspan="3"><?= $query[0]['macam_pekerjaan'] ?></td>
                </tr>
                <tr>
                    <th>Lokasi Pekerjaan</th>
                    <td colspan="3"><?= nl2br($query[0]['lokasi_pekerjaan']) ?></td>
                </tr>
                <tr>
                    <th>Waktu Pelaksanaan</th>
                    <td colspan="3"><?= date('d/m/Y', strtotime($query[0]['mulai_pelaksanaan'])) . ' - ' . date('d/m/Y', strtotime($query[0]['selesai_pelaksanaan'])) ?></td>
                </tr>
                <tr>
                    <th rowspan="4">Nama / Jumlah Pelaksana</th>
                    <td style="width: 25%;" class="bn">
                        <b>PJ Pekerjaan</b>
                    </td>
                    <td style="width: 2px;" class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query[0]['pj']) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pengawas Pekerjaan</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query[0]['pengawas']) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pengawas K3</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query[0]['pengawas_k3']) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pelaksana</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query[0]['pelaksana']) ?></td>
                </tr>
                <tr>
                    <th>Peralatan Yang Dipakai</th>
                    <td colspan="3"><?= nl2br($query[0]['alat_kerja']) ?></td>
                </tr>
                <tr>
                    <th>Uraian Kerja</th>
                    <td colspan="3"><?= nl2br($query[0]['uraian_kerja']) ?></td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td colspan="3"><?= nl2br($query[0]['catatan']) ?></td>
                </tr>
            </table>
        </div>

        <div class="signature">
            <div style="margin-bottom: 10px;">Balikpapan, <?= $tanggal_sekarang ?></div>
            <div style="margin-bottom: 120px; text-align: center;">
                <b><?= nl2br($query[0]['dari']) ?></b>
            </div>
            <b><?= nl2br($query[0]['pj']) ?></b>
        </div>

    <?php } else { ?>
        <h2 style="text-align: center;">Gagal Memuat PDF</h2>
    <?php } ?>
</body>

</html>