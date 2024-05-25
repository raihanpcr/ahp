<?php
session_start();
if (isset($_SESSION['LOG_USER'])) {
    include('config.php');
    include('fungsi.php');
    include('header.php');
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="assets/images/sman_assets.png" alt=""><br>
                            <h2 class="card-title font-weight-bold mt-2">Profil SMAN 1 Bukit Batu</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-left">

                                <h2 class="font-weight-bold">V I S I</h2>
                                <p class="align-middle">“Terwujudnya warga SMAN 1 Bukit Batu yang bertaqwa kepada Tuhan Yang maha Esa,
                                    Unggul dalam Mutu, Mandiri dan Peduli Lingkungan, serta Berkebhinekaan Global”.</p>

                                <h2 class="font-weight-bold">M I S I</h2>
                                <p class="align-middle">Untuk mencapai Visi tersebut maka SMA Negeri 1 Bukit Batu menjabarkan beberapa misi sebagai berikut :</p>
                                <ol>
                                    <li>Mewujudkan Warga Sekolah yang beriman dan bertaqwa kepada tuhan YME serta Akhlak dan Budi pekerti terintegrasi.</li>
                                    <li>Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga siswa berkembang secara optimal sesuai dengan bakat dan talentanya masing-masing.</li>
                                    <li>Mendorong peserta didik untuk Mandiri,Jujur, Disiplin dan Penuh Tanggung Jawab.</li>
                                    <li>Mendorong warga sekolah untuk bersikap Peduli dan Memiliki Kearifan Terhadap Lingkungan Hidup.</li>
                                    <li>Membangun lingkungan sekolah yang bertoleransi dalam kebhinekaan global, mencintai budaya lokal dan menjunjung nilai gotong royong.</li>
                                </ol>

                                <h2 class="font-weight-bold">Tujuan</h2>
                                <p class="align-middle">Untuk mencapai Visi tersebut maka SMA Negeri 1 Bukit Batu menjabarkan beberapa misi sebagai berikut :</p>
                                <ol>
                                    <li>Dapat mengamalkan ajaran agama sebagai hasil proses belajar mengajar dan kegiatan pembiasaan</li>
                                    <li>Meraih prestasi akademik maupun prestasi nonakademik mimimal tingkat kabupaten</li>
                                    <li>Menguasai dasar-dasar IPTEK sebagai bekal untuk melanjutkan ke sekolah yang lebih tinggi;</li>
                                    <li>Menjadi sekolah yang disenangi dan diminati masyarakat.</li>
                                    <li>Terwujudnya Sekolah yang Peduli dan berbudaya lingkungan hidup</li>
                                    <li>Menciptakan sekolah yang bersih dan asri dalam mendukung pencapaian tujuan pembelajaran</li>
                                    <li>Dapat meningkatkan kreativitas seni dan budaya</li>
                                    <li>Dapat menciptakan budaya membaca dan menulis</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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