<?php
// Mendapatkan segment terakhir dari URL
$current_url_segment = $this->uri->segment($this->uri->total_segments());
// echo $current_url_segment;
// exit;
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark <?php echo $is_home != true ? 'bg-dark' : ''; ?>">
    <div class=" container">

        <!-- Image Logo -->
        <a class="" href="<?php echo base_url() ?>"><img class="logo-img"
                src="<?php echo base_url() ?>assets/mark/images/luwu.png" alt="alternative"></a>
        <h3 class="text-white">Desa Lauwa</h3>


        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Mark</a> -->

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url() ?>">Beranda <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Profil</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>sejarah">
                            Sejarah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>visi-misi">
                            Visi Misi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>struktur">
                            Struktur Organisasi</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url() ?>information">Informasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Pelayanan</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>parent-income">Surat
                            Keterangan Pengasilan Orang Tua</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>financial-hardship">Surat
                            Keterangan Tidak Mampu</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>birth-certificate">Surat
                            Keterangan Kelahiran</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>death-certificate">Surat
                            Keterangan Kematian</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>marriage-letter">Surat
                            Pengantar Nikah</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>police-record-letter">Surat
                            Pengantar Catatan Kepolisian</a>
                    </div>
                </li>
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Cetak</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>parent-income/cetak">Cetak
                                Surat
                                Keterangan Pengasilan Orang Tua</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll"
                                href="<?php echo base_url() ?>financial-hardship/cetak">Cetak
                                Surat
                                Keterangan Tidak Mampu</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll"
                                href="<?php echo base_url() ?>birth-certificate/cetak">Cetak
                                Surat
                                Keterangan Kelahiran</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll"
                                href="<?php echo base_url() ?>death-certificate/cetak">Cetak
                                Surat
                                Keterangan Kematian</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>marriage-letter/cetak">Cetak
                                Surat
                                Pengantar Nikah</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll"
                                href="<?php echo base_url() ?>police-record-letter/cetak">Cetak
                                Surat
                                Pengantar Catatan Kepolisian</a>
                        </div>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url() ?>galery">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url() ?>contact">Contact</a>
                </li>
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php if ($_SESSION['level'] == 1) { ?>
                                <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>dashboard"
                                    target="_blank">Dashboard</a>
                                <div class="dropdown-divider"></div>
                            <?php } ?>
                            <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>logout">Logout</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <span class="nav-item social-icons">
                        <a href="<?php echo base_url() ?>login" type="button"
                            class="btn btn-secondary text-decoration-none">Login</a>
                    </span>

                <?php } ?>
            </ul>


        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Silahkan Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form login -->

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("passwordInput");
        const togglePasswordButton = document.getElementById("togglePasswordButton");

        togglePasswordButton.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                togglePasswordButton.textContent = "Show";
            }
        });
    });
</script>