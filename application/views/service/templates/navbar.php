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
         <a class="" href="<?php echo base_url() ?>"><img class="logo-img" src="<?php echo base_url() ?>assets/mark/images/luwu.png" alt="alternative"></a>
         <h3 class="text-white">Desa Lauwa</h3>


         <!-- Text Logo - Use this if you don't have a graphic logo -->
         <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Mark</a> -->

         <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link page-scroll" href="<?php echo base_url() ?>">Beranda <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link page-scroll" href="<?php echo base_url() ?>profile">Profil</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link page-scroll" href="<?php echo base_url() ?>information">Informasi</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pelayanan</a>
                     <div class="dropdown-menu" aria-labelledby="dropdown01">
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>parent-income">Surat Keterangan Pengasilan Ortu</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>incapacity-certificate">Surat Keterangan Tidak Mampu</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>birth-certificate">Surat Keterangan Kelahiran</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>death-certificate">Surat Keterangan Kematian</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>marriage-letter">Surat Pengantar Nikah</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>police-record-letter">Surat Pengantar Catatan Kepolisian</a>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link page-scroll" href="<?php echo base_url() ?>galery">Galeri</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link page-scroll" href="<?php echo base_url() ?>contact">Contact</a>
                 </li>
                 <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {  ?>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?></a>
                         <div class="dropdown-menu" aria-labelledby="dropdown01">
                             <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>session">Profil</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item page-scroll" href="<?php echo base_url() ?>logout">Logout</a>
                         </div>
                     </li>
                 <?php } else {  ?>
                     <span class="nav-item social-icons">
                         <button type="button" class="btn btn-secondary text-decoration-none" data-toggle="modal" data-target="#loginModal">Login</button>
                     </span>

                 <?php } ?>
             </ul>


         </div> <!-- end of navbar-collapse -->
     </div> <!-- end of container -->
 </nav> <!-- end of navbar -->
 <!-- end of navigation -->
 <!-- Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                 <form action="<?php echo base_url() ?>authentication" method="post">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Username</label>
                         <input type="text" name="username" class="form-control" aria-describedby="" placeholder="Enter username" required>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Password</label>
                         <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn btn-secondary">Login</button>
                 </form>
             </div>
         </div>
     </div>
 </div>