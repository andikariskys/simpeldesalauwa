<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah Surat Pengantar SKCK</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('police_reports/add') ?>" method="POST" enctype="multipart/form-data">
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Biodata Pemohon</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" value="<?= date("Y-m-d") ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-no-kk">Nomor KK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-no-kk" name="no_kk" placeholder="1234567890112233" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nik" name="nik" placeholder="1234567890123456" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-nama" name="nama" placeholder="Magfira Islamia" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-ttl" name="ttl" placeholder="Jakarta, 6 Juni 1985" required />
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
                <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-pekerjaan" name="pekerjaan" placeholder="Wiraswasta" required />
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
                <label class="col-sm-2 col-form-label" for="select-status-kawin">Status Kawin</label>
                <div class="col-sm-10">
                    <select name="status_kawin" class="form-select" aria-label="Default select example" id="select-status-kawin" required>
                        <option value="" selected disabled>Pilih Status Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 50" required></textarea>
                </div>
            </div>
            <hr class="ml-0 mr-0 mb-3">
            <small class="text-light fw-semibold">Dokumen Pendukung</small>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp" required>
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
