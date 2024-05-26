<a href="<?= base_url('parent_incomes/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_parent_income') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_parent_income') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_parent_income') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_parent_income') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_parent_income') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_parent_income') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mx-2 my-2">
        <table id="data_tables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($parent_incomes as $parent_income) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $parent_income->Tanggal_penghasilan ?></td>
                        <td><?= $parent_income->Nik ?></td>
                        <td><?= $parent_income->Nama ?></td>
                        <td><?= $parent_income->Ttl ?></td>
                        <td><?= $parent_income->Agama ?></td>
                        <td><?= $parent_income->Jenis_kelamin ?></td>
                        <td>
                            <?php if ($parent_income->Status_penghasilanorangtua == 'Terverifikasi') {
                                echo $parent_income->Status_penghasilanorangtua;
                            } else { ?>
                                <a href="<?= base_url('parent_incomes/' . $parent_income->id_penghasilan . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($parent_income->Status_penghasilanorangtua == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('parent_incomes/' . $parent_income->id_penghasilan . '/cetak') ?>" class="btn btn-info mx-1">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('parent_incomes/' . $parent_income->id_penghasilan . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('parent_incomes/' . $parent_income->id_penghasilan . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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