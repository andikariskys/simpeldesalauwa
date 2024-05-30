<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Ubah Pengantar Nikah</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('marriage_recommendations/' . $data_marriage_recommendation->id_pengantarnikah . '/update') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="this_update" value="true">
            <small class="text-light fw-semibold">Biodata Pemohon</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" value="<?= $data_marriage_recommendation->Tanggal_pengantarnikah ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nik" name="nik" value="<?= $data_marriage_recommendation->Nik ?>" placeholder="1122334455667788" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama" value="<?= $data_marriage_recommendation->Nama ?>" placeholder="Magfira Islamia" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl" value="<?= $data_marriage_recommendation->Ttl ?>" placeholder="Jakarta, 5 Mei 1990" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki" id="radio-laki-laki" <?php if ($data_marriage_recommendation->Jenis_kelamin == 'Laki-laki') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> required>
                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                    </div>
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="radio-perempuan" <?php if ($data_marriage_recommendation->Jenis_kelamin == 'Perempuan') {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan" name="pekerjaan" value="<?= $data_marriage_recommendation->Pekerjaan ?>" placeholder="Karyawan Swasta" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                <div class="col-sm-10">
                    <select name="agama" class="form-select" aria-label="Default select example" id="select-agama" required>
                        <option value="" disabled>Pilih Agama atau Kepercayaan</option>
                        <option value="Islam" <?php if ($data_marriage_recommendation->Agama == 'Islam') {
                                                    echo "selected";
                                                } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_marriage_recommendation->Agama == 'Kristen Protestan') {
                                                                echo "selected";
                                                            } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_marriage_recommendation->Agama == 'Katolik') {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_marriage_recommendation->Agama == 'Hindu') {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_marriage_recommendation->Agama == 'Buddha') {
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
                        <option value="Belum Kawin" <?php if ($data_marriage_recommendation->Status_kawin == 'Belum Kawin') {
                                                        echo "selected";
                                                    } ?>>Belum Kawin</option>
                        <option value="Kawin" <?php if ($data_marriage_recommendation->Status_kawin == 'Kawin') {
                                                    echo "selected";
                                                } ?>>Kawin</option>
                        <option value="Cerai Hidup" <?php if ($data_marriage_recommendation->Status_kawin == 'Cerai Hidup') {
                                                        echo "selected";
                                                    } ?>>Cerai Hidup</option>
                        <option value="Cerai Mati" <?php if ($data_marriage_recommendation->Status_kawin == 'Cerai Mati') {
                                                        echo "selected";
                                                    } ?>>Cerai Mati</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 40" required><?= $data_marriage_recommendation->Alamat ?></textarea>
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Biodata Orang Tua</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-anak-ke">Anak Ke-</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="input-anak-ke" name="anak_ke" value="<?= $data_marriage_recommendation->Anak_ke ?>" placeholder="1" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-ayah">Nama Ayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama-ayah" name="nama_ayah" value="<?= $data_marriage_recommendation->Nama_ayah ?>" placeholder="Nama Lengkap Ayah" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl-ayah">Tempat, Tanggal Lahir Ayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl-ayah" name="ttl_ayah" value="<?= $data_marriage_recommendation->Ttl_ayah ?>" placeholder="Bandung, 1 Januari 1960" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama-ayah">Agama Ayah</label>
                <div class="col-sm-10">
                    <select name="agama_ayah" class="form-select" aria-label="Default select example" id="select-agama-ayah" required>
                        <option value="" disabled>Pilih Agama Ayah</option>
                        <option value="Islam" <?php if ($data_marriage_recommendation->Agama_ayah == 'Islam') {
                                                    echo "selected";
                                                } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_marriage_recommendation->Agama_ayah == 'Kristen Protestan') {
                                                                echo "selected";
                                                            } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_marriage_recommendation->Agama_ayah == 'Katolik') {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_marriage_recommendation->Agama_ayah == 'Hindu') {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_marriage_recommendation->Agama_ayah == 'Buddha') {
                                                    echo "selected";
                                                } ?>>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-pekerjaan-ayah">Pekerjaan Ayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan-ayah" name="pekerjaan_ayah" value="<?= $data_marriage_recommendation->Pekerjaan_ayah ?>" placeholder="Petani" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat-ayah">Alamat Ayah</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat-ayah" name="alamat_ayah" placeholder="Jl. Desa No. 1" required><?= $data_marriage_recommendation->Alamat_ayah ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-ibu">Nama Ibu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama-ibu" name="nama_ibu" value="<?= $data_marriage_recommendation->Nama_ibu ?>" placeholder="Nama Lengkap Ibu" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl-ibu">Tempat, Tanggal Lahir Ibu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl-ibu" name="ttl_ibu" value="<?= $data_marriage_recommendation->Ttl_ibu ?>" placeholder="Surabaya, 1 Januari 1965" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama-ibu">Agama Ibu</label>
                <div class="col-sm-10">
                    <select name="agama_ibu" class="form-select" aria-label="Default select example" id="select-agama-ibu" required>
                        <option value="" disabled>Pilih Agama Ibu</option>
                        <option value="Islam" <?php if ($data_marriage_recommendation->Agama_ibu == 'Islam') {
                                                    echo "selected";
                                                } ?>>Islam</option>
                        <option value="Kristen Protestan" <?php if ($data_marriage_recommendation->Agama_ibu == 'Kristen Protestan') {
                                                                echo "selected";
                                                            } ?>>Kristen Protestan</option>
                        <option value="Katolik" <?php if ($data_marriage_recommendation->Agama_ibu == 'Katolik') {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                        <option value="Hindu" <?php if ($data_marriage_recommendation->Agama_ibu == 'Hindu') {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                        <option value="Buddha" <?php if ($data_marriage_recommendation->Agama_ibu == 'Buddha') {
                                                    echo "selected";
                                                } ?>>Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-pekerjaan-ibu">Pekerjaan Ibu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan-ibu" name="pekerjaan_ibu" value="<?= $data_marriage_recommendation->Pekerjaan_ibu ?>" placeholder="Ibu Rumah Tangga" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat-ibu">Alamat Ibu</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat-ibu" name="alamat_ibu" placeholder="Jl. Desa No. 1" required><?= $data_marriage_recommendation->Alamat_ibu ?></textarea>
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Dokumen Pendukung</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                <div class="col-sm-10">
                    <input type="hidden" name="image_ktp_origin" value="<?= $data_marriage_recommendation->Ktp ?>">
                    <img src="<?= base_url('assets/img-admin/spn/' . $data_marriage_recommendation->Ktp) ?>" alt="<?= $data_marriage_recommendation->Ktp ?>" class="rounded mb-3" style="max-width: 200px; height: auto;"> <br>
                    <span class="text-disabled">Note. Jika ingin mengubah foto silakan upload foto baru</span> <br>
                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-kk">Foto KK</label>
                <div class="col-sm-10">
                    <input type="hidden" name="image_kk_origin" value="<?= $data_marriage_recommendation->Kk ?>">
                    <img src="<?= base_url('assets/img-admin/spn/' . $data_marriage_recommendation->Kk) ?>" alt="<?= $data_marriage_recommendation->Kk ?>" class="rounded mb-3" style="max-width: 200px; height: auto;"> <br>
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