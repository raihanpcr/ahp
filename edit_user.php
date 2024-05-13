<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    $user = mysqli_fetch_array($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $role = $_POST['role'];

    $query = "UPDATE user SET nama_lengkap='$nama_lengkap',username='$username1',role='$role',password='$password1' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Update gagal";
        exit();
    } else {
        header('Location: user.php');
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
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="edit_user.php">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required value="<?php echo $user['nama_lengkap'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username1" class="form-control" required value="<?php echo $user['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password1" class="form-control" required value="<?php echo $user['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" required>
                                    <option value=""></option>
                                    <option value="Admin" <?php echo $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="Pimpinan" <?php echo $user['role'] == 'Pimpinan' ? 'selected' : '' ?>>Pimpinan</option>
                                    <option value="HRD" <?php echo $user['role'] == 'HRD' ? 'selected' : '' ?>>HRD</option>
                                </select>
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