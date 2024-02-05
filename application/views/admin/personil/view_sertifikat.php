<div class="container-fluid py-2">
  <div class="row">
    <?php if (!empty($sertifikat)) : ?>
      <?php foreach ($sertifikat as $s) : ?>
        <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4 pb-4">
          <div class="card mb-2">
            <div class="card-header mb-0 pb-0">
              <div class="row">
                <div class="col-8">
                  <h3 class="text-dark">Sertifikat <?= $s->jenis_sertifikat ?></h3>
                </div>
                <div class="col-4 text-end">
                  <button class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#hapus_sertifikat<?= $s->id_sertifikat ?>">Hapus</button>
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

  <form action="<?= base_url() ?>admin/personil/proses-tambah-sertifikat" method="post" enctype="multipart/form-data" class="d-inline">
    <div class="row mt-3">
      <div class="col-6">
        <input class="form-control" type="file" name="sertifikat_baru">
        <?= form_error('sertifikat_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
      </div>
      <div class="col-3">
        <select name="jenis_sertifikat" class="form-select">
          <option value="" selected>Pilih Jenis Sertifikat</option>
          <option value="Diklat" <?php echo set_select('jenis_sertifikat', 'Diklat'); ?>>Diklat</option>
          <option value="Kompetensi" <?php echo set_select('jenis_sertifikat', 'Kompetensi'); ?>>Kompetensi</option>
        </select>
        <?= form_error('jenis_sertifikat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
      </div>
      <div class="col-3">
        <input type="hidden" name="id_personil" value="<?= $id_personil ?>">
        <button type="submit" class="btn btn-dark w-100">+ Tambah Sertifikat Baru</button>
      </div>
    </div>
  </form>
  <div class="row mt-3">
    <div class="col-12">
      <a href="<?= base_url() ?>admin/personil" class="btn btn-primary btn-lg w-100">Kembali</a>
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

<?php foreach ($sertifikat as $pm) : ?> <!-- Modal Delete Akun -->
  <div class="modal fade" id="hapus_sertifikat<?= $pm->id_sertifikat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus sertifikat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah kamu yakin ingin menghapus sertifikat ini?
        </div>
        <div class="modal-footer">
          <form action="<?= base_url() ?>sertifikat/proses_hapus_sertifikat" method="post">
            <input type="hidden" name="id_sertifikat" value="<?= $pm->id_sertifikat ?>">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn bg-gradient-primary">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>