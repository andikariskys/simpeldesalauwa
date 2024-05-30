<a href="<?= base_url('police_reports/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_police_report') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_police_report') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_police_report') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_police_report') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_police_report') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_police_report') ?>
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
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($police_reports as $police_report) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $police_report->Tanggal_pengantarskck ?></td>
                        <td><?= $police_report->Nik ?></td>
                        <td><?= $police_report->Nama ?></td>
                        <td><?= $police_report->Ttl ?></td>
                        <td><?= $police_report->Jenis_kelamin ?></td>
                        <td><?= $police_report->Alamat ?></td>
                        <td>
                            <?php if ($police_report->Status_pengantarskck == 'Terverifikasi') {
                                echo $police_report->Status_pengantarskck;
                            } else { ?>
                                <a href="<?= base_url('police_reports/' . $police_report->id_pengantarskck  . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($police_report->Status_pengantarskck == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('police_reports/' . $police_report->id_pengantarskck  . '/cetak') ?>" target="_blank" class="btn btn-info mx-1">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('police_reports/' . $police_report->id_pengantarskck  . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('police_reports/' . $police_report->id_pengantarskck  . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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