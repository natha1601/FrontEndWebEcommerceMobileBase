<?php 
  session_start();
  include 'koneksi.php';
?>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA- " content="IE=edge">
    <meta name="description" content="Archie mobile site for transaction Pulsa & PPOB">
    <meta name="author" content="SPL Frontend Team">
    <link rel="icon" href="favicon.ico">

    <title>Archie - Pulsa47</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- mini.css core CSS -->
    <link href="assets/css/mini-default.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/archie.min.css" rel="stylesheet">
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>
    <div id="app">
        <div class="app-container">
            <div class="page archie-base archie-base__both archie-page__complete">
            <?php  
                if (!isset($_SESSION['nohp'])) {
                    ?>
                    <div class="homepage__denied"> <?php
                    echo "Masuk untuk mengakses halaman ini"; ?>
                    <a href="login.php"><button class="ch-back__button">Masuk</button></a>
                    </div>
					<?php
                } else {
                    if (!isset($_POST["confirm"])) {
            ?>
                <!-- begin::Header -->
                <header>
                    <div class="ch-header__both clearfix">
                        <div class="row">
                            <div class="col-sm-2 p0">
                                
                            </div>
                            <div class="col-sm-8">
                                <p class="ch-header__title">Transaksi Sukses</p>
                            </div>
                            <div class="col-sm-2 p0">
                                <a class="ch-btn__done float-right" href="homepage.php">
                                    <span>Done</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- end::Header -->
                
                <?php
                    $sql = "SELECT b.nomor_bpjs, b.nama_bpjs, b.id_kelas, k.iuran, t.tanggal_transaksi
                    FROM bpjs AS b
                    INNER JOIN kelas_bpjs AS k ON b.id_kelas = k.id_kelas
                    INNER JOIN transaksi_bpjs AS t ON t.bpjs = b.id_bpjs
                    WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "'";

                    if($result = mysqli_query($database, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ( $row = mysqli_fetch_assoc($result)) {
                                $date = date('F Y', strtotime($row['tanggal_transaksi']));
                ?>
                <!-- begin::Container -->
                <div class="container">
                    <div class="ch-trx__complete">
                        <div class="ch-complete__head">
                            <h3>Terima Kasih</h3>
                            <p>Sudah bertransaksi di yapulsa</p>
                        </div>
                        <div class="ch-complete__body">
                            <div class="row ch-complete__info">
                                <div class="col-sm-6">
                                    <p>
                                        BPJS (<?php echo $row['nomor_bpjs']; ?>)
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right">
                                        Rp <?php echo number_format($row['iuran'], 0,",","."); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-complete__info">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Nama Pelanggan
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right">
                                        <?php echo $row['nama_bpjs']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-complete__info">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Periode
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right">
                                        <?php echo $date ; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-complete__info">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Biaya Admin
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right">
                                        Rp 1.500
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-complete__info bg-color-gray">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Harga Jual
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right">
                                        Rp <?php echo number_format($row['iuran']+3000, 0,",","."); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-complete__info">
                                <div class="col-sm-6">
                                    <p>
                                        Jumlah Pembayaran
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-complete__nominal float-right font-color--green">
                                        Rp <?php echo number_format($row['iuran']+1500, 0,",","."); ?>
                                    </p>
                                </div>
                            <?php }}}
                            $sql = "SELECT *
                            FROM user
                            WHERE no_hp='" . $_SESSION['nohp'] . "'";
        
                            if($result = mysqli_query($database, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while ( $row = mysqli_fetch_assoc($result)) {
                            ?>
                            </div>
                        </div>
                        <div class="row ch-complete__foot">
                            <div class="col-sm-12 p0">
                                <a href="member-deposit.php" class="row">
                                    <div class="col-sm-8">
                                        <p class="float-right">Sisa Deposit Anda</p>
                                        <p class="ch-foot__nominal float-right">Rp <?php echo number_format($row['deposit'], 0, ",", "."); ?></p>
                                    </div>
                                    <?php }}} ?>
                                    <div class="col-sm-4">
                                        <img src="assets/img/ico-act-plus@2x.png" width="35" alt="Contact CS" class="mt10 float-left">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="clearfix mt15 mr5 ml5">
                            <form action="homepage.php">
                                <button type="submit" class="ch-btn__complete" id="btn_back_home">Menu Utama</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end::Container -->
                    <?php }} ?>
            </div>
        </div>
    </div>
</body>
<!-- end::Head -->

<!-- begin::Page Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery.autocomplete.min.js"></script>
<script src="assets/js/archie.js"></script>
<!-- end::Page Scripts -->

</html>