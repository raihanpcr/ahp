<?php
include('config.php');

$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
    if (mysqli_num_rows($q) == 0) {
        $error = 'Username dan password salah';
    }
    if (empty($error)) {
        $r = mysqli_fetch_array($q);
        $_SESSION['LOG_USER'] = $r['id'];
        $_SESSION['LOG_ROLE'] = $r['role'];
        $_SESSION['LOG_NAMA'] = $r['nama_lengkap'];
        header('location:index.php');
    }
}

include('header_login.php');
?>
<div class="container-logo">

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5" style="border-radius: 20px">
                    <img src="assets/images/sman_assets.png" class="rounded mx-auto d-block mt-5">
                    <div class="card-body">
                        <h5 class="card-title text-center mt-3">L O G I N</h5>
                        <hr>
                        <div class="text-center mt-4">
                            <?php
                            if (!empty($error)) {
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                            ?>
                        </div>
                        <form method="post" action="" class="form-signin">
                            <div class="form-label-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required autofocus>
                            </div>

                            <div class="form-label-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <button class="btn btn-lg btn-info btn-block " type="submit" name="login">Masuk</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
include('footer.php');
?>