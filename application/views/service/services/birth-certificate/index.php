<style>
    .form-control-submit-button {
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

<div class="basic-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Contact Form -->
                        <form id="contactForm">
                            <div class="form-group">
                                <label class="form-label" for="cname">Tgl Pengisian</label>
                                <input type="date" class="form-control" id="cname" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cname">NIK</label>
                                <input type="number" class="form-control" id="cname" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="cname">Tempat</label>
                                        <input type="text" class="form-control" id="cname" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="cname">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="cname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                        <!-- end of contact form -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->

        </div> <!-- end of row -->
    </div> <!-- end of basic-4 -->
</div>