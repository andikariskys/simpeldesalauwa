<!-- About-->
<div id="about" class="basic-1 bg-white ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-container text-center">
                    <h2>Halaman Login</h2>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
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
        <?php if ($this->session->flashdata('alert')) { ?>
            <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show"
                role="alert">
                <?php echo $this->session->flashdata('alert'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>
        <div class="row">
            <div class="container">
                <div class="card w-80" aria-hidden="true">
                    <div class="card-body" role="document">
                        <div class="card-content">
                            <div class="card-header">
                                <h5 class="card-title" id="loginModalLabel">Silahkan Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form login -->
                                <form action="<?php echo base_url() ?>authentication" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="username" class="form-control" aria-describedby=""
                                            placeholder="Enter username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordInput">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="passwordInput" name="password"
                                                class="form-control" placeholder="Enter your password" required>
                                            <button class="btn btn-secondary" type="button"
                                                id="togglePasswordButton">Show</button>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-block w-50 btn-secondary">Login</button>
                                    </div>
                                </form>
                                <p>Belum punya Akun ? <a href="<?php echo base_url() ?>register">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of about -->