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
                        <form action="<?= base_url('parent-income/add') ?>" method="POST" enctype="multipart/form-data">
                            <hr class="ml-0 mr-0 mb-3">
                            <small class="text-light fw-semibold">Biodata Pribadi</small>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-tanggal">Tanggal (Read-only)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-tanggal" name="tanggal" placeholder="2024-05-24" value="<?= date("Y-m-d") ?>" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-no-kk">No. KK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-no-kk" name="no_kk" placeholder="3313123456780003" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-foto-kartu-keluarga">Foto Kartu Keluarga</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_kk" id="input-foto-kartu-keluarga" class="form-control border-dark" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-no-nik">NIK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-no-nik" name="nik" placeholder="3313123456780004" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-foto-ktp">Foto KTP</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto_ktp" id="input-foto-ktp" class="form-control border-dark" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-nama-lengkap">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-nama-lengkap" name="nama_lengkap" placeholder="Magfira Islamia" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-ttl">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-ttl" name="ttl" placeholder="Jakarta, 1 Januari 2000" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="radio-laki-laki" required checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="radio-perempuan">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="select-agama">Agama/Kepercayaan</label>
                                <div class="col-sm-8">
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
                                <label class="col-sm-4 col-form-label" for="input-alamat">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="input-alamat" class="form-control border-dark" placeholder="Jl. Mawar Merah No. 12" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-pekerjaan">Pekerjaan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-pekerjaan" name="pekerjaan" placeholder="Pelajar/Mahasiswa" required />
                                </div>
                            </div>

                            <hr class="ml-0 mr-0 mb-3">
                            <small class="text-light fw-semibold">Biodata Ayah</small>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-no-nik-ayah">NIK Ayah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-no-nik-ayah" name="nik_ayah" placeholder="3313123456780001" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-nama-lengkap-ayah">Nama Lengkap Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-nama-lengkap-ayah" name="nama_lengkap_ayah" placeholder="Nama Lengkap Ayah" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-ttl-ayah">Tempat, Tanggal Lahir Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-ttl-ayah" name="ttl_ayah" placeholder="Jakarta, 1 Januari 1980" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="select-agama-ayah">Agama/Kepercayaan Ayah</label>
                                <div class="col-sm-8">
                                    <select name="agama_ayah" class="form-select border-dark" aria-label="Default select example" id="select-agama-ayah" required>
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
                                <label class="col-sm-4 col-form-label" for="input-pekerjaan-ayah">Pekerjaan Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-pekerjaan-ayah" name="pekerjaan_ayah" placeholder="Pegawai Swasta" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-penghasilan-ayah">Penghasilan Ayah (Rp. )</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-penghasilan-ayah" name="penghasilan_ayah" placeholder="2100000" required />
                                </div>
                            </div>

                            <hr class="ml-0 mr-0 mb-3">
                            <small class="text-light fw-semibold">Biodata Ibu</small>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-no-nik-ibu">NIK Ibu</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-no-nik-ibu" name="nik_ibu" placeholder="3313123456780002" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-nama-lengkap-ibu">Nama Lengkap Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-nama-lengkap-ibu" name="nama_lengkap_ibu" placeholder="Nama Lengkap Ibu" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-ttl-ibu">Tempat, Tanggal Lahir Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-ttl-ibu" name="ttl_ibu" placeholder="Jakarta, 1 Januari 1982" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="select-agama-ibu">Agama/Kepercayaan Ibu</label>
                                <div class="col-sm-8">
                                    <select name="agama_ibu" class="form-select border-dark" aria-label="Default select example" id="select-agama-ibu" required>
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
                                <label class="col-sm-4 col-form-label" for="input-pekerjaan-ibu">Pekerjaan Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-dark" id="input-pekerjaan-ibu" name="pekerjaan_ibu" placeholder="Ibu Rumah Tangga" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="input-penghasilan-ibu">Penghasilan Ibu (Rp. )</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control border-dark" id="input-penghasilan-ibu" name="penghasilan_ibu" placeholder="0" required />
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-8">
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