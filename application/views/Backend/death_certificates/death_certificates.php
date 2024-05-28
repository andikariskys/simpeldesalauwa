<a href="<?= base_url('death_certificates/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_death_certificate') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_death_certificate') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_death_certificate') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_death_certificate') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_death_certificate') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_death_certificate') ?>
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
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tanggal Kematian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($death_certificates as $death_certificate) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $death_certificate->Tanggal_keterangankematian ?></td>
                        <td><?= $death_certificate->Nama ?></td>
                        <td><?= $death_certificate->Ttl ?></td>
                        <td><?= $death_certificate->Nik ?></td>
                        <td><?= $death_certificate->Jenis_kelamin ?></td>
                        <td><?= $death_certificate->Agama ?></td>
                        <td><?= $death_certificate->Tanggal_kematian ?></td>
                        <td>
                            <?php if ($death_certificate->Status_keterangankematian == 'Terverifikasi') {
                                echo $death_certificate->Status_keterangankematian;
                            } else { ?>
                                <a href="<?= base_url('death_certificates/' . $death_certificate->id_keterangankematian . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($death_certificate->Status_keterangankematian == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('death_certificates/' . $death_certificate->id_keterangankematian . '/cetak') ?>" class="btn btn-info mx-1">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('death_certificates/' . $death_certificate->id_keterangankematian . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('death_certificates/' . $death_certificate->id_keterangankematian . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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