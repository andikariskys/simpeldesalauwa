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

$penghasilan_ayah_ibu = $parent_income->Penghasilan_ayah + $parent_income->Penghasilan_ibu;
$penghasilan = "Rp " . number_format($penghasilan_ayah_ibu, 2,',','.');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "SPOT-" . $parent_income->Nama ?></title>
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
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $parent_income->Pekerjaan ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $parent_income->Alamat ?></td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>:</td>
                    <td>&plusmn; <?= $penghasilan ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 200px; text-align: justify;">&nbsp; &nbsp; Demikian Surat Keterangan ini dibuat untuk dipergunakan  sebagaimana mestinya.</p>
    </div>
    <div style="position: relative; top: 250px;">
        <div style="position: absolute; right: 0;">
            <table style="text-align: center;">
                <tr>
                    <td>Desa Lauwa, <?= $day . ' ' . $month . ' ' . $year ?></td>
                </tr>
                <tr>
                    <td>Kepala Desa Lauwa</td>
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