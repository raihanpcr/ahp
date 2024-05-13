<?php
session_start();
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis'])) {
    $jenis    = $_GET['jenis'];
}

if (isset($_POST['tambah'])) {
    $jenis    = $_POST['jenis'];
    $nama     = $_POST['nama'];

    tambahData($jenis, $nama);

    header('Location: ' . $jenis . '.php');
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah <?php echo $jenis ?></h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="tambah.php">
                            <div class="form-group">
                                <label>Nama <?php echo $jenis ?></label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <input type="hidden" name="jenis" value="<?php echo $jenis ?>">
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