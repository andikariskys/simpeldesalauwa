<style>
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust transparency here */
    }

    .rounded-top {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .rounded-bottom {
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }
</style>

<!-- Projects -->
<div id="projects" class="basic-3 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Informasi Desa Lauwa</h2>
                <p class="p-heading">Daftar Informasi Terkini Desa Lauwa</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-3 -->
<!-- end of projects -->


<!-- Works -->
<div class="basic-4 bg-gray">
    <div class="container">
        <div class="row">
            <?php foreach ($information as $key => $val) { ?>
                <div class="col-lg-4 mb-3">
                    <div class="card shadow hover rounded-lg">
                        <div class="image-container position-relative rounded-top">
                            <a href="project.html">
                                <img class="img-fluid" src="<?php echo base_url() ?>assets/img-admin/informasi/<?= $val->Foto ?>" alt="alternative">
                            </a>
                            <div class="overlay"></div> <!-- Overlay div -->
                        </div> <!-- end of image-container -->
                        <div class="container">
                            <p><strong><?php
                                        $timestamp = strtotime($val->Tanggal_informasi);
                                        echo date("d F Y", $timestamp); // Format the date as DD MonthName YYYY
                                        ?></strong></p>
                            <h6><a href="" class="text-decoration-none"><?= $val->Nama_informasi ?></a></h6>
                            </p>
                            <a class="btn btn-outline-secondary text-decoration-none mb-2" data-toggle="collapse" href="#multiCollapseExample1<?= $val->id_informasi ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1<?= $val->id_informasi ?>">Selengkapnya..</a>
                            <div class="collapse multi-collapse mb-2" id="multiCollapseExample1<?= $val->id_informasi ?>">
                                <div class="card card-body">
                                    <?= $val->Isi ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of col -->
            <?php } ?>
        </div> <!-- end of row -->
    </div> <!-- end of basic-4 -->
    <!-- end of works -->