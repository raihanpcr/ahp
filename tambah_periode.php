<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_POST['tambah'])) {
    $nama_periode = $_POST['nama_periode'];

    tambahPeriode($nama_periode);

    header('Location: periode.php');
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Periode</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="tambah_periode.php">
                            <div class="form-group">
                                <label>Nama Periode</label>
                                <input type="text" name="nama_periode" class="form-control" required>
                            </div>
                            <br>
                            <input class="btn btn-success" type="submit" name="tambah" value="SIMPAN">
                        </form>
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