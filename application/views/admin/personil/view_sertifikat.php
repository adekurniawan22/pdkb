<div class="container-fluid py-2">
  <div class="row">
    <?php foreach ($sertifikat as $s) : ?>
      <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4 pb-4">
        <div class="card">
          <div class="card-body p-3">
            <?php
            $extension = pathinfo($s->nama_file, PATHINFO_EXTENSION);
            $file_path = base_url('assets/img/sertifikat/' . $s->nama_file);
            if ($extension == "pdf") : ?>
              <embed src="<?= base_url() ?>assets/img/sertifikat/<?= $s->nama_file ?>" type="application/pdf" width="100%" height="500px">
            <?php elseif ($extension === "jpg" || $extension === "jpeg" || $extension === "png") : ?>
              <img src="<?= $file_path ?>" alt="Gambar Sertifikat" width="100%" height="500px">
            <?php else : ?>
              <img src="<?= base_url() ?>assets/img/sertifikat/error/error.png" alt="Error" width="100%" height="500px" style="filter: grayscale(100%);">
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

  <div class=" row">
    <div class="col-12">
      <a href=" <?= base_url() ?>admin/personil" class="btn btn-primary btn-lg w-100">Kembali</a>
    </div>
  </div>