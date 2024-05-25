<header id="header" class="header">
    <div class="container">
        <!-- Header -->
        <?php if ($this->session->flashdata('error_login') == true) {
        ?>
            <div class="alert alert-danger" role="alert">Login gagal ,Username atau password yang Anda masukkan salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <?php if ($this->session->flashdata('alert')) : ?>
            <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('alert'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="text-container">
                    <h1 class="h1 text-left p-5 text-white">
                        <span id="typed-text"></span>
                    </h1>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-3">
                <div class="text-container">
                    <a class="btn-outline-lg page-scroll" href="#contact">
                        <img src="<?php echo base_url() ?>assets/mark/images/home.svg" alt="Logo" width="300" height="300">
                    </a>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- Footer -->
    <div class="container p-3">
        <div class="row">
            <div class="col-lg-12">
                <p class="footer-text text-white text-left fw-bold">© 2023 Sistem Informasi Pelayanan Kantor Desa Lauwa. All rights reserved.</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- end of footer -->
</header> <!-- end of header -->
<!-- end of header -->

<script>
    const text = "Selamat Datang di Sistem Informasi Pelayanan Kantor Desa Lauwa";
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            document.getElementById("typed-text").innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, 100); // Delay between each character typing
        }
    }

    window.onload = typeWriter;
</script>


<!-- Scripts -->
<script src="<?php echo base_url() ?>assets/mark/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="<?php echo base_url() ?>assets/mark/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="<?php echo base_url() ?>assets/mark/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="<?php echo base_url() ?>assets/mark/js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>