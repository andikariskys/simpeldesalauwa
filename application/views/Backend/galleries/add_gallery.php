<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah Foto Pada Galeri</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('galleries/add') ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" placeholder="2024-05-24" value="<?= date("Y-m-d") ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-nama-galeri">Keterangan Foto</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_galeri" id="input-nama-galeri" class="form-control" placeholder="Keseruan Ulang Tahun ke-78 Desa Lauwa" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-foto-galeri">Foto Galeri</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_galeri" id="input-foto-galeri" class="form-control" accept="image/jpg, image/jpeg, image/png, image/webp" required>
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