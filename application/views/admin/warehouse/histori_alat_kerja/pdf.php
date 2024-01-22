<!DOCTYPE html>
<html>

<head>
    <title>PDF Histori Alat Kerja</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    .footer {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }

    .styled-list li {
        margin-left: -20px;
    }
</style>

<body>
    <div class="container mt-5">
        <h2>Peminjaman Alat Kerja</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nama Barang</th>
                    <td>
                        <ul class="styled-list">
                            <?php foreach ($query as $q) : ?>
                                <li><?= $q['nama_alat_kerja'] . ' (' . $q['jumlah'] . ')' ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><?= $q['keterangan'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td><?= $q['tanggal_peminjaman'] ?></td>
                </tr>
                <!-- Anda dapat menambahkan lebih banyak baris transaksi di sini -->
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div style="margin-bottom: 120px; text-align: center;">
            <?= $tanggal_sekarang ?>
        </div>
        <div>Tanda Tangan</div>
    </div>
</body>

</html>