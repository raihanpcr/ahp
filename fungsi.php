<?php
// mencari ID kriteria
function getKriteriaID($no_urut)
{
    include('config.php');
    $query  = "SELECT id FROM kriteria ORDER BY id";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $listID[] = $row['id'];
    }

    return $listID[($no_urut)];
}

// mencari ID guru
function getGuruID($no_urut)
{
    include('config.php');
    $query  = "SELECT id FROM guru ORDER BY id";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $listID[] = $row['id'];
    }

    return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut)
{
    include('config.php');
    $query  = "SELECT nama FROM kriteria ORDER BY id";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $nama[] = $row['nama'];
    }

    return $nama[($no_urut)];
}

// mencari nama karyawan
function getGuruNama($no_urut)
{
    include('config.php');
    $query  = "SELECT nama FROM guru ORDER BY id";
    $result = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $nama[] = $row['nama'];
    }

    return $nama[($no_urut)];
}

// mencari priority vector karyawan
function getGuruPV($id_guru, $id_kriteria, $id_periode)
{
    include('config.php');
    $query = "SELECT nilai FROM pv_karyawan WHERE id_periode=$id_periode AND id_karyawan=$id_guru AND id_kriteria=$id_kriteria";
    $result = mysqli_query($koneksi, $query);

    $pv = 0;

    while ($row = mysqli_fetch_array($result)) {
        $pv = $row['nilai'];
    }
    return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria, $id_periode)
{
    include('config.php');
    $query = "SELECT nilai FROM pv_kriteria WHERE id_periode=$id_periode AND id_kriteria=$id_kriteria";
    $result = mysqli_query($koneksi, $query);

    $pv = 0;

    while ($row = mysqli_fetch_array($result)) {
        $pv = $row['nilai'];
    }

    return $pv;
}

// mencari jumlah karyawan
function getJumlahGuru()
{
    include('config.php');
    $query  = "SELECT count(*) FROM guru";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) {
        $jmlData = $row[0];
    }

    return $jmlData;
}

// mencari jumlah kriteria
function getJumlahKriteria()
{
    include('config.php');
    $query  = "SELECT count(*) FROM kriteria";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) {
        $jmlData = $row[0];
    }

    return $jmlData;
}

// menambah data kriteria / karyawan
function tambahData($tabel, $nama)
{
    include('config.php');

    $query = "INSERT INTO $tabel (nama) VALUES ('$nama')";
    $tambah = mysqli_query($koneksi, $query);

    if (!$tambah) {
        echo "Gagal menambah data" . $tabel;
        exit();
    }
}

function tambahUser($nama_lengkap, $username1, $password1, $role)
{
    include('config.php');

    $query = "INSERT INTO user (nama_lengkap,username,password,role) VALUES ('$nama_lengkap','$username1','$password1','$role')";
    $tambah = mysqli_query($koneksi, $query);

    if (!$tambah) {
        echo "Gagal menambah data user";
        exit();
    }
}

function tambahPeriode($nama_periode)
{
    include('config.php');

    $query = "INSERT INTO periode (nama_periode) VALUES ('$nama_periode')";
    $tambah = mysqli_query($koneksi, $query);

    if (!$tambah) {
        echo "Gagal menambah data periode";
        exit();
    }
}

// hapus kriteria
function deleteKriteria($id)
{
    include('config.php');

    // hapus record dari tabel kriteria
    $query = "DELETE FROM kriteria WHERE id=$id";
    mysqli_query($koneksi, $query);

    // hapus record dari tabel pv_kriteria
    $query = "DELETE FROM pv_kriteria WHERE id_kriteria=$id";
    mysqli_query($koneksi, $query);

    // hapus record dari tabel pv_karyawan
    $query = "DELETE FROM pv_guru WHERE id_kriteria=$id";
    mysqli_query($koneksi, $query);

    $query = "DELETE FROM perbandingan_kriteria WHERE kriteria1=$id OR kriteria2=$id";
    mysqli_query($koneksi, $query);

    $query = "DELETE FROM perbandingan_guru WHERE pembanding=$id";
    mysqli_query($koneksi, $query);
}

