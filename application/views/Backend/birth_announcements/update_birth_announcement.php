<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Ubah SK Kelahiran</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('birth_announcements/' . $data_birth_announcement->id_keterangankelahiran  . '/update') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="this_update" value="true">
            <small class="text-light fw-semibold">Biodata Anak</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" value="<?= $data_birth_announcement->Tanggal_keterangankelahiran ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama" value="<?= $data_birth_announcement->Nama ?>" placeholder="Magfira Islamia" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl" value="<?= $data_birth_announcement->Ttl ?>" placeholder="Jakarta, 3 Maret 2023" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki" id="radio-laki-laki" <?php if ($data_birth_announcement->Jenis_kelamin == 'Laki-laki') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> required>
                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                    </div>
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="radio-perempuan" <?php if ($data_birth_announcement->Jenis_kelamin == 'Perempuan') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                <div class="col-sm-10">
                    <select name="agama" class="form-select" aria-label="Default select example" id="select-agama" required>
                        <option value="" disabled>Pilih Agama atau Kepercayaan</option>
                        <option value="Islam" <?php if ($data_birth_announcement->Agama == 'Islam') {
                                                    echo "selected";
                                                } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_birth_announcement->Agama == 'Kristen Protestan') {
                                                                echo "selected";
                                                            } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_birth_announcement->Agama == 'Katolik') {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_birth_announcement->Agama == 'Hindu') {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_birth_announcement->Agama == 'Buddha') {
                                                    echo "selected";
                                                } ?>>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 20" required><?= $data_birth_announcement->Alamat ?></textarea>
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Data Orang Tua</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-ayah">Nama Ayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama-ayah" name="nama_ayah" value="<?= $data_birth_announcement->Nama_ayah ?>" placeholder="Nama Lengkap Ayah" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-ibu">Nama Ibu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama-ibu" name="nama_ibu" value="<?= $data_birth_announcement->Nama_ibu ?>" placeholder="Nama Lengkap Ibu" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-kk">Foto Kartu Keluarga</label>
                <div class="col-sm-10">
                    <input type="hidden" name="image_kk_origin" value="<?= $data_birth_announcement->kk ?>">
                    <img src="<?= base_url('assets/img-admin/skkl/' . $data_birth_announcement->kk) ?>" alt="<?= $data_birth_announcement->kk ?>" class="rounded mb-3" style="max-width: 200px; height: auto;"> <br>
                    <span class="text-disabled">Note. Jika ingin mengubah foto silakan upload foto baru</span> <br>
                    <input type="file" name="foto_kk" id="input-foto-kk" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp">
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>