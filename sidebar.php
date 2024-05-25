<div class="sidebar" data-color="green" data-background-color="white" data-image="assets/template/img/sidebar-1.jpg">
    <div class="logo text-center">
        <img src="assets/images/sman_assets.png" class="" alt="">
        <a href="index.php" class="simple-text logo-normal"> SMAN 1 Bukit Batu</a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="material-icons">home</i>
                    <p>Beranda</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <?php if ($_SESSION['LOG_ROLE'] == 'Admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                        <i class="material-icons">person</i>
                        <p>User</p>
                    </a>
                </li>

                <!-- pembina -->
            <?php elseif ($_SESSION['LOG_ROLE'] == 'Pembina') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="kriteria.php">
                        <i class="material-icons">folder_shared</i>
                        <p>Kriteria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guru.php">
                        <i class="material-icons">assignment_ind</i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                        <i class="material-icons">person</i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil_periode.php">
                        <i class="material-icons">check_box</i>
                        <p>Hasil</p>
                    </a>
                </li>
                <!-- osis -->
            <?php elseif ($_SESSION['LOG_ROLE'] == 'Osis') : ?>

                <li class="nav-item">
                    <a class="nav-link" href="periode.php">
                        <i class="material-icons">schedule</i>
                        <p>Periode</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bobot_kriteria_periode.php">
                        <i class="material-icons">folder_shared</i>
                        <p>Perbandingan Kriteria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bobot_periode.php?c=1">
                        <i class="material-icons">folder_shared</i>
                        <p>Perbandingan Guru</p>
                    </a>
                </li>
                <?php
                if (getJumlahKriteria() > 0) {
                    for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='bobot_periode.php?c=" . ($i + 1) . "'>
                        <i class='material-icons'>chevron_right</i>" . getKriteriaNama($i) . "</a>
                        </li>";
                    }
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="hasil_periode.php">
                        <i class="material-icons">check_box</i>
                        <p>Hasil</p>
                    </a>
                </li>
            <?php endif; ?>
        </ul>



    </div>

</div>