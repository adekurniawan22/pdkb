<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Alat Kerja</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama ALat</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Spesifikasi</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Sedang Dipinjam</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Kadaluarsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alat_kerja as $a) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jenis ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->nama_alat_kerja ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($a->spesifikasi) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jumlah . ' ' . $a->satuan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->sedang_dipinjam . ' ' . $a->satuan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($a->tanggal_kadaluarsa == null) : ?>
                                                <p class="text-sm font-weight-bold mb-0">Tidak ada</p <?php else : ?> <p class="text-sm font-weight-bold mb-0"><?= $a->tanggal_kadaluarsa ?></p>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>