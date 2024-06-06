<!-- Projects -->
<div id="projects" class="basic-3 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Galeri Desa Lauwa</h2>
                <p class="p-heading">Koleksi visual yang menggambarkan keindahan dan kehidupan di Desa Lauwa melalui potret-potret penuh warna dari beragam sudut pandang, menampilkan kekayaan alam, kegiatan masyarakat, dan kebudayaan yang memikat.</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-3 -->
<!-- end of projects -->


<!-- Works -->
<div class="basic-4 bg-white">
    <div class="container">
        <div class="row">
            <?php foreach ($galery as $val) { ?>
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">
                            <img class="img-fluid" src="<?php echo base_url() ?>assets/img-admin/galeri/<?= $val->Foto ?>" alt="alternative" style="height: 30vh; width: auto; object-fit: cover;">
                        </div>
                        <p><strong><?= $val->Nama_galeri ?></strong></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>