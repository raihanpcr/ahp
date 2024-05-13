<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM periode WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    $periode = mysqli_fetch_array($result);
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Perbandingan Kriteria Periode <?php echo $periode['nama_periode'] ?></h4>
                    </div>
                    <div class="card-body">
                        <a href="bobot_kriteria_periode.php" class="btn btn-default">Kembali</a>
                        <?php showTabelPerbandingan('kriteria', 'kriteria', $periode['id']); ?>
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