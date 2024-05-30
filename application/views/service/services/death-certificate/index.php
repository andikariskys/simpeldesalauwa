<style>
    .form-controlborder-dark border-dark-submit-button {
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
    <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('alert'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>
<div class="basic-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Form Tambah <?= $title ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('death-certificate/add') ?>" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-dark" id="input-tanggal" name="tanggal" value="<?= date("Y-m-d") ?>" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control border-dark" id="input-nik" name="nik" placeholder="1234567890123456" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control border-dark" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-dark" id="input-nama" name="nama" placeholder="Magfira Islamia" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-dark" id="input-ttl" name="ttl" placeholder="Jakarta, 4 April 1950" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input name="jenis_kelamin" class="form-check-input  border-dark" type="radio" value="Laki-laki" id="radio-laki-laki" required>
                                        <label class="form-check-label" for="radio-laki-laki"> Laki-laki </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="jenis_kelamin" class="form-check-input  border-dark" type="radio" value="Perempuan" id="radio-perempuan">
                                        <label class="form-check-label" for="radio-perempuan"> Perempuan </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-dark" id="input-pekerjaan" name="pekerjaan" placeholder="Pensiunan" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                                <div class="col-sm-10">
                                    <select name="agama" class="form-select border-dark" aria-label="Default select example" id="select-agama" required>
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
                                    <textarea class="form-control border-dark" id="input-alamat" name="alamat" placeholder="Jl. Merdeka No. 30" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-hari-kematian">Hari Kematian</label>
                                <div class="col-sm-10">
                                    <select name="hari_kematian" class="form-select  border-dark" aria-label="Default select example" id="input-hari-kematian" required>
                                        <option value="" selected disabled>Pilih hari kematian</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jum'at">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-tanggal-kematian">Tanggal Kematian</label>
                                <div class="col-sm-10">
                                    <input type="date" id="input-tanggal-kematian" name="tanggal_kematian" placeholder="MM/DD/YYYY" class="form-control border-dark">
                                </div>
                            </div>
                            <hr class="ml-0 mr-0 mb-3">
                            <small class="text-light fw-semibold">Informasi Pelapor</small>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-nama-pelapor">Nama Pelapor</label>
                                <div class="col-sm-10">
                                    <input type="text" id="input-nama-pelapor" name="nama_pelapor" placeholder="Abdur" class="form-control border-dark">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-hubungan-pelapor">Hubungan Pelapor</label>
                                <div class="col-sm-10">
                                    <input type="text" id="input-hubungan-pelapor" name="hubungan_pelapor" placeholder="Anak Kandung" class="form-control border-dark">
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

        </div> <!-- end of row -->
    </div> <!-- end of basic-4 -->
</div>