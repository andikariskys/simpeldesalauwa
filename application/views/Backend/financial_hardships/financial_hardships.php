<a href="<?= base_url('financial_hardships/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_financial_hardship') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_financial_hardship') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_financial_hardship') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_financial_hardship') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_financial_hardship') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_financial_hardship') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mx-2 my-2">
        <table id="data_tables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No. KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($financial_hardships as $financial_hardship) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $financial_hardship->Tanggal_keterangantidakmampu ?></td>
                        <td><?= $financial_hardship->No_kk ?></td>
                        <td><?= $financial_hardship->Nik ?></td>
                        <td><?= $financial_hardship->Nama ?></td>
                        <td><?= $financial_hardship->Jenis_kelamin ?></td>
                        <td><?= $financial_hardship->Agama ?></td>
                        <td>
                            <?php if ($financial_hardship->Status_keterangantidakmampu == 'Terverifikasi') {
                                echo $financial_hardship->Status_keterangantidakmampu;
                            } else { ?>
                                <a href="<?= base_url('financial_hardships/' . $financial_hardship->id_keterangantidakmampu . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($financial_hardship->Status_keterangantidakmampu == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('financial_hardships/' . $financial_hardship->id_keterangantidakmampu . '/print') ?>" class="btn btn-info mx-1" target="_blank">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('financial_hardships/' . $financial_hardship->id_keterangantidakmampu . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('financial_hardships/' . $financial_hardship->id_keterangantidakmampu . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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
    new DataTable('#data_tables');
</script>