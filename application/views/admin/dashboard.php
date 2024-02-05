<div class="container-fluid py-2">
  <div class="row">
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Personil</p>
                <h5 class="font-weight-bolder">
                  <?= $jumlah_personil ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="bi bi-people-fill pb-2 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Rencana Operasi Selesai</p>
                <h5 class="font-weight-bolder">
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
    <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Alat Kerja</p>
                <h5 class="font-weight-bolder">
                  <?= $jumlah_alat_kerja ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-ruler-pencil text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header bg-transparent">
          <h6 class="text-uppercase text-muted ls-1 mb-1">Ringkasan Rencana Operasi Tahun Ini (<?= date('Y') ?>)</h6>
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
              <div class="col-xl-3 mb-3">
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