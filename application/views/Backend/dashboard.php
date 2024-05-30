<div class="card">
    <div class="card-body">
        <h5 class="card-text">Selamat datang, <?= $this->session->userdata('nama') ?>!</h5>
    </div>
</div>
<?php $count_all = $count_all[0] ?>
<div class="row mt-4">

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Keterangan Penghasilan Orang Tua</h5>
                <p class="card-text badge bg-label-success badge bg-label-success"><?= $count_all['spot_verified'] ?> / <?= $count_all['spot'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('parent_incomes') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Keterangan Tidak Mampu</h5>
                <p class="card-text badge bg-label-success"><?= $count_all['sktm_verified'] ?> / <?= $count_all['sktm'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('financial_hardships') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Keterangan Kelahiran</h5>
                <p class="card-text badge bg-label-success"><?= $count_all['kelahiran_verified'] ?> / <?= $count_all['kelahiran'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('birth_announcements') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Keterangan Kematian</h5>
                <p class="card-text badge bg-label-success"><?= $count_all['kematian_verified'] ?> / <?= $count_all['kematian'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('death_certificates') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Pengantar Nikah</h5>
                <p class="card-text badge bg-label-success"><?= $count_all['nikah_verified'] ?> / <?= $count_all['nikah'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('marriage_recommendations') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card mb-3 h-100">
            <div class="card-body">
                <h5 class="card-title">Surat Pengantar Keterangan Catatan Kepolisian</h5>
                <p class="card-text badge bg-label-success"><?= $count_all['spkck_verified'] ?> / <?= $count_all['spkck'] ?> surat telah diterbitkan.</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('police_reports') ?>" class="btn btn-primary waves-effect waves-light">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

</div>