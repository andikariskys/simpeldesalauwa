<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah SK Tidak Mampu</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('financial_hardships/add') ?>" method="POST" enctype="multipart/form-data">
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Biodata Pribadi</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" value="<?= date("Y-m-d") ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-no-kk">No. KK</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="input-no-kk" name="no_kk" placeholder="3313123456780004" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-kk">Foto Kartu Keluarga</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_kk" id="input-foto-kk" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-no-nik">NIK</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="input-no-nik" name="nik" placeholder="3313123456780003" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-lengkap">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama-lengkap" name="nama_lengkap" placeholder="Magfira Islamia" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl" placeholder="Jakarta, 2 Februari 2000" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki" id="radio-laki-laki" required>
                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                    </div>
                    <div class="form-check">
                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="radio-perempuan">
                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                <div class="col-sm-10">
                    <select name="agama" class="form-select" aria-label="Default select example" id="select-agama" required>
                        <option value="" selected disabled>Pilih Agama atau Kepercayaan</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 10" required></textarea>
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
