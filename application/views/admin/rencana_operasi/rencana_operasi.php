<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0 mt-2">
                            <h5>Data Rencana Operasi</h5>
                        </div>
                    </div>
                </div>
                </style>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama Rencana Operasi</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis Anomali</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Dikerjakan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Selesai</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status Dikerjakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rencana_operasi as $r) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $r->nama_rencana ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $r->jenis_anomali ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($r->keterangan) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($r->tanggal_dikerjakan)) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($r->tanggal_selesai != null) : ?>
                                                <p class=" text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($r->tanggal_selesai)) ?></p>
                                            <?php else : ?>
                                                <p class=" text-sm font-weight-bold mb-0">-- / -- / ----</p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($r->status == '1') : ?>
                                                <span class=" badge badge-sm bg-gradient-success">Selesai</span>
                                            <?php else : ?>
                                                <span class=" badge badge-sm bg-gradient-warning">Belum</span>
                                            <?php endif; ?>
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