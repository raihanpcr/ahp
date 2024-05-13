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
                        <div class="card-header">
                            <h4 class="card-title ">Home</h4>
                        </div>
                        <div class="card-body text-center">
                            <p class="h4">Selamat datang di Sistem Pendukung Keputusan Pemilihan Guru Terbaik<br>SMAN 1 Bukit Batu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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