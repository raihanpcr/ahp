<?php
session_start();
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $jenis = $_GET['jenis'];

    // hapus record
    $query = "SELECT nama FROM $jenis WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $nama = $row['nama'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $nama = $_POST['nama'];

    $query = "UPDATE $jenis SET nama='$nama' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Update gagal";
        exit();
    } else {
        header('Location: ' . $jenis . '.php');
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
                        <h4 class="card-title">Edit <?php echo $jenis ?></h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="edit.php">
                            <div class="form-group">
                                <label>Nama <?php echo $jenis ?></label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" required>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="jenis" value="<?php echo $jenis ?>">
                            </div>
                            <br>
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