<?php if ($type == 'reset') { ?>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form Ubah Password User</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('users/' . $data_user->id_user . '/reset_password') ?>" method="POST">
                <input type="hidden" name="this_update" value="true">
                <input type="hidden" name="this_reset" value="true">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="input-password">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-password" name="password" placeholder="magfira123" required />
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
<?php } else { ?>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form Ubah User</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('users/' . $data_user->id_user . '/update') ?>" method="POST">
                <input type="hidden" name="this_update" value="true">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-nama" name="nama" placeholder="Magfira Islamia" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="input-username">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-username" name="username" placeholder="magfiraislamia" onkeypress="return event.charCode != 32" required />
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
<?php } ?>