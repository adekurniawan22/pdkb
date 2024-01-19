<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/proses-edit-personil" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama" class="form-control-label">Nama Lengkap</label>
                            <input type="hidden" name="id_personil" value="<?= $personil->id_personil ?>">
                            <input class="form-control" type="text" placeholder="Nama Lengkap" id="nama" name="nama" value="<?= set_value('nama', $personil->nama) ?>">
                            <?= form_error('nama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="form-control-label">NIP</label>
                            <input class="form-control" type="text" placeholder="NIP" id="nip" name="nip" value="<?= set_value('nip', $personil->nip) ?>">
                            <?= form_error('nip', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="id_jabatan" class="form-control-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="id_jabatan" id="id_jabatan">
                                <option value="" selected>Pilih Jabatan</option>
                                <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j->id_jabatan ?>" <?php echo set_select('id_jabatan', $j->id_jabatan, $j->id_jabatan == $personil->id_jabatan); ?>><?= $j->nama_jabatan ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('id_jabatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-control-label">Status Aktif</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status_aktif" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($personil->status_aktif == '1') ? 'checked' : ''; ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-control-label">Foto</label>
                            <img src="<?= base_url('assets/img/profil/') . $personil->foto ?>" alt="Profile" class="form-control mb-2" style="width: 200px;">
                            <input class="form-control" type="file" id="formFile" name="foto">
                            <?= $this->session->flashdata('message');
                            unset($_SESSION['message']); ?>
                        </div>
                        <div>
                            <a href="<?= base_url() ?>admin/personil" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>