<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah Informasi</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('informations/add') ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" placeholder="2024-05-24" value="<?= date("Y-m-d") ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-informasi">Nama Informasi</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_informasi" id="input-nama-informasi" class="form-control" placeholder="Pembangunan Jalan Desa" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-isi-informasi">Isi Informasi</label>
                <div class="col-sm-10">
                    <textarea id="input-isi-informasi" name="isi_informasi" class="form-control" placeholder="Pembangunan jalan desa akan dimulai pada bulan Juni." aria-label="Pembangunan jalan desa akan dimulai pada bulan Juni." aria-describedby="basic-icon-default-message2" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-informasi">Foto Informasi</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_informasi" id="input-foto-informasi" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp" required>
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