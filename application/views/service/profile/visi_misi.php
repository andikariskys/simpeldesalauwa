<!-- About-->
<div id="about" class="basic-1 bg-white ">
    <?php foreach ($profil as $val) { ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-container first">
                        <h2>Visi Misi</h2>
                        <p><?= $val->Sambutan_kepaladesa ?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6">
                    <h6>Visi</h6>
                    <p><?= $val->Visi ?></p>
                </div> <!-- end of col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h6>Visi</h6>
                    <p><?= $val->Misi ?></p>
                </div> <!-- end of col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h6>Jam Kerja</h6>
                    <p><?= $val->Jam_kerja ?></p>
                </div> <!-- end of col -->
            </div>
        </div> <!-- end of container -->
    <?php } ?>
</div> <!-- end of basic-1 -->
<!-- end of about -->