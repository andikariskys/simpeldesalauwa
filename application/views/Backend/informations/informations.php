<a href="<?= base_url('informations/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('add_information') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('add_information') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('delete_information') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('delete_information') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_information') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_information') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('failed_upload_image') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('failed_upload_image') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mx-2 my-2">
        <table id="data_tables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Informasi</th>
                    <th>Isi Informasi </th>
                    <th>Foto Informasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_informations as $information) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $information->Tanggal_informasi ?></td>
                        <td><?= $information->Nama_informasi ?></td>
                        <td><?= $information->Isi ?></td>
                        <td><img src="<?= base_url('assets/img-admin/' . $information->Foto) ?>" alt="" class="rounded" style="max-width: 150px; height: auto;"></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?= base_url('informations/' . $information->id_informasi . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('informations/' . $information->id_informasi . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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
        }, null, {
            width: '15%'
        }, {
            width: '15%'
        }]
    });
</script>