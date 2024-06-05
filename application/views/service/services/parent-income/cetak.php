<style>
    .form-control border-dark-submit-button {
        width: auto;
        /* Make button size fit content */
        float: left;
        /* Align button to the left */
    }
</style>


<!-- About-->
<!-- Projects -->
<div id="projects" class="basic-3 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading"><?= $title ?></h2>
                <!-- <p class="p-heading">Koleksi visual yang menggambarkan keindahan dan kehidupan di Desa Lauwa melalui potret-potret penuh warna dari beragam sudut pandang, menampilkan kekayaan alam, kegiatan masyarakat, dan kebudayaan yang memikat.</p> -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-3 -->
<!-- end of projects -->
<!-- end of about -->
<?php if ($this->session->flashdata('alert')) { ?>
    <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show"
        role="alert">
        <?php echo $this->session->flashdata('alert'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<div class="basic-4 bg-white">
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) { ?>
                <div class="container">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form <?= $title ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mx-2 my-2">
                                <table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-striped"
                                    id="dataTableHover">
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
                                        foreach ($data as $parent_income): ?>
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
                                                        <p>Belum diverifikasi</p>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <?php if ($parent_income->Status_penghasilanorangtua == 'Terverifikasi') { ?>
                                                            <a href="<?= base_url('parent_incomes/' . $parent_income->id_penghasilan . '/print') ?>"
                                                                class="btn btn-info mx-1" target="_blank">Cetak</a>
                                                        <?php } else { ?>
                                                            <p>-</p>
                                                        <?php } ?>
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
                    </div>
                </div> <!-- end of container -->
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="text-container">
                            <h3 class="h3 text-left p-5 text-dark">
                                Silahkan Login terlebih dahulu untuk membuat surat
                                <div class="row">
                                    <div class="col">
                                        <a href="<?php echo base_url() ?>login"
                                            class="btn btn-secondary btn-block w-50">Login</a>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </h3>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-3">
                        <div class="text-container">
                            <div class="card shadow rounded-lg rounded">
                                <div class="image-container position-relative rounded-top">
                                    <img class="img-fluid" src="<?php echo base_url() ?>assets/mark/images/kantor.jpeg"
                                        alt="Logo">
                                </div>
                            </div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            <?php } ?>
        </div> <!-- end of row -->
    </div> <!-- end of basic-4 -->
</div>
<script>
    $(document).ready(function () {

        $("#dataTableHover").DataTable(); // ID From dataTable with Hover

    });
</script>