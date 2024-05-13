<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_GET['id'])) {
    $id_periode = $_GET['id'];
    $query = "SELECT * FROM periode WHERE id=$id_periode";
    $result = mysqli_query($koneksi, $query);
    $periode = mysqli_fetch_array($result);
}

$query = "SELECT * FROM ranking WHERE id_periode=$id_periode";
$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    // menghitung perangkingan
    $jmlKriteria = getJumlahKriteria();
    $jmlKaryawan = getJumlahKaryawan();
    $nilai = array();

    // mendapatkan nilai tiap karyawan
    for ($x = 0; $x <= ($jmlKaryawan - 1); $x++) {
        // inisialisasi
        $nilai[$x] = 0;

        for ($y = 0; $y <= ($jmlKriteria - 1); $y++) {
            $id_karyawan = getKaryawanID($x);
            $id_kriteria = getKriteriaID($y);

            $pv_karyawan = getKaryawanPV($id_karyawan, $id_kriteria, $id_periode);
            $pv_kriteria = getKriteriaPV($id_kriteria, $id_periode);

            $nilai[$x] += ($pv_karyawan * $pv_kriteria);
        }
    }

    // update nilai ranking
    for ($i = 0; $i <= ($jmlKaryawan - 1); $i++) {
        $id_karyawan = getKaryawanID($i);

        $query = "SELECT * FROM ranking WHERE id_karyawan=$id_karyawan AND id_periode=$id_periode";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) == 0) {
            $query2 = "INSERT INTO ranking (id_karyawan, nilai, id_periode) VALUES ($id_karyawan, $nilai[$i], $id_periode)";
        } else {
            $query2 = "UPDATE ranking SET nilai=$nilai[$i] WHERE id_karyawan=$id_karyawan AND id_periode=$id_periode";
        }

        $result = mysqli_query($koneksi, $query2);
        if (!$result) {
            echo "Gagal mengupdate ranking";
            exit();
        }
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
                        <h4 class="card-title">Hasil Perhitungan Periode <?php echo $periode['nama_periode'] ?></h4>
                    </div>
                    <div class="card-body">
                        <a href="hasil_periode.php" class="btn btn-default">Kembali</a>
                        <?php
                        $query = "SELECT * FROM ranking WHERE id_periode=$id_periode";
                        $result = mysqli_query($koneksi, $query);
                        if (mysqli_num_rows($result) == 0) {
                        ?>

                            <div class="alert alert-danger">
                                Tidak ada data hasil perhitungan pada periode tersebut
                            </div>
                        <?php } else { ?>
                            <!--<table class="table">
                                <thead>
                                    <tr>
                                        <th>Overall Composite Height</th>
                                        <th>Priority Vector (rata-rata)</th>
                                        <?php
                                        echo "fira test";
                                        for ($i = 0; $i <= (getJumlahKaryawan() - 1); $i++) {
                                            echo "<th>" . getKaryawanNama($i) . "</th>\n";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    for ($x = 0; $x <= (getJumlahKriteria() - 1); $x++) {
                                        echo "<tr>";
                                        echo "<td>" . getKriteriaNama($x) . "</td>";
                                        echo "<td>" . round(getKriteriaPV(getKriteriaID($x), $id_periode), 5) . "</td>";

                                        for ($y = 0; $y <= (getJumlahKaryawan() - 1); $y++) {
                                            echo "<td>" . round(getKaryawanPV(getKaryawanID($y), getKriteriaID($x), $id_periode), 5) . "</td>";
                                        }

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <?php
                                        for ($i = 0; $i <= ($jmlKaryawan - 1); $i++) {
                                            echo "<th>" . round($nilai[$i], 5) . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </tfoot>

                            </table>-->

                            <h2>Perangkingan</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Peringkat</th>
                                        <th>Guru</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query  = "SELECT id,nama,id_karyawan,nilai FROM guru,ranking WHERE ranking.id_periode=$id_periode AND guru.id = ranking.id_karyawan ORDER BY nilai DESC";
                                    $result = mysqli_query($koneksi, $query);

                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <?php if ($i == 1) {
                                                echo "<td>1</td>";
                                            } else {
                                                echo "<td>" . $i . "</td>";
                                            }

                                            ?>

                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['nilai'] ?></td>
                                        </tr>

                                    <?php
                                    }


                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
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