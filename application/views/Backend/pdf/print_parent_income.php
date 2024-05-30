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

$penghasilan_ayah = (int)$parent_income->Penghasilan_ayah;
$penghasilan_ibu = (int)$parent_income->Penghasilan_ibu;
$penghasilan = $penghasilan_ayah + $penghasilan_ibu;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "SPOT-" . $parent_income->Nama ?></title>
</head>

<body style="font-family: 'Times New Roman', Times, serif; padding: 20px;">
    <div style="position: relative; height: 70px;">
        <div style="position: absolute; top: 10; text-align: center; width: 100%;">
            <p style="font-size: 15px; margin: 0px; text-transform: uppercase; font-weight: bold;"><u>Surat Pernyataan Penghasilan</u></p>
        </div>
    </div>
    <div style="position: relative;">
        <p style="text-align: justify;">Yang bertanda tangan di bawah ini dengan menerangkan bahwa:</p>
        <div style="position: absolute; left: 50;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $parent_income->Nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $parent_income->Ttl ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $parent_income->Nik ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $parent_income->Jenis_kelamin ?></td>
                </tr>
                <!-- <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $parent_income->Pekerjaan ?></td>
                </tr> -->
                <!-- <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $parent_income->Alamat ?></td>
                </tr> -->
                <tr>
                    <td>Penghasilan</td>
                    <td>:</td>
                    <td><?= $penghasilan ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 175px; text-align: justify;">&nbsp; &nbsp; Demikian Surat Keterangan ini dibuat untuk dipergunakan  sebagaimana mestinya.</p>
    </div>
    <div style="position: relative; top: 250px;">
        <div style="position: absolute; right: 0;">
            <table style="text-align: center;">
                <tr>
                    <td>Desa Lauwa, <?= $day . ' ' . $month . ' ' . $year ?></td>
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
                    <td style="font-weight: bold;"><u><?= $parent_income->Nama ?></u></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>