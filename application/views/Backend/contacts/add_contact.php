<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah Profile</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('contacts/add') ?>" method="POST">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                <div class="col-sm-10">
                    <textarea id="input-alamat" name="alamat" class="form-control" placeholder="Jl. Raya Desa Lauwa No. 1" aria-label="Jl. Raya Desa Lauwa No. 1" aria-describedby="basic-icon-default-message2" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-email">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="input-email" name="email" placeholder="desalauwa@gmail.com" required/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-telepon">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="input-telepon" name="telepon" maxlength="13" placeholder="081123456789" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
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