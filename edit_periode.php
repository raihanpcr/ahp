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

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_periode = $_POST['nama_periode'];

    $query = "UPDATE periode SET nama_periode='$nama_periode' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Update gagal";
        exit();
    } else {
        header('Location: periode.php');
        exit();
    }
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Periode</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="edit_periode.php">
                            <div class="form-group">
                                <label>Nama Periode</label>
                                <input type="text" name="nama_periode" class="form-control" required value="<?php echo $periode['nama_periode'] ?>">
                            </div>
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input class="btn btn-success" type="submit" name="update" value="UPDATE">
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