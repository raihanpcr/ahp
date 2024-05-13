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

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <form method="post" action="" class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" name="login">Login</button>
                    </form>
                    <div class="text-center mt-4">
                        <?php
                        if (!empty($error)) {
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
include('footer.php');
?>