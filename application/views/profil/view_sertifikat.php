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

  <form action="<?= base_url() ?>profil/proses-tambah-sertifikat" method="post" enctype="multipart/form-data" class="d-inline">
    <div class="row mt-3">
      <div class="col-3">
        <label for="">File Sertifikat</label>
        <input class="form-control" type="file" name="sertifikat_baru" onchange="validateFileSize(this)">
      </div>
      <div class="col-3">
        <label for="">Nama Sertifikat</label>
        <input class="form-control" type="text" name="nama_sertifikat_baru" placeholder="Nama Sertifikat">
        <?= form_error('nama_sertifikat_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
      </div>
      <div class="col-3">
        <label for="">Jenis Sertifikat</label>
        <select name="jenis_sertifikat" class="form-select">
          <option value="" selected>Pilih Jenis Sertifikat</option>
          <option value="Diklat" <?php echo set_select('jenis_sertifikat', 'Diklat'); ?>>Diklat</option>
          <option value="Kompetensi" <?php echo set_select('jenis_sertifikat', 'Kompetensi'); ?>>Kompetensi</option>
        </select>
        <?= form_error('jenis_sertifikat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
      </div>
      <div class="col-3">
        <label for="">Tanggal Kadaluarsa <em>(jika ada)</em></label>
        <input class="form-control" type="date" name="tanggal_kadaluarsa" placeholder="Nama Sertifikat">
        <?= form_error('tanggal_kadaluarsa', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <input type="hidden" name="id_personil" value="<?= $id_personil ?>">
        <button type="submit" class="btn btn-dark w-100">+ Tambah Sertifikat Baru</button>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url() ?>profil" class="btn btn-primary btn-lg w-100">Kembali</a>
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
          <form action="<?= base_url() ?>sertifikat/proses_hapus_sertifikat_sendiri" method="post">
            <input type="hidden" name="id_sertifikat" value="<?= $pm->id_sertifikat ?>">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn bg-gradient-primary">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  function validateForm() {
    var inputSertifikatCheckbox = document.getElementById('inputSertifikat');
    var rows = document.querySelectorAll('#sertifikatContainer .row');
    var files = document.querySelectorAll('[name="file_sertifikat[]"]');
    var names = document.querySelectorAll('[name="nama_sertifikat[]"]');
    var types = document.querySelectorAll('[name="jenis_sertifikat[]"]');
    var dates = document.querySelectorAll('[name="tanggal_kadaluarsa[]"]');

    // Check if checkbox is checked
    if (inputSertifikatCheckbox.checked) {
      for (var i = 0; i < files.length; i++) {
        var file = files[i].value.trim();
        var name = names[i].value.trim();
        var type = types[i].value.trim();
        var date = dates[i].value.trim();

        // Check if any field in the current set is empty
        if (file === '' || name === '' || type === '') {
          alert('Mohon lengkapi semua kolom sertifikat.');
          return false; // Prevent form submission
        }
      }
    }

    return true; // Allow form submission
  }

  function validateFileSize(input) {
    if (input.files.length > 0) {
      var fileSize = input.files[0].size; // Size in bytes

      // Check if file size exceeds 5 MB (5 * 1024 * 1024 bytes)
      if (fileSize > 2 * 1024 * 1024) {
        alert('Ukuran file tidak boleh melebihi 5 MB.');
        input.value = ''; // Clear the file input
      }
    }
  }
</script>