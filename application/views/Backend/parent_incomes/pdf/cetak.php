<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url() ?>assets/mark/images/luwu.png">

    <title><?= $title ?></title>
    <style>
        .logo {
            width: 100px;
            /* Mengatur ukuran logo menjadi lebih kecil */
            height: auto;
            position: absolute;
            top: 10px;
        }

        .logo-left {
            left: 10px;
            width: 100px;
        }

        .header-text {
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
            text-align: center;
            margin-top: 40px;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
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
            <h3>
                DESA LAUWA
            </h3>
        </center>
        <hr>
        <br>


</body>

</html>