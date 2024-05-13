<?php
session_start();
include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Matriks Perbandingan Berpasangan Guru Periode <?php echo $periode['nama_periode'] ?></h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <?php
                                    for ($i = 0; $i <= ($n - 1); $i++) {
                                        echo "<th>" . getKaryawanNama($i) . "</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($x = 0; $x <= ($n - 1); $x++) {
                                    echo "<tr>";
                                    echo "<td>" . getKaryawanNama($x) . "</td>";
                                    for ($y = 0; $y <= ($n - 1); $y++) {
                                        echo "<td>" . round($matrik[$x][$y], 5) . "</td>";
                                    }

                                    echo "</tr>";
                                }
                                ?>
                                <tr>
                                    <th>Jumlah</th>
                                    <?php
                                    for ($i = 0; $i <= ($n - 1); $i++) {
                                        echo "<th>" . round($jmlmpb[$i], 5) . "</th>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>Matriks Nilai Kriteria</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <?php
                                    for ($i = 0; $i <= ($n - 1); $i++) {
                                        echo "<th>" . getKaryawanNama($i) . "</th>";
                                    }
                                    ?>
                                    <th>Jumlah</th>
                                    <th>Priority Vector</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($x = 0; $x <= ($n - 1); $x++) {
                                    echo "<tr>";
                                    echo "<td>" . getKaryawanNama($x) . "</td>";
                                    for ($y = 0; $y <= ($n - 1); $y++) {
                                        echo "<td>" . round($matrikb[$x][$y], 5) . "</td>";
                                    }

                                    echo "<td>" . round($jmlmnk[$x], 5) . "</td>";
                                    echo "<td>" . round($pv[$x], 5) . "</td>";

                                    echo "</tr>";
                                }
                                ?>

                                <tr>
                                    <th colspan="<?php echo ($n + 2) ?>">Principe Eigen Vector (λ maks)</th>
                                    <th><?php echo (round($eigenvektor, 5)) ?></th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo ($n + 2) ?>">Consistency Index</th>
                                    <th><?php echo (round($consIndex, 5)) ?></th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo ($n + 2) ?>">Consistency Ratio</th>
                                    <th><?php echo (round($consRatio, 5)) ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if ($consRatio > 0.1) {
                        ?>
                            <div class="alert alert-danger">
                                Nilai Consistency Ratio melebihi 0.1
                                <p>Mohon input kembali tabel perbandingan</p>
                            </div>

                            <br>

                            <a href='javascript:history.back()'>
                                <button class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i>
                                    Kembali
                                </button>
                            </a>

                            <?php

                        } else {
                            if ($jenis == getJumlahKriteria()) {
                            ?>

                                <br>
                                <a href="hasil.php?id=<?php echo $periode['id'] ?>">
                                    <button class="btn btn-default" style="float: right;">
                                        <i class="fa fa-arrow-right"></i>
                                        Lanjut
                                    </button>
                                </a>


                            <?php

                            } else {

                            ?>
                                <br>
                                <a href="<?php echo "bobot.php?c=" . ($jenis + 1) . "&id=" . $periode['id'] ?>">
                                    <button class="btn btn-default" style="float: right;">
                                        <i class="fa fa-arrow-right"></i>
                                        Lanjut
                                    </button>
                                </a>
                        <?php
                            }
                        }
                        ?>
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