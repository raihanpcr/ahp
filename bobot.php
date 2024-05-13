<?php
session_start();
include('config.php');
include('fungsi.php');

$jenis = $_GET['c'];

$id_periode = $_GET['id'];
$query = "SELECT * FROM periode WHERE id=$id_periode";
$result = mysqli_query($koneksi, $query);
$periode = mysqli_fetch_array($result);

include('header.php');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Perbandingan Guru &rarr; <?php echo getKriteriaNama($jenis - 1) ?> (Periode <?php echo $periode['nama_periode'] ?>)</h4>
                    </div>
                    <div class="card-body">
                        <a href="bobot_periode.php?c=<?php echo $jenis ?>" class="btn btn-default">Kembali</a>
                        <?php showTabelPerbandingan($jenis, 'guru', $id_periode); ?>
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