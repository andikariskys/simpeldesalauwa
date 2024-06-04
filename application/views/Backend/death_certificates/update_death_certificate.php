<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Ubah SK Kematian</h5>
    </div>
    <div class="card-body">
        <form
            action="<?= base_url('death_certificates/' . $data_death_certificate->id_keterangankematian . '/update') ?>"
            method="POST" enctype="multipart/form-data">
            <input type="hidden" name="this_update" value="true">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal"
                        value="<?= $data_death_certificate->Tanggal_keterangankematian ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="input-nik" onchange="validateLength(this)" name="nik"
                        value="<?= $data_death_certificate->Nik ?>" placeholder="1234567890123456" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                <div class="col-sm-10">
                    <input type="hidden" name="image_ktp_origin" value="<?= $data_death_certificate->ktp ?>">
                    <img src="<?= base_url('assets/img-admin/skm/' . $data_death_certificate->ktp) ?>"
                        alt="<?= $data_death_certificate->ktp ?>" class="rounded mb-3"
                        style="max-width: 200px; height: auto;"> <br>
                    <span class="text-disabled">Note. Jika ingin mengubah foto silakan upload foto baru</span> <br>
                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control"
                        accept="image/jpg, image/jpeg, image/png, image/webp" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama"
                        value="<?= $data_death_certificate->Nama ?>" placeholder="Magfira Islamia" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl"
                        value="<?= $data_death_certificate->Ttl ?>" placeholder="Jakarta, 4 April 1950" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki"
                            id="radio-laki-laki" <?php if ($data_death_certificate->Jenis_kelamin == 'Laki-laki') {
                                echo "checked";
                            } ?> required>
                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                    </div>
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan"
                            id="radio-perempuan" <?php if ($data_death_certificate->Jenis_kelamin == 'Perempuan') {
                                echo "checked";
                            } ?>>
                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan" name="pekerjaan"
                        value="<?= $data_death_certificate->Pekerjaan ?>" placeholder="Pensiunan" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                <div class="col-sm-10">
                    <select name="agama" class="form-select" aria-label="Default select example" id="select-agama"
                        required>
                        <option value="" disabled>Pilih Agama atau Kepercayaan</option>
                        <option value="Islam" <?php if ($data_death_certificate->Agama == 'Islam') {
                            echo "selected";
                        } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_death_certificate->Agama == 'Kristen Protestan') {
                            echo "selected";
                        } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_death_certificate->Agama == 'Katolik') {
                            echo "selected";
                        } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_death_certificate->Agama == 'Hindu') {
                            echo "selected";
                        } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_death_certificate->Agama == 'Buddha') {
                            echo "selected";
                        } ?>>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 30"
                        required><?= $data_death_certificate->Alamat ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-hari-kematian">Hari Kematian</label>
                <div class="col-sm-10">
                    <select name="hari_kematian" class="form-select" aria-label="Default select example"
                        id="input-hari-kematian" required>
                        <option value="" disabled>Pilih hari kematian</option>
                        <option value="Senin" <?php if ($data_death_certificate->Hari_kematian == 'Senin') {
                            echo "selected";
                        } ?>>Senin</option>
                        <option value="Selasa" <?php if ($data_death_certificate->Hari_kematian == 'Selasa') {
                            echo "selected";
                        } ?>>Selasa</option>
                        <option value="Rabu" <?php if ($data_death_certificate->Hari_kematian == 'Rabu') {
                            echo "selected";
                        } ?>>Rabu</option>
                        <option value="Kamis" <?php if ($data_death_certificate->Hari_kematian == 'Kamis') {
                            echo "selected";
                        } ?>>Kamis</option>
                        <option value="Jum'at" <?php if ($data_death_certificate->Hari_kematian == "Jum'at") {
                            echo "selected";
                        } ?>>Jum'at</option>
                        <option value="Sabtu" <?php if ($data_death_certificate->Hari_kematian == 'Sabtu') {
                            echo "selected";
                        } ?>>Sabtu</option>
                        <option value="Minggu" <?php if ($data_death_certificate->Hari_kematian == 'Minggu') {
                            echo "selected";
                        } ?>>Minggu</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal-kematian">Tanggal Kematian</label>
                <div class="col-sm-10">
                    <input type="date" id="input-tanggal-kematian" name="tanggal_kematian"
                        value="<?= $data_death_certificate->Tanggal_kematian ?>" placeholder="MM/DD/YYYY"
                        class="form-control">
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Informasi Pelapor</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-pelapor">Nama Pelapor</label>
                <div class="col-sm-10">
                    <input type="text" id="input-nama-pelapor" name="nama_pelapor"
                        value="<?= $data_death_certificate->Nama_pelapor ?>" placeholder="Abdur" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-hubungan-pelapor">Hubungan Pelapor</label>
                <div class="col-sm-10">
                    <input type="text" id="input-hubungan-pelapor" name="hubungan_pelapor"
                        value="<?= $data_death_certificate->Hubungan_pelapor ?>" placeholder="Anak Kandung"
                        class="form-control">
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