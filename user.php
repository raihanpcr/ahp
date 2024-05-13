<?php
session_start();
include('config.php');
include('fungsi.php');

// menjalankan perintah edit
if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    header('Location: edit_user.php?id=' . $id);
    exit();
}

// menjalankan perintah delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteUser($id);
}

// menjalankan perintah tambah
if (isset($_POST['tambah'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    tambahUser($nama_lengkap, $username, $password, $role);
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User</h4>
                    </div>
                    <div class="card-body">
                        <a href="tambah_user.php" class="btn btn-info">Tambah User</a>
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="collapsing">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th colspan="2">Role</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM user ORDER BY id";
                                    $result = mysqli_query($koneksi, $query);

                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['nama_lengkap'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['role'] ?></td>
                                            <td class="right aligned collapsing">
                                                <form method="post" action="user.php">
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