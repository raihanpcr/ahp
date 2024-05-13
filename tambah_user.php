<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_POST['tambah'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $role = $_POST['role'];

    tambahUser($nama_lengkap, $username1, $password1, $role);

    header('Location: user.php');
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="tambah_user.php">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value=""></option>
                                    <!-- <option value="Admin">Admin</option> -->
                                    <option value="Pembina">Pembina</option>
                                    <option value="Osis">Osis</option>
                                </select>
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