// hapus karyawan
function deleteGuru($id)
{
    include('config.php');

    // hapus record dari tabel karyawan
    $query = "DELETE FROM guru WHERE id=$id";
    mysqli_query($koneksi, $query);

    // hapus record dari tabel pv_karyawan
    $query = "DELETE FROM pv_guru WHERE id_guru=$id";
    mysqli_query($koneksi, $query);

    // hapus record dari tabel ranking
    $query = "DELETE FROM ranking WHERE id=$id";
    mysqli_query($koneksi, $query);

    $query = "DELETE FROM perbandingan_guru WHERE guru1=$id OR guru2=$id";
    mysqli_query($koneksi, $query);
}

function deleteUser($id)
{
    include('config.php');

    // hapus record dari tabel karyawan
    $query = "DELETE FROM user WHERE id=$id";
    mysqli_query($koneksi, $query);
}

function deletePeriode($id)
{
    include('config.php');

    // hapus record dari tabel karyawan
    $query = "DELETE FROM periode WHERE id=$id";
    mysqli_query($koneksi, $query);
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV($id_kriteria, $pv, $id_periode)
{
    include('config.php');

    $query = "SELECT * FROM pv_kriteria WHERE id_kriteria=$id_kriteria AND id_periode=$id_periode";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error !!!";
        exit();
    }

    // jika result kosong maka masukkan data baru
    // jika telah ada maka diupdate
    if (mysqli_num_rows($result) == 0) {

        // echo "<pre>";
        // var_dump($id_kriteria, $pv, $id_periode);
        // echo "</pre>";
        $query = "INSERT INTO pv_kriteria (id_kriteria, nilai, id_periode) VALUES ($id_kriteria, $pv, $id_periode)";
    } else {
        $query = "UPDATE pv_kriteria SET nilai=$pv WHERE id_kriteria=$id_kriteria AND id_periode=$id_periode";
    }


    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Gagal memasukkan / update nilai priority vector kriteria";
        exit();
    }
}

// memasukkan nilai priority vektor karyawan
function inputGuruPV($id_karyawan, $id_kriteria, $pv, $id_periode)
{
    include('config.php');

    $query = "SELECT * FROM pv_guru WHERE id_periode = $id_periode AND id_guru = $id_karyawan AND id_kriteria = $id_kriteria";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error !!!";
        exit();
    }

    // jika result kosong maka masukkan data baru
    // jika telah ada maka diupdate
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO pv_guru (id_guru,id_kriteria,nilai,id_periode) VALUES ($id_karyawan,$id_kriteria,$pv,$id_periode)";
    } else {
        $query = "UPDATE pv_guru SET nilai=$pv WHERE id_periode=$id_periode AND id_guru=$id_karyawan AND id_kriteria=$id_kriteria";
    }

    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Gagal memasukkan / update nilai priority vector karyawan";
        exit();
    }
}


// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1, $kriteria2, $nilai, $nilai_kepentingan, $id_periode)
{
    include('config.php');

    $id_kriteria1 = getKriteriaID($kriteria1);
    $id_kriteria2 = getKriteriaID($kriteria2);

    $query = "SELECT * FROM perbandingan_kriteria WHERE id_periode = $id_periode AND kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error !!!";
        exit();
    }

    $penting = $nilai < 1 ? $id_kriteria2 : $id_kriteria1;

    // jika result kosong maka masukkan data baru
    // jika telah ada maka diupdate
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,penting,nilai_kepentingan,nilai,id_periode) VALUES ($id_kriteria1,$id_kriteria2,$penting,$nilai_kepentingan,$nilai,$id_periode)";
    } else {
        $query = "UPDATE perbandingan_kriteria SET penting=$penting,nilai_kepentingan=$nilai_kepentingan,nilai=$nilai WHERE kriteria1=$id_kriteria1 AND kriteria2=$id_kriteria2 AND id_periode=$id_periode";
    }

    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Gagal memasukkan data perbandingan";
        exit();
    }
}

