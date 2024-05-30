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

$tahun_lahir =  (int)substr($death_certificate->Ttl, -4 );
$umur = $year - $tahun_lahir;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "SKM-" . $death_certificate->Nama ?></title>
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
            <p style="font-size: 15px; margin: 0px; text-transform: uppercase; font-weight: bold;"><u>Surat Keterangan Kematian</u></p>
            <p style="font-size: 15px; margin: 0px;">Nomor: <?= $death_certificate->id_keterangankematian ?>/SKM/D.LW/V/<?= $year ?></p>
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
                    <td><?= $death_certificate->Nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl Lahir</td>
                    <td>:</td>
                    <td><?= $death_certificate->Ttl ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?= $umur ?> Tahun</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $death_certificate->Jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $death_certificate->Alamat ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 275px; text-align: justify;">Telah meninggal dunia pada:</p>
        <div style="position: absolute; top:325px; left: 50;">
            <table>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td><?= $death_certificate->Hari_kematian ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $death_certificate->Tanggal_kematian ?></td>
                </tr>
            </table>
        </div>    
        <p style="position: absolute; top: 375px; text-align: justify;">Surat Keterangan ini dibuat atas dasar yang sebenarnya.</p>
        <div style="position: absolute; top:425px; left: 50;">
            <table>
                <tr>
                    <td>Nama Yang Melapor</td>
                    <td>:</td>
                    <td><?= $death_certificate->Nama_pelapor ?></td>
                </tr>
                <tr>
                    <td>Hub. Dengan Yang Mati</td>
                    <td>:</td>
                    <td><?= $death_certificate->Hubungan_pelapor ?></td>
                </tr>
            </table>
        </div>    
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