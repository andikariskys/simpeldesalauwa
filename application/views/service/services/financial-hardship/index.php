<style>
    .form-control border-dark border-dark-submit-button {
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
                            <h5 class="mb-0">Form Tambah <?= $title ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('financial-hardship/add') ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-tanggal"
                                            name="tanggal" value="<?= date("Y-m-d") ?>" readonly />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-no-kk">No. KK</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control border-dark" id="input-no-kk"
                                            onchange="validateLength(this)" name="no_kk" placeholder="3313123456780004"
                                            required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-foto-kk">Foto Kartu Keluarga</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto_kk" id="input-foto-kk"
                                            class="form-control border-dark"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-no-nik">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control border-dark" id="input-no-nik"
                                            onchange="validateLength(this)" name="nik" placeholder="3313123456780003"
                                            required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-nama-lengkap">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-nama-lengkap"
                                            name="nama_lengkap" placeholder="Magfira Islamia" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-ttl" name="ttl"
                                            placeholder="Jakarta, 2 Februari 2000" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input name="jenis_kelamin" class="form-check-input border-dark" type="radio"
                                                value="Laki-laki" id="radio-laki-laki" required>
                                            <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="jenis_kelamin" class="form-check-input border-dark" type="radio"
                                                value="Perempuan" id="radio-perempuan">
                                            <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                                    <div class="col-sm-10">
                                        <select name="agama" class="form-select border-dark"
                                            aria-label="Default select example" id="select-agama" required>
                                            <option value="" selected disabled>Pilih Agama atau Kepercayaan</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control border-dark" id="input-alamat" name="alamat"
                                            placeholder="Jl. Merdeka No. 10" required></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-primary">Batal</button>
                                    </div>
                                </div>
                            </form>
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
    function validateLength(input) {
        if (input.value.length > 16) {
            alert("NIK dan KK tidak boleh lebih dari 16 angka");
            input.value = input.value.slice(0, 16); // Memotong input jika lebih dari 16 karakter
        }
    }
</script>