// memasukkan bobot nilai perbandingan karyawan
function inputDataPerbandinganGuru($karyawan1, $karyawan2, $pembanding, $nilai, $nilai_kepentingan, $id_periode)
{
    include('config.php');

    $id_karyawan1 = getGuruID($karyawan1);
    $id_karyawan2 = getGuruID($karyawan2);
    $id_pembanding = getKriteriaID($pembanding);

    $query = "SELECT * FROM perbandingan_guru WHERE id_periode = $id_periode AND guru1 = $id_karyawan1 AND guru2 = $id_karyawan2 AND pembanding = $id_pembanding";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error !!!";
        exit();
    }

    $penting = $nilai < 1 ? $id_karyawan2 : $id_karyawan1;

    // jika result kosong maka masukkan data baru
    // jika telah ada maka diupdate
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO perbandingan_guru (guru1,guru2,pembanding,penting,nilai_kepentingan,nilai,id_periode) VALUES ($id_karyawan1,$id_karyawan2,$id_pembanding,$penting,$nilai_kepentingan,$nilai,$id_periode)";
    } else {
        $query = "UPDATE perbandingan_guru SET penting=$penting,nilai_kepentingan=$nilai_kepentingan,nilai=$nilai WHERE id_periode=$id_periode AND guru1=$id_karyawan1 AND guru2=$id_karyawan2 AND pembanding=$id_pembanding";
    }

    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Gagal memasukkan data perbandingan";
        exit();
    }
}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1, $kriteria2, $id_periode)
{
    include('config.php');

    $id_kriteria1 = getKriteriaID($kriteria1);
    $id_kriteria2 = getKriteriaID($kriteria2);

    $query = "SELECT * FROM perbandingan_kriteria WHERE id_periode = $id_periode AND kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Error";
        exit();
    }

    if (mysqli_num_rows($result) == 0) {
        $nilai = 1;
        $penting = '';
        $nilai_kepentingan = '';
    } else {
        $row = mysqli_fetch_array($result);
        $nilai = $row['nilai'];
        $penting = $row['penting'];
        $nilai_kepentingan = $row['nilai_kepentingan'];
    }

    $res = array(
        'nilai' => $nilai,
        'penting' => $penting,
        'nilai_kepentingan' => $nilai_kepentingan,
    );

    return $res;
}

// mencari nilai bobot perbandingan karyawan
function getNilaiPerbandinganGuru($guru1, $guru2, $pembanding, $id_periode)
{
    include('config.php');

    $id_guru1 = getGuruID($guru1);
    $id_guru2 = getGuruID($guru2);
    $id_pembanding = getKriteriaID($pembanding);

    $query = "SELECT * FROM perbandingan_guru WHERE id_periode = $id_periode AND guru1 = $id_guru1 AND guru2 = $id_guru2 AND pembanding = $id_pembanding";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Error";
        exit();
    }
    if (mysqli_num_rows($result) == 0) {
        $nilai = 1;
        $penting = '';
        $nilai_kepentingan = '';
    } else {
        $row = mysqli_fetch_array($result);
        $nilai = $row['nilai'];
        $penting = $row['penting'];
        $nilai_kepentingan = $row['nilai_kepentingan'];
    }

    $res = array(
        'nilai' => $nilai,
        'penting' => $penting,
        'nilai_kepentingan' => $nilai_kepentingan,
    );

    return $res;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria)
{
    include('config.php');
    $query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) {
        $nilaiIR = $row['nilai'];
    }

    return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a, $matrik_b, $n)
{
    $eigenvektor = 0;
    for ($i = 0; $i <= ($n - 1); $i++) {
        $eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
    }

    return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a, $matrik_b, $n)
{
    $eigenvektor = getEigenVector($matrik_a, $matrik_b, $n);
    $consindex = ($eigenvektor - $n) / ($n - 1);

    return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a, $matrik_b, $n)
{
    $consindex = getConsIndex($matrik_a, $matrik_b, $n);
    $consratio = $consindex / getNilaiIR($n);

    return $consratio;
}

