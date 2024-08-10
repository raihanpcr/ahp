<?php

include('config.php');
include('fungsi.php');

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $id_periode = $_POST['id_periode'];
    $user = $_POST['pengguna'];
    $query = "SELECT * FROM periode WHERE id=$id_periode";
    $result = mysqli_query($koneksi, $query);
    $periode = mysqli_fetch_array($result);

    // echo "<pre>";
    // echo "periode -> " . var_dump($periode);
    // die();
    // echo "</pre>";

    // jumlah kriteria
    if ($jenis == 'kriteria') {
        //ngambil jumlah kriteria
        $n = getJumlahKriteria();
    } else {
        //ngambil jumlah kriteria
        $n = getJumlahGuru();
    }



    // memetakan nilai ke dalam bentuk matrik x = baris,y = kolom
    $matrik = array();
    $urut     = 0;

    for ($x = 0; $x <= ($n - 2); $x++) {
        for ($y = ($x + 1); $y <= ($n - 1); $y++) {
            $urut++;
            $pilih = "pilih" . $urut;
            $bobot = "bobot" . $urut;
            if ($_POST[$pilih] == 1) {
                $matrik[$x][$y] = $_POST[$bobot];
                $matrik[$y][$x] = 1 / $_POST[$bobot];
            } else {
                $matrik[$x][$y] = 1 / $_POST[$bobot];
                $matrik[$y][$x] = $_POST[$bobot];
            }

            if ($jenis == 'kriteria') {
                inputDataPerbandinganKriteria($x, $y, $matrik[$x][$y], $_POST[$bobot], $id_periode);
            } else {
                // var_dump($user);
                // die();
                inputDataPerbandinganGuru($x, $y, ($jenis - 1), $matrik[$x][$y], $_POST[$bobot], $id_periode, $user);
            }
        }
    }

    // diagonal --> bernilai 1
    for ($i = 0; $i <= ($n - 1); $i++) {
        $matrik[$i][$i] = 1;
    }

    // inisialisasi jumlah tiap kolom dan baris kriteria
    $jmlmpb = array();
    $jmlmnk = array();
    for ($i = 0; $i <= ($n - 1); $i++) {
        $jmlmpb[$i] = 0;
        $jmlmnk[$i] = 0;
    }

    // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
    for ($x = 0; $x <= ($n - 1); $x++) {
        for ($y = 0; $y <= ($n - 1); $y++) {
            $value = $matrik[$x][$y];
            $jmlmpb[$y] += $value;
        }
    }

    // menghitung jumlah pada baris kriteria tabel nilai kriteria
    // matrikb merupakan matrik yang telah dinormalisasi
    for ($x = 0; $x <= ($n - 1); $x++) {
        for ($y = 0; $y <= ($n - 1); $y++) {
            $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];

            // echo "<pre>";
            // var_dump($matrikb[$x][$y]);
            // die();
            // echo "</pre>";

            $value = $matrikb[$x][$y];

            $jmlmnk[$x] += $value;
        }

        // nilai priority vektor
        $pv[$x] = $jmlmnk[$x] / $n;

        // memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_guru
        if ($jenis == 'kriteria') {
            $id_kriteria = getKriteriaID($x);
            inputKriteriaPV($id_kriteria, $pv[$x], $id_periode);
        } else {
            $id_kriteria = getKriteriaID($jenis - 1);
            $id_guru = getGuruID($x);
            inputGuruPV($id_guru, $id_kriteria, $pv[$x], $id_periode, $user);
        }
    }

    // cek konsistensi
    $eigenvektor = getEigenVector($jmlmpb, $jmlmnk, $n);
    $consIndex = getConsIndex($jmlmpb, $jmlmnk, $n);
    $consRatio = getConsRatio($jmlmpb, $jmlmnk, $n);

    // echo "<pre>";
    // var_dump($eigenvektor, $consIndex, $consRatio);
    // die();
    // echo "</pre>";

    if ($jenis == 'kriteria') {
        include('output.php');
    } else {
        include('bobot_hasil.php');
    }
}
