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
    <title><?= "SKTM-" . $financial_hardship->Nama ?></title>
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
            <p style="font-size: 15px; margin: 0px; text-transform: uppercase; font-weight: bold;"><u>Surat Keterangan Tidak Mampu</u></p>
            <p style="font-size: 15px; margin: 0px;">Nomor: <?= $financial_hardship->id_keterangantidakmampu ?>/SKTM/D.LW/IV/<?= $year ?></p>
        </div>
    </div>
    <div style="position: relative;">
        <p style="text-align: justify;">Yang bertanda tangan di bawah ini Kepala Desa Lauwa Kecamatan Belopa Utara Kabupaten Luwu, menerangkan bahwa:</p>
        <div style="position: absolute; left: 50;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Nama ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Ttl ?></td>
                </tr>
                <tr>
                    <td>No. KK</td>
                    <td>:</td>
                    <td><?= $financial_hardship->No_kk ?></td>
                </tr>
                <tr>
                    <td>No. NIK</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Nik ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Agama ?></td>
                </tr>
                <tr>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td>Indonesia</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>Pelajar/Mahasiswa</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $financial_hardship->Alamat ?></td>
                </tr>
            </table>
        </div>
        <p style="position: absolute; top: 275px; text-align: justify;">&nbsp; &nbsp; Yang tersebut namanya diatas adalah benar warga penduduk Desa Lauwa Kecamatan Belopa Utara Kabupaten Luwu, yang bersangkutan adalah benar Keluarga <strong>TIDAK MAMPU</strong> dan surat keterangan tersebut diperuntukan untuk Pengurusan di Sekolah, dan apabila surat keterangan yang kami buat ini tidak benar, maka kami akan bersedia menerima sanksi sesuai dengan ketentuan dan hukum yang berlaku.</p>
        <p style="position: absolute; top: 375px; text-align: justify;">&nbsp; &nbsp; Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
    <div style="position: relative; top: 400px;">
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