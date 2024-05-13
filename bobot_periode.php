<?php
session_start();
include('config.php');
include('fungsi.php');

if (isset($_GET['c'])) {
    $c = $_GET['c'];
}

include('header.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pilih Periode Perbandingan Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="collapsing">No</th>
                                        <th colspan="2">Periode</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM periode ORDER BY id";
                                    $result = mysqli_query($koneksi, $query);

                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['nama_periode'] ?></td>
                                            <td class="right aligned collapsing">
                                                <a href="bobot.php?c=<?php echo $c ?>&id=<?php echo $row['id'] ?>" class="btn btn-info">Pilih</a>
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