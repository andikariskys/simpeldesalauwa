<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Ubah Surat Pengantar SKCK</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('police_reports/' . $data_police_report->id_pengantarskck . '/update') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="this_update" value="true">
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Biodata Pemohon</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" value="<?= $data_police_report->Tanggal_pengantarskck ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nik" name="nik" value="<?= $data_police_report->Nik ?>" placeholder="1234567890123456" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama" value="<?= $data_police_report->Nama ?>" placeholder="Magfira" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl" value="<?= $data_police_report->Ttl ?>" placeholder="Jakarta, 6 Juni 1985" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki" id="radio-laki-laki" <?php if ($data_police_report->Jenis_kelamin == 'Laki-laki') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> required>
                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                    </div>
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="radio-perempuan" <?php if ($data_police_report->Jenis_kelamin == 'Perempuan') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan" name="pekerjaan" value="<?= $data_police_report->Pekerjaan ?>" placeholder="Wiraswasta" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                <div class="col-sm-10">
                    <select name="agama" class="form-select" aria-label="Default select example" id="select-agama" required>
                        <option value="" disabled>Pilih Agama atau Kepercayaan</option>
                        <option value="Islam" <?php if ($data_police_report->Jenis_kelamin == 'Islam') {
                                                    echo "selected";
                                                } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_police_report->Jenis_kelamin == 'Kristen Protestan') {
                                                                echo "selected";
                                                            } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_police_report->Jenis_kelamin == 'Katolik') {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_police_report->Jenis_kelamin == 'Hindu') {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_police_report->Jenis_kelamin == 'Buddha') {
                                                    echo "selected";
                                                } ?>>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-status-kawin">Status Kawin</label>
                <div class="col-sm-10">
                    <select name="status_kawin" class="form-select" aria-label="Default select example" id="select-status-kawin" required>
                        <option value="" disabled>Pilih Status Kawin</option>
                        <option value="Belum Kawin" <?php if ($data_police_report->Status_kawin == 'Belum Kawin') {
                                                        echo "selected";
                                                    } ?>>Belum Kawin</option>
                        <option value="Kawin" <?php if ($data_police_report->Status_kawin == 'Kawin') {
                                                    echo "selected";
                                                } ?>>Kawin</option>
                        <option value="Cerai Hidup" <?php if ($data_police_report->Status_kawin == 'Cerai Hidup') {
                                                        echo "selected";
                                                    } ?>>Cerai Hidup</option>
                        <option value="Cerai Mati" <?php if ($data_police_report->Status_kawin == 'Cerai Mati') {
                                                        echo "selected";
                                                    } ?>>Cerai Mati</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 50" required><?= $data_police_report->Alamat ?></textarea>
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Dokumen Pendukung</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                <div class="col-sm-10">
                    <input type="hidden" name="image_ktp_origin" value="<?= $data_police_report->Ktp ?>">
                    <img src="<?= base_url('assets/img-admin/spkck/' . $data_police_report->Ktp) ?>" alt="<?= $data_police_report->Ktp ?>" class="rounded mb-3" style="max-width: 200px; height: auto;"> <br>
                    <span class="text-disabled">Note. Jika ingin mengubah foto silakan upload foto baru</span> <br>
                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp">
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