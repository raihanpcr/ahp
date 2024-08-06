<?php
session_start();
include('config.php');
include('fungsi.php');

// menjalankan perintah edit
if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    header('Location: edit.php?jenis=guru&id=' . $id);
    exit();
}

// menjalankan perintah delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteGuru($id);
}

// menjalankan perintah tambah
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    tambahData('guru', $nama);
}

include('header.php');

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Guru</h4>
                    </div>
                    <div class="card-body">
                        <a href="tambah.php?jenis=Guru" class="btn btn-info">Tambah Guru</a>
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th colspan="2">NIP</th>
                                        <th colspan="2">Nama Guru</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // Menampilkan list guru
                                    $query = "SELECT id,nama,nis FROM guru ORDER BY nis ";
                                    $result    = mysqli_query($koneksi, $query);

                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['nis'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td>
                                                <form method="post" action="guru.php">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                    <button type="submit" name="edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> EDIT</button>
                                                    <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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