<!-- About-->
<div id="about" class="basic-1 bg-white ">
    <div class="container">
        <?php if ($this->session->flashdata('error_login') == true) {
            ?>
            <div class="alert alert-danger" role="alert">Username sudah terdaftar!
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
            <div class="col">
                <div class="text-container text-center">
                    <h2>Halaman Register</h2>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="container">
                <div class="card w-80" aria-hidden="true">
                    <div class="card-body" role="document">
                        <div class="card-content">
                            <div class="card-header">
                                <h5 class="card-title" id="loginModalLabel">Pendaftaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form login -->
                                <form action="<?= base_url('registration') ?>" method="POST">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-nama" name="nama"
                                                placeholder="Magfira Islamia" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="input-username">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-username" name="username"
                                                placeholder="magfiraislamia" onkeypress="return event.charCode != 32"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="input-password">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-password" name="password"
                                                placeholder="magfira123" required />
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-secondary">Daftar</button>
                                        </div>
                                    </div>
                                </form>
                                <p>Sudah punya Akun ? <a href="<?php echo base_url() ?>login">login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of about -->