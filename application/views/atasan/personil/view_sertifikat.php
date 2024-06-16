<div class="container-fluid py-2">
  <div class="row">
    <?php if (!empty($sertifikat)) : ?>
      <?php foreach ($sertifikat as $s) : ?>
        <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4 pb-4">
          <div class="card mb-2">
            <div class="card-header mb-0 pb-0">
              <div class="row">
                <div class="col-8">
                  <h3 class="text-dark mb-0"><?= $s->nama_sertifikat ?></h3>
                  <span class="text-dark">Sertifikat <?= $s->jenis_sertifikat ?></span>
                  <?php if ($s->tanggal_kadaluarsa) : ?>
                    <span class="text-dark"><em>(berlaku sampai <?= date('d-F-Y', strtotime($s->tanggal_kadaluarsa)) ?>)</em></span>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class=" card-body p-3">
              <?php renderSertifikat($s); ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3 min-height-300 d-flex justify-content-center align-items-center">
            <h3 class="text-center">Personil ini tidak mempunyai sertifikat</h3>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="row mt-3">
    <div class="col-12">
      <a href="<?= base_url() ?>atasan/personil" class="btn btn-primary btn-lg w-100">Kembali</a>
    </div>
  </div>
</div>

<?php
function renderSertifikat($sertifikat)
{
  $extension = pathinfo($sertifikat->nama_file, PATHINFO_EXTENSION);
  $file_path = base_url('assets/img/sertifikat/' . $sertifikat->nama_file);
?>
  <?php if ($extension == "pdf") : ?>
    <embed src="<?= base_url() ?>assets/img/sertifikat/<?= $sertifikat->nama_file ?>" type="application/pdf" width="100%" height="500px">
  <?php elseif (in_array($extension, ["jpg", "jpeg", "png"])) : ?>
    <img src="<?= $file_path ?>" alt="Gambar Sertifikat" width="100%">
  <?php else : ?>
    <img src="<?= base_url() ?>assets/img/sertifikat/error/error.png" alt="Error" width="100%" style="filter: grayscale(100%);">
<?php endif;
}
?>