// menampilkan tabel perbandingan bobot
function showTabelPerbandingan($jenis, $kriteria, $id_periode)
{
    include('config.php');

    if ($kriteria == 'kriteria') {
        $n = getJumlahKriteria();
    } else {
        $n = getJumlahGuru();
    }

    $query = "SELECT * FROM $kriteria ORDER BY id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Error koneksi database!!!";
        exit();
    }

    // buat list nama pilihan
    $pilihan = array();
    while ($row = mysqli_fetch_array($result)) {
        $pilihan[] = array(
            'nama' => $row['nama'],
            'id' => $row['id'],
        );
    }

    // tampilkan tabel
?>

    <form action="proses.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">pilih yang lebih penting</th>
                    <th>nilai perbandingan</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //inisialisasi
                $urut = 0;

                for ($x = 0; $x <= ($n - 2); $x++) {
                    for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                        $urut++;
                        if ($kriteria == 'kriteria') {
                            $res = getNilaiPerbandinganKriteria($x, $y, $id_periode);
                            $penting = $res['penting'];
                            $nilai_kepentingan = $res['nilai_kepentingan'];
                            $checked1 = $penting == $pilihan[$x]['id'] ? 'checked' : '';
                            $checked2 = $penting == $pilihan[$y]['id'] ? 'checked' : '';
                        } else {
                            $res = getNilaiPerbandinganGuru($x, $y, ($jenis - 1), $id_periode);
                            $penting = $res['penting'];
                            $nilai_kepentingan = $res['nilai_kepentingan'];
                            $checked1 = $penting == $pilihan[$x]['id'] ? 'checked' : '';
                            $checked2 = $penting == $pilihan[$y]['id'] ? 'checked' : '';
                        }
                ?>
                        <tr>
                            <td>
                                <div>
                                    <div class="form-group">
                                        <input name="pilih<?php echo $urut ?>" value="1" <?php echo $checked1; ?> class="hidden" type="radio" required>
                                        <label><?php echo $pilihan[$x]['nama']; ?></label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="form-group">
                                        <input name="pilih<?php echo $urut ?>" value="2" <?php echo $checked2; ?> class="hidden" type="radio" required>
                                        <label><?php echo $pilihan[$y]['nama']; ?></label>
                                    </div>
                                </div>
                            </td>
                            <td width="350">
                                <div>
                                    <select class="form-control" name="bobot<?php echo $urut ?>">
                                        <option value="1" <?php echo $nilai_kepentingan == 1 ? 'selected' : '' ?>>1 - Sama pentingnya</option>
                                        <option value="2" <?php echo $nilai_kepentingan == 2 ? 'selected' : '' ?>>2 - Sama hingga sedikit lebih penting</option>
                                        <option value="3" <?php echo $nilai_kepentingan == 3 ? 'selected' : '' ?>>3 - Sedikit lebih penting</option>
                                        <option value="4" <?php echo $nilai_kepentingan == 4 ? 'selected' : '' ?>>4 - Sedikit lebih hingga jelas lebih penting</option>
                                        <option value="5" <?php echo $nilai_kepentingan == 5 ? 'selected' : '' ?>>5 - Jelas lebih penting</option>
                                        <option value="6" <?php echo $nilai_kepentingan == 6 ? 'selected' : '' ?>>6 - Jelas hingga sangat jelas lebih penting</option>
                                        <option value="7" <?php echo $nilai_kepentingan == 7 ? 'selected' : '' ?>>7 - Sangat jelas lebih penting</option>
                                        <option value="8" <?php echo $nilai_kepentingan == 8 ? 'selected' : '' ?>>8 - Sangat jelas hingga mutlak lebih penting</option>
                                        <option value="9" <?php echo $nilai_kepentingan == 9 ? 'selected' : '' ?>>9 - Mutlak lebih penting</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
        <input type="text" name="id_periode" value="<?php echo $id_periode; ?>" hidden>
        <br><br><input class="btn btn-info" type="submit" name="submit" value="SIMPAN">
    </form>

<?php
}

?>