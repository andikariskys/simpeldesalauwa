<?php
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

$day = date("d");
$month = $bulan[date("F")];
$year = date("Y");

$tahun_lahir =  (int)substr($marriage_recommendation->Ttl, -4 );
$umur = $year - $tahun_lahir;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "SKBM-" . $marriage_recommendation->Nama ?></title>
</head>

<body style="font-family: 'Times New Roman', Times, serif; padding: 20px;">
    <div style="position: relative; height: 130px;">
        <img src="<?php echo $logo1 ?>" alt="logo" style="width: 150px; height: auto; position: absolute;">
        <div style="position: absolute; top: 10; left: 20%; width: 70%; text-align: center;">
            <div style="text-transform: uppercase;">
                <h1 style="font-size: 20px; margin: 0px;">Kecamatan Belopa Utara</h1>
                <h1 style="font-size: 20px; margin: 0px;">Pemerintahan Kabupaten Luwu</h1>
                <h1 style="font-size: 25px; margin: 0px;">Desa Lauwa</h1>
            </div>
            <p style="margin: 0px; font-size: 15px; font-style: italic; font-weight: lighter;">Alamat: Jl. Andi Sonde No.89 Lauwa Telp. 0411-7770442 Kode Pos 1994</p>
        </div>
        <div style="position: absolute; width: 100%; bottom: 0;">
            <hr style="margin-bottom: 2px; height: 2px; background-color: #000; ">
            <hr style="background-color: #000; margin: 0px;">
        </div>
    </div>
    <div style="position: relative; height: 70px;">
        <div style="position: absolute; top: 10; text-align: center; width: 100%;">
            <p style="font-size: 15px; margin: 0px; text-transform: uppercase; font-weight: bold;"><u>Surat Pengantar Nikah</u></p>
            <p style="font-size: 15px; margin: 0px;">Nomor: <?= $marriage_recommendation->id_pengantarnikah ?>/D.LW/V/<?= $year ?></p>
        </div>
    </div>
    <div style="position: relative;">
        <p style="text-align: justify;">Yang bertanda tangan di bawah ini:</p>
        <div style="position: absolute; left: 50;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>MUHLIS, S.Sos</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>Kepala Desa Lauwa</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>Desa Lauwa Kec. Belopa Utara Kab. Luwu</td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 110px; text-align: justify;">Menerangkan bahwa:</p>
        <div style="position: absolute; top:160px; left: 50;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl Lahir</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Ttl ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Agama ?></td>
                </tr>
                <tr>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td>Indonesia</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Pekerjaan ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Nik ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $marriage_recommendation->Alamat ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 350px; text-align: justify;">&nbsp; &nbsp; Adalah penduduk asli Desa Lauwa Kecamatan Belopa Utara Kabupaten Luwu dan Surat Pengantar ini dipergunakan untuk mengurus administrasi pernikahan.</p> 
        <p style="position: absolute; top: 400px; text-align: justify;">&nbsp; &nbsp; Demikianlah Surat Pengantar ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p> 
    </div>
    <div style="position: relative; top: 500px;">
        <div style="position: absolute; right: 0;">
            <table style="text-align: center;">
                <tr>
                    <td>Lauwa, <?= $day . ' ' . $month . ' ' . $year ?></td>
                </tr>
                <tr>
                    <td>Kepala Desa</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;"><u>MUHLIS, S.Sos</u></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>