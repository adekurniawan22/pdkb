<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF LAPORAN</title>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <h2 class="text-uppercase mt-2 ms-3" style="color: black;"><i class="bi bi-exclamation-octagon me-1"></i> Pesan Penting</h2>
        </div>
        <div class="card-body pt-3">
            <ul class="ps-3">
                <!-- Peringatan Rencana Pekerjaan -->
                <?php if (!empty($p_rencana_operasi)) : ?>
                    <li class="">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold text-dark">Rencana Pekerjaan</span>
                        </h6>
                        <p class="text-xs text-secondary mb-2">
                            Terdapat <span class="text-danger font-weight-normal"><?= $jp_rencana_operasi ?></span> rencana operasi yang belum dikerjakan dalam bulan ini.
                        </p>
                        <ul>
                            <?php foreach ($p_rencana_operasi as $r) : ?>
                                <li class="mb-1">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold text-dark"><?= $r->nama_rencana ?></span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        Rencana diselesaikan pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_dikerjakan)) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                <?php endif ?>

                <!-- Peringatan Anomali Gardu Induk -->
                <?php if (!empty($p_gardu_induk)) : ?>
                    <li class="">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold text-dark">Gardu Induk</span>
                        </h6>
                        <p class="text-xs text-secondary mb-2">
                            Terdapat <span class="text-danger font-weight-normal"><?= $jp_gardu_induk ?></span> gardu induk yang akan dikerjakan dalam rentang waktu hari ini hingga 1 bulan kedepan.
                        </p>
                        <ul>
                            <?php foreach ($p_gardu_induk as $r) : ?>
                                <li class="mb-1">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold text-dark"><?= $r->gardu_induk ?></span><br>
                                        <span class="text-dark"><?= nl2br($r->bay) ?></span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        Rencana dieksekusi pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_eksekusi)) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                <?php endif ?>

                <!-- Peringatan Anomali Jaringan -->
                <?php if (!empty($p_jaringan)) : ?>
                    <li class="">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold text-dark">Jaringan</span>
                        </h6>
                        <p class="text-xs text-secondary mb-2">
                            Terdapat <span class="text-danger font-weight-normal"><?= $jp_jaringan ?></span> jaringan yang akan dikerjakan dalam rentang waktu hari ini hingga 1 bulan kedepan.
                        </p>
                        <ul>
                            <?php foreach ($p_jaringan as $r) : ?>
                                <li class="mb-1">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold text-dark">Tower nomor <?= $r->no_tower ?></span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        Rencana dieksekusi pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_eksekusi)) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                <?php endif ?>

                <!-- Peringatan Alat Kerja -->
                <?php if (!empty($p_alat_kerja)) : ?>
                    <li class="">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold text-dark">Alat Kerja</span>
                        </h6>
                        <p class="text-xs text-secondary mb-2">
                            Terdapat <span class="text-danger font-weight-normal"><?= $jp_alat_kerja ?></span> alat kerja yang akan kedaluarsa dalam satu bulan ke depan.
                        </p>
                        <ul>
                            <?php foreach ($p_alat_kerja as $r) : ?>
                                <li class="mb-1">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold text-dark"><?= $r->nama_alat_kerja ?></span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        Akan kadaluarsa pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                <?php endif ?>

                <!-- Peringatan Alat Kerja Tower ERS -->
                <?php if (!empty($p_alat_tower_ers)) : ?>
                    <li class="mb-4">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold text-dark">Alat Kerja Tower ERS</span>
                        </h6>
                        <p class="text-xs text-secondary mb-2">
                            Terdapat <span class="text-danger font-weight-normal"><?= $jp_alat_tower_ers ?></span> alat kerja yang akan kedaluarsa dalam satu bulan ke depan.
                        </p>
                        <ul>
                            <?php foreach ($p_alat_tower_ers as $r) : ?>
                                <li class="mb-1">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold text-dark"><?= $r->nama_alat_tower_ers ?></span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        Akan kadaluarsa pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</body>

</html>