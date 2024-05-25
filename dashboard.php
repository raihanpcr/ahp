<?php
session_start();
if (isset($_SESSION['LOG_USER'])) {
    include('config.php');
    include('fungsi.php');
    include('header.php');
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">

                            <h2 class="card-title font-weight-bold mt-2">Diagram Hasil Perangkingan</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-left">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Profil SMAN 1 Bukit Batu</h4>
                        </div>
                        <div class="card-body text-center">
                            <p class="h4 text-bold">Selamat datang di Sistem Pendukung Keputusan Pemilihan Guru Terbaik SMAN 1 Bukit Batu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <?php include('footer_text.php'); ?>

    </div>
    </div>

    <?php include('js.php'); ?>
    <?php include('footer.php'); ?>
<?php
} else {
    include "login.php";
}
?>