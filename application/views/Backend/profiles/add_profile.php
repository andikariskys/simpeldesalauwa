<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Tambah Profile</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('profiles/add') ?>" method="POST">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-tanggal" name="tanggal" placeholder="2024-05-24" value="<?= date("Y-m-d") ?>" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-sambutan-kepala-desa">Sambutan Kepala Desa</label>
                <div class="col-sm-10">
                    <textarea id="input-sambutan-kepala-desa" name="sambutan_kepala_desa" class="form-control" placeholder="Selamat datang di kantorDesa Lauwa." aria-label="Selamat datang di kantorDesa Lauwa." aria-describedby="basic-icon-default-message2" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-visi">Visi</label>
                <div class="col-sm-10">
                    <textarea id="input-visi" name="visi" class="form-control" placeholder="Menjadi desa yang makmur dan sejahtera." aria-label="Menjadi desa yang makmur dan sejahtera." aria-describedby="basic-icon-default-message2" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-misi">Misi</label>
                <div class="col-sm-10">
                    <textarea id="input-misi" name="misi" class="form-control" placeholder="Meningkatkan kesejahteraan masyarakat." aria-label="Meningkatkan kesejahteraan masyarakat." aria-describedby="basic-icon-default-message2" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-jam-kerja">Jam kerja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-jam-kerja" name="jam_kerja" placeholder="Senin-Jumat 08:00-16:00" required/>
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