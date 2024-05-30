<?php
// Array asosiatif untuk mengonversi nama bulan dalam bahasa Inggris ke bahasa Indonesia
$bulan = array(
    "January" => "Januari",
    "February" => "Februari",
    "March" => "Maret",
    "April" => "April",
    "May" => "Mei",
    "June" => "Juni",
    "July" => "Juli",
    "August" => "Agustus",
    "September" => "September",
    "October" => "Oktober",
    "November" => "November",
    "December" => "Desember"
);

// Mendapatkan tanggal hari ini
$tanggal_hari_ini = date("d");
// Mendapatkan nama bulan dalam bahasa Indonesia berdasarkan tanggal hari ini
$bulan_hari_ini = $bulan[date("F")];
// Mendapatkan tahun hari ini
$tahun_hari_ini = date("Y");

// Menampilkan tanggal hari ini dalam format tanggal bulan tahun (misal: 29 Mei 2024)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url() ?>assets/mark/images/luwu.png">

    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-left: 10px;
        }

        .logo {
            width: 100px;
            /* Mengatur ukuran logo menjadi lebih kecil */
            height: auto;
            position: absolute;
            top: 10px;
        }

        .logo-left {
            left: 0px;
            width: 150px;
        }

        .header-text {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
            margin-top: 10px;
            /* Atur margin atas */
            position: absolute;
            top: 10px;
            /* Sesuaikan dengan posisi logo */
            left: 50%;
            transform: translateX(-50%);
        }

        .sub-header-text {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
            margin-top: 30px;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .sub2-header-text {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
            margin-top: 0px;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: relative;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .address {
            text-align: center;
            margin-top: 0px;
            font-style: italic;
            font-size: x-small;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: relative;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            /* width: 90%; */

        }

        .header-title {
            /* font-family: "Times New Roman", Times, serif; */
            text-align: center;
            margin-top: 0px;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: relative;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 35%;
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
        }

        th,
        td {
            /* border: 1px solid black; */
            padding: 5px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
        }

        .section {
            margin-bottom: 5px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 3px;
            display: inline-block;
            /* width: 200px; */
            /* Atur lebar agar titik dua sejajar */
        }

        .info-list {
            list-style-type: none;
            padding-left: 0;
        }

        .info-list li {
            margin-bottom: 2px;
        }

        .info-list li strong {
            display: inline-block;
            width: 200px;
            /* Atur lebar agar titik dua sejajar */
        }

        .signature {
            position: absolute;
            bottom: 50px;
            right: 50px;
        }
    </style>
</head>

<body>
    <img src="<?php echo $logo1 ?>" class="logo logo-left">
    <br><br><br>
    <form action="<?= base_url() ?>report/balita/cetak" method="get">
        <h3 class="header-text">
            PEMERINTAH KABUPATEN LUWU
        </h3>
        <h3 class="sub-header-text">
            KECAMATAN BELOPA UTARA
        </h3>
        <center>
            <h3 class="sub2-header-text">
                DESA LAUWA
            </h3>
            <h5 class="address">
                Alamat: Jl. Andi Sonde No.89 Lauwa Telp. 0411-7770442 Kode Pos 1994
                <hr>
            </h5>
            <h4 class="header-title">
                <?= $title ?>
                <hr>
                Nomor <?= $death_certificates->id_keterangankematian ?>/SKM/D.LW/V/2024
            </h4>
        </center>
        <br>
        <div class="container">
            <div class="container">
                <div class="section">
                    <p class="section-title">Yang bertanda tangan di bawah ini</p>
                    <ul class="info-list">
                        <li><strong>Nama</strong>: MUHLIS, S.Sos</li>
                        <li><strong>Jabatan</strong>: Kepala Desa Lauwa</li>
                        <li><strong>Alamat</strong>: Desa Lauwa Kec. Belopa Utara Kab. Luwu</li>
                    </ul>
                </div>

                <div class="section">
                    <p class="section-title">Menerangkan bahwa</p>
                    <ul class="info-list">
                        <li><strong>Nama</strong>: <?= $death_certificates->Nama ?></li>
                        <li><strong>Tempat/Tgl Lahir</strong>: <?= $death_certificates->Ttl ?></li>
                        <li><strong>Umur</strong>: ... Tahun</li>
                        <li><strong>Jenis Kelamin</strong>: <?= $death_certificates->Jenis_kelamin ?></li>
                        <li><strong>Alamat</strong>: <?= $death_certificates->Alamat ?></li>
                    </ul>
                </div>

                <div class="section">
                    <p class="section-title">Telah meninggal dunia pada</p>
                    <ul class="info-list">
                        <li><strong>Hari</strong>: <?= $death_certificates->Hari_kematian ?></li>
                        <li><strong>Tanggal</strong>: <?= $death_certificates->Tanggal_kematian ?></li>
                    </ul>
                </div>

                <div class="section">
                    <p class="section-title">Surat Keterangan ini dibuat atas dasar yang sebenarnya.</p>
                </div>

                <div class="section">
                    <p class="info-list">Nama Yang Melapor : ....</p>
                    <p class="info-list">Hub. Dengan Yang Mati: ...</p>
                </div>

                <!-- Tanda tangan -->
                <div class="signature">
                    <p>Lauwa ,<?= "$tanggal_hari_ini $bulan_hari_ini $tahun_hari_ini";
                                ?></p>
                    <p> Kepala Desa Lauwa </p>
                    <p> </p>
                    <p> </p>
                    <p><u>MUHLIS, S.Sos</u></p>
                </div>
            </div>

</body>

</html>