<!-- Contact -->
<div id="contact" class="form-1 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Kontak</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <div class="container">
        <?php foreach ($contact as $val) { ?>
            <div class="container text-left">
                <div class="row">
                    <div class="col-lg-6">
                        <h6>Alamat</h6>
                        <p><?= $val->Alamat ?></p>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-6">
                        <h6>email</h6>
                        <p><?= $val->Email ?></p>
                    </div> <!-- end of col -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h6>Telepon</h6>
                        <p><?= $val->Telepon ?></p>
                    </div> <!-- end of col -->
                </div>
            </div> <!-- end of container -->
        <?php } ?>
    </div>
    <!-- maps -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31863.71995087145!2d120.36222085446275!3d-3.358721283417762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d96b06416b32b1d%3A0xe8f0f45d21439f8b!2sLauwa%2C%20Kec.%20Belopa%20Utara%2C%20Kabupaten%20Luwu%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1716711543382!5m2!1sid!2sid" width="90%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> <!-- end of form-1 -->
<!-- end of contact -->