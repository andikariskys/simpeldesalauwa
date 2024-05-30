<a href="<?= base_url('birth_announcements/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_birth_announcement') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_birth_announcement') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_birth_announcement') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_birth_announcement') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_birth_announcement') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_birth_announcement') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="table-responsive mx-2 my-2">
        <table id="data_tables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Nama Ayah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($birth_announcements as $birth_announcement) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $birth_announcement->Tanggal_keterangankelahiran ?></td>
                        <td><?= $birth_announcement->Nama ?></td>
                        <td><?= $birth_announcement->Ttl ?></td>
                        <td><?= $birth_announcement->Jenis_kelamin ?></td>
                        <td><?= $birth_announcement->Agama ?></td>
                        <td><?= $birth_announcement->Nama_ayah ?></td>
                        <td>
                            <?php if ($birth_announcement->Status_keterangankelahiran == 'Terverifikasi') {
                                echo $birth_announcement->Status_keterangankelahiran;
                            } else { ?>
                                <a href="<?= base_url('birth_announcements/' . $birth_announcement->id_keterangankelahiran . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($birth_announcement->Status_keterangankelahiran == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('birth_announcements/' . $birth_announcement->id_keterangankelahiran . '/print') ?>" class="btn btn-info mx-1" target="_blank">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('birth_announcements/' . $birth_announcement->id_keterangankelahiran . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('birth_announcements/' . $birth_announcement->id_keterangankelahiran . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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