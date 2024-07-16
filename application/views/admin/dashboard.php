<div class="container-fluid py-2">
  <div class="row">
    <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Rencana Pekerjaan Selesai</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $jumlah_semua_rencana_operasi_selesai  ?>
                </h5>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Personil</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $jumlah_personil ?>
                </h5>
              </div>
            </div>
            <div class="col-3 text-center">
              <div class="icon icon-shape bg-gradient-primary shadow-primary position-relative rounded-circle">
                <i class="bi bi-people-fill text-lg opacity-10 position-absolute top-50 start-50 translate-middle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Alat Kerja</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $jumlah_alat_kerja ?>
                </h5>
              </div>
            </div>
            <div class="col-3 text-center">
              <div class="icon icon-shape bg-gradient-info shadow-primary position-relative rounded-circle">
                <i class="bi bi-tools text-lg opacity-10 position-absolute top-50 start-50 translate-middle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Alat Tower ERS</p>
                <h5 class="font-weight-bolder mb-0">
                  <?= $jumlah_personil ?>
                </h5>
              </div>
            </div>
            <div class="col-3 text-center">
              <div class="icon icon-shape bg-gradient-info shadow-primary position-relative rounded-circle">
                <i class="bi bi-tools text-lg opacity-10 position-absolute top-50 start-50 translate-middle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12 mb-4">
      <div class="row">
        <div class="col-5">
          <div class="card z-index-2">
            <div class="row bg-danger mx-0 border-radius-md align-items-center">
              <div class="col-12">
                <h6 class="text-uppercase mt-2 ms-3 py-2" style="color: black;"><i class="bi bi-exclamation-octagon me-1"></i> Notifikasi Peringatan</h6>
              </div>
            </div>
            <div class="card-body pt-3">
              <?php if ($total_jp > 0) : ?>
                <ul class="ps-3">
                  <!-- Peringatan Sertifikat Personil -->
                  <?php if (!empty($p_sertifikat)) : ?>
                    <li class="">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold text-dark">Sertifikat Personil</span>
                      </h6>
                      <p class="text-xs text-secondary mb-2">
                        Terdapat <span class="text-danger font-weight-normal"><?= $jp_sertifikat ?></span> sertifikat personil yang akan kadaluarsa dalam rentang waktu hari ini hingga 1 bulan kedepan.
                      </p>
                      <ul>
                        <?php foreach ($p_sertifikat as $r) : ?>
                          <li class="mb-1">
                            <h6 class="text-sm font-weight-normal mb-1">
                              <span class="font-weight-bold text-dark"><?= $r->nama ?></span>
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                              Nama Sertifikat : "<?= $r->nama_sertifikat ?>"
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Jenis Sertifikat : <?= $r->jenis_sertifikat ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Akan kadaluarsa pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) ?>
                            </p>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                  <?php endif ?>

                  <!-- Peringatan Rencana Pekerjaan -->
                  <!-- <?php if (!empty($p_rencana_operasi)) : ?>
                    <li class="">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold text-dark">Rencana Pekerjaan</span>
                      </h6>
                      <p class="text-xs text-secondary mb-2">
                        Terdapat <span class="text-danger font-weight-normal"><?= $jp_rencana_operasi ?></span> rencana pekerjaan yang belum dikerjakan dalam bulan ini.
                      </p>
                      <ul>
                        <?php foreach ($p_rencana_operasi as $r) : ?>
                          <li class="mb-1">
                            <h6 class="text-sm font-weight-normal mb-1">
                              <span class="font-weight-bold text-dark"><?= $r->nama_rencana ?></span>
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                              Keterangan : "<?= $r->keterangan ?>"
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Rencana diselesaikan pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_dikerjakan)) ?>
                            </p>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                  <?php endif ?> -->

                  <!-- Peringatan Anomali Gardu Induk -->
                  <?php if (!empty($p_gardu_induk)) : ?>
                    <li class="">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold text-dark">Anomali Gardu Induk</span>
                      </h6>
                      <p class="text-xs text-secondary mb-2">
                        Terdapat <span class="text-danger font-weight-normal"><?= $jp_gardu_induk ?></span> gardu induk yang akan dikerjakan dalam rentang waktu hari ini hingga 1 bulan kedepan.
                      </p>
                      <ul>
                        <?php foreach ($p_gardu_induk as $r) : ?>
                          <li class="mb-1">
                            <h6 class="text-sm font-weight-normal mb-1">
                              <span class="font-weight-bold text-dark"><?= $r->gardu_induk ?></span><br>
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                              Bay : <?= str_replace("\n", ", ", $r->bay) ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Fasa : <?= nl2br($r->fasa) ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Rencana dieksekusi pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_ews)) ?>
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
                        <span class="font-weight-bold text-dark">Anomali Jaringan</span>
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
                              Bay : <?= str_replace("\n", ", ", $r->bay_line) ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Fasa : <?= nl2br($r->fasa) ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Rencana dieksekusi pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_ews)) ?>
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
                        <span class="font-weight-bold text-dark">Alat Gudang Gardu Induk</span>
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
                              Jenis : <?= $r->jenis ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Jumlah : <?= $r->jumlah . " " . $r->satuan ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Akan kadaluarsa pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) ?>
                            </p>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                  <?php endif ?>

                  <!-- Peringatan Alat Kerja -->
                  <?php if (!empty($p_alat_kerja)) : ?>
                    <li class="">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold text-dark">Alat Gudang Jaringan</span>
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
                              Jenis : <?= $r->jenis ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Jumlah : <?= $r->jumlah . " " . $r->satuan ?>
                            </p>
                            <p class="text-xs text-secondary mb-0">
                              Akan kadaluarsa pada tanggal <?= date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) ?>
                            </p>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <hr class="bg-secondary mx-0">
                  <?php endif ?>
                </ul>
              <?php else : ?>
                <h6>Tidak ada notifikasi peringatan saat ini</h6>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card z-index-2 h-100">
            <div class="card-header bg-transparent">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Ringkasan Rencana Pekerjaan Tahun Ini (<?= date('Y') ?>)</h6>
              <div class="progress-wrapper">
                <div class="progress-info">
                  <div class="progress-percentage">
                    <span class="text-sm font-weight-bold"><?= $dapat_persentase_rencana_tahun_ini ?>%</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?= $dapat_persentase_rencana_tahun_ini ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $dapat_persentase_rencana_tahun_ini ?>%;"></div>
                </div>
              </div>
            </div>
            <hr class="bg-dark mx-3">
            <div class="card-body p-3">
              <div class="row">
                <?php foreach ($jumlah_rencana_selesai_perbulan['result'] as $data) : ?>
                  <div class="col-xl-4 mb-3">
                    <div class="card <?= ($data->bulan <= date('n')) ? 'bg-gradient-success' : 'bg-gradient-warning'; ?> shadow">
                      <div class="card-body">
                        <h6 class="text-dark text-uppercase text-muted ls-1 mb-1"><?= $jumlah_rencana_selesai_perbulan['bulan_indonesia'][$data->bulan - 1]; ?></h6>
                        <div class="d-flex align-items-center">
                          <h2 class="text-dark font-weight-bold mb-0 me-2"><i class="bi bi-list-stars"></i></h2>
                          <h2 class="text-dark font-weight-bold mb-1"><?= $data->jumlah_rencana_dikerjakan; ?></h2>
                        </div>
                        <p class="text-dark text-muted mt-3 mb-0">Selesai: <?= $data->jumlah_rencana_selesai; ?></p>
                        <p class="text-dark text-muted mt-0">Belum Selesai: <?= $data->jumlah_rencana_dikerjakan - $data->jumlah_rencana_selesai; ?></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>