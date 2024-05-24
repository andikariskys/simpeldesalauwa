<a href="<?= base_url('profiles/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('add_profile') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('add_profile') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('delete_profile') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('delete_profile') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_profile') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_profile') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mx-2 my-2">
        <table id="data_tables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Sambutan Kepala Desa</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Jam Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_profiles as $profile) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $profile->Tanggal_profil ?></td>
                        <td><?= $profile->Sambutan_kepaladesa ?></td>
                        <td><?= $profile->Visi ?></td>
                        <td><?= $profile->Misi ?></td>
                        <td><?= $profile->Jam_kerja ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?= base_url('profiles/' . $profile->id_profil . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('profiles/' . $profile->id_profil . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php
                    $no++;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    new DataTable('#data_tables', {
        columns: [{
            width: '5%'
        }, {
            width: '10%'
        }, {
            width: '25%'
        }, {
            width: '15%'
        }, {
            width: '15%'
        }, {
            width: '15%'
        }, {
            width: '15%'
        }]
    });
</script>