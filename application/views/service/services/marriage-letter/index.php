<style>
    .form-control border-dark-submit-button {
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
                            <form action="<?= base_url('marriage-letter/add') ?>" method="POST"
                                enctype="multipart/form-data">
                                <small class="text-light fw-semibold">Biodata Pemohon</small>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-tanggal"
                                            name="tanggal" value="<?= date("Y-m-d") ?>" readonly />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-nik">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-nik"
                                            onchange="validateLength(this)" name="nik" placeholder="1122334455667788"
                                            required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-nama">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-nama" name="nama"
                                            placeholder="Magfira Islamia" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-ttl" name="ttl"
                                            placeholder="Jakarta, 5 Mei 1990" required />
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
                                    <label class="col-sm-2 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-pekerjaan"
                                            name="pekerjaan" placeholder="Karyawan Swasta" required />
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
                                    <label class="col-sm-2 col-form-label" for="select-status-kawin">Status Kawin</label>
                                    <div class="col-sm-10">
                                        <select name="status_kawin" class="form-select border-dark"
                                            aria-label="Default select example" id="select-status-kawin" required>
                                            <option value="" selected disabled>Pilih Status Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-alamat">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control border-dark" id="input-alamat" name="alamat"
                                            placeholder="Jl. Merdeka No. 40" required></textarea>
                                    </div>
                                </div>
                                <hr class="ml-0 mr-0 mb-3">
                                <small class="text-light fw-semibold">Biodata Orang Tua</small>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-anak-ke">Anak Ke-</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control border-dark" id="input-anak-ke"
                                            name="anak_ke" placeholder="1" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-nama-ayah">Nama Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-nama-ayah"
                                            name="nama_ayah" placeholder="Nama Lengkap Ayah" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-ttl-ayah">Tempat, Tanggal Lahir
                                        Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-ttl-ayah"
                                            name="ttl_ayah" placeholder="Bandung, 1 Januari 1960" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="select-agama-ayah">Agama Ayah</label>
                                    <div class="col-sm-10">
                                        <select name="agama_ayah" class="form-select border-dark"
                                            aria-label="Default select example" id="select-agama-ayah" required>
                                            <option value="" selected disabled>Pilih Agama Ayah</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-pekerjaan-ayah">Pekerjaan Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-pekerjaan-ayah"
                                            name="pekerjaan_ayah" placeholder="Petani" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-alamat-ayah">Alamat Ayah</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control border-dark" id="input-alamat-ayah" name="alamat_ayah"
                                            placeholder="Jl. Desa No. 1" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-nama-ibu">Nama Ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-nama-ibu"
                                            name="nama_ibu" placeholder="Nama Lengkap Ibu" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-ttl-ibu">Tempat, Tanggal Lahir
                                        Ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-ttl-ibu"
                                            name="ttl_ibu" placeholder="Surabaya, 1 Januari 1965" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="select-agama-ibu">Agama Ibu</label>
                                    <div class="col-sm-10">
                                        <select name="agama_ibu" class="form-select border-dark"
                                            aria-label="Default select example" id="select-agama-ibu" required>
                                            <option value="" selected disabled>Pilih Agama Ibu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-pekerjaan-ibu">Pekerjaan Ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control border-dark" id="input-pekerjaan-ibu"
                                            name="pekerjaan_ibu" placeholder="Ibu Rumah Tangga" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-alamat-ibu">Alamat Ibu</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control border-dark" id="input-alamat-ibu" name="alamat_ibu"
                                            placeholder="Jl. Desa No. 1" required></textarea>
                                    </div>
                                </div>
                                <hr class="ml-0 mr-0 mb-3">
                                <small class="text-light fw-semibold">Dokumen Pendukung</small>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-foto-ktp">Foto KTP</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto_ktp" id="input-foto-ktp"
                                            class="form-control border-dark"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="input-foto-kk">Foto KK</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto_kk" id="input-foto-kk"
                                            class="form-control border-dark"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" required>
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