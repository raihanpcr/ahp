<?php
session_start();
if (isset($_SESSION['LOG_USER'])) {
    include('config.php');
    include('fungsi.php');
    include('header.php');

    if (isset($_POST['show'])) {
        $periode = $_POST['periode'];

        if ($periode != "periode") {
            # code...
            $diagramResult = RankingDiagramPeriode($periode);
        }

        // var_dump($periode);
    } else {
        // echo "Test";
    }
?>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">
                            <?php
                            $query = "SELECT DISTINCT periode.nama_periode as periode FROM periode,ranking WHERE ranking.id_periode=(SELECT max(id_periode) FROM ranking) AND periode.id = ranking.id_periode;";
                            // $query = "SELECT MAX(r.id_periode) AS id, p.nama_periode as periode FROM ranking r, periode p WHERE r.id_periode = p.id GROUP BY r.id_periode LIMIT 1;";
                            $result = $koneksi->query($query);

                            while ($row = $result->fetch_assoc()) { ?>
                                <h2 class="card-title font-weight-bold mt-2">Diagram Hasil Perangkingan <?= $row['periode'] ?></h2>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="text-left">
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <?php
                        //TODO : Hasil Perankingan

                        try {
                            //code...
                            if (!isset($periode)) { ?>
                                <h2 class="card-title font-weight-bold mt-2 text-center">Diagram Hasil Perankingan - </h2>
                                <?php } else {

                                $query = "SELECT nama_periode FROM periode WHERE id=$periode";
                                $result = $koneksi->query($query);
                                while ($row = $result->fetch_assoc()) { ?>

                                    <h2 class="card-title font-weight-bold mt-2 text-center">Diagram Hasil Perankingan <?= $row['nama_periode'] ?></h2>
                            <?php }
                            } ?>



                        <?php } catch (\Throwable $th) { ?>

                            <h2 class="card-title font-weight-bold mt-2 text-center">Diagram Hasil Perankingan - </h2>
                        <?php } ?>
                        <!-- Diagram Perankingan Periode Terbaru -->
                        <div class="card-header">
                            <div class="form-group row">

                                <!-- Form untuk mencari periode -->
                                <form method="POST" action="dashboard.php">
                                    <select name="periode" id="" class="form-control" onchange="displaySelectedValue()">
                                        <option value="periode">Pilih Periode</option>
                                        <?php

                                        $query = "SELECT * FROM periode WHERE id != (SELECT MAX(id) FROM periode)";
                                        $result = $koneksi->query($query);

                                        while ($row = $result->fetch_assoc()) { ?>
                                            <!-- // echo $row['id'] . "-" . $row['nama_periode']; -->
                                            <option value="<?= $row['id'] ?>"><?= $row['nama_periode'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" name="show" class="btn btn-success">Tampilkan</button>
                                </form>

                            </div>
                        </div>

                        <!-- Diagram Perankingan Per Periode -->
                        <div class="card-body">
                            <?php if (!isset($periode) || $periode == "periode") {  ?>
                                <div class="text-center">
                                    <h4 class="text-muted font-weight-bold">Silahkan Memilih Periode Terlebih Dahulu</h4>
                                </div>

                            <?php } else { ?>
                                <div class="text-left">
                                    <div id="chartPeriode" style="height: 300px; width: 100%;"></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        function periodeSelect() {

            var chart = new CanvasJS.Chart("chartPeriode", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Ranking"
                },
                axisY: {
                    title: "ranking"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Nama Guru",

                    dataPoints: <?php echo json_encode($diagramResult, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
        window.onload = periodeSelect();

        // window.onload = nullPeriodeSelect();
    </script>
    <!-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Profil SMAN 1 Bukit Batu</h4>
                        </div>
                        <div class="card-body text-center">
                            <p class="h4 text-bold">Selamat datang di Sistem Pendukung Keputusan Pemilihan Guru Terbaik SMAN 1 Bukit Batu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <?php include('footer_text.php'); ?>

    </div>
    </div>

    <?php include('js.php'); ?>
    <?php include('footer.php'); ?>
<?php
} else {
    include "login.php";
}
?>