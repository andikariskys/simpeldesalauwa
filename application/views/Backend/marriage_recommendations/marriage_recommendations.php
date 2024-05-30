<a href="<?= base_url('marriage_recommendations/add') ?>" class="btn btn-primary mx-2 my-2">Tambah Data</a>
<div class="card">
    <?php if ($this->session->flashdata('success_marriage_recommendation') != null) { ?>
        <div class="alert alert-success alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('success_marriage_recommendation') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('danger_marriage_recommendation') != null) { ?>
        <div class="alert alert-danger alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('danger_marriage_recommendation') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if ($this->session->flashdata('update_marriage_recommendation') != null) { ?>
        <div class="alert alert-primary alert-dismissible my-3 mx-3" role="alert">
            <?= $this->session->flashdata('update_marriage_recommendation') ?>
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
                    <th>Pekerjaan</th>
                    <th>Status Kawin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($marriage_recommendations as $marriage_recommendation) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $marriage_recommendation->Tanggal_pengantarnikah ?></td>
                        <td><?= $marriage_recommendation->Nama ?></td>
                        <td><?= $marriage_recommendation->Ttl ?></td>
                        <td><?= $marriage_recommendation->Jenis_kelamin ?></td>
                        <td><?= $marriage_recommendation->Agama ?></td>
                        <td><?= $marriage_recommendation->Pekerjaan ?></td>
                        <td><?= $marriage_recommendation->Status_kawin ?></td>
                        <td>
                            <?php if ($marriage_recommendation->Status_pengantarnikah == 'Terverifikasi') {
                                echo $marriage_recommendation->Status_pengantarnikah;
                            } else { ?>
                                <a href="<?= base_url('marriage_recommendations/' . $marriage_recommendation->id_pengantarnikah . '/verification') ?>" class="btn btn-success mx-1">Verifikasi</a>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <?php if ($marriage_recommendation->Status_pengantarnikah == 'Terverifikasi') { ?>
                                    <a href="<?= base_url('marriage_recommendations/' . $marriage_recommendation->id_pengantarnikah . '/print') ?>" class="btn btn-info mx-1" target="_blank">Cetak</a>
                                <?php } ?>
                                <a href="<?= base_url('marriage_recommendations/' . $marriage_recommendation->id_pengantarnikah . '/update') ?>" class="btn btn-warning mx-1">Ubah</a>
                                <a href="<?= base_url('marriage_recommendations/' . $marriage_recommendation->id_pengantarnikah . '/delete') ?>" class="btn btn-danger mx-1">Hapus</a>
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