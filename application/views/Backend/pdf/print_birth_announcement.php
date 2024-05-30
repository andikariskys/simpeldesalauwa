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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "SKM-" . $birth_announcement->Nama ?></title>
</head>

<body style="font-family: 'Times New Roman', Times, serif; padding: 20px;">
    <div style="position: relative; height: 70px;">
        <div style="position: absolute; top: 10; text-align: center; width: 100%;">
            <p style="font-size: 15px; margin: 0px; text-transform: uppercase; font-weight: bold;"><u>Surat Keterangan Kematian</u></p>
            <p style="font-size: 15px; margin: 0px;">Nomor: <?= $birth_announcement->id_keterangankelahiran ?>/DS/D.LW/V/<?= $year ?></p>
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
                    <td><?= $birth_announcement->Nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl Lahir</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Ttl ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Agama ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Alamat ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 275px; text-align: justify;">Orang tersebut diatas adalah anak dari:</p>
        <div style="position: absolute; top:325px; left: 50;">
            <table>
                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Nama_ayah ?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?= $birth_announcement->Nama_ibu ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="position: relative; top: 400px;">
        <div style="position: absolute; right: 0;">
            <table style="text-align: center;">
                <tr>
                    <td>Lauwa, <?= $day . ' ' . $month . ' ' . $year ?></td>
                </tr>
                <tr>
                    <td>Yang Menyatakan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;"><u><?= $birth_announcement->Nama_ayah ?></u></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>