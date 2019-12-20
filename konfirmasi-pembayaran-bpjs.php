<?php 
  session_start();
  include 'koneksi.php';
?>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<!-- begin::Head -->

<!-- begin::Body -->
<body>
    <div id="app">
        <div class="app-container">
            <div class="page archie-base archie-base__both archie-page__product-pulsa">
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
                                <a class="float-left" href="product-bpjs-kesehatan.php">
                                    <svg class="ico--nav-header nav-header--back" aria-label="Back to Pulsa" alt="Back to Pulsa" role="link" viewBox="0 0 9.197 16.701"
                                        width="9px" height="16px" style="margin-top: 2px;">
                                        <path id="Path_Nav_Back" data-name="Path Nav Back" d="M.265,8.9,7.771,16.4a.847.847,0,0,0,1.2,0,.837.837,0,0,0,0-1.187L2.059,8.3,8.975,1.393A.846.846,0,0,0,7.779.2L.265,7.711a.853.853,0,0,0,0,1.187Zm0,0"
                                            transform="translate(-0.025 0.051)" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p class="ch-header__title">BPJS Kesehatan</p>
                            </div>
                            <div class="col-sm-2 p0">
                                <a class="float-right" href="#">
                                    <svg class="ico--nav-header nav-header--chat" aria-label="Chat" alt="Chat" role="link" id="Group_Nav_Chat" data-name="Group Nav Chat"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 21.717 21.83"
                                        width="21px" height="21px">
                                        <g id="Group_Nav_Chat_001" data-name="Group Nav Chat 001">
                                            <g id="Group_Nav_Chat_002" data-name="Group Group Nav Chat 002">
                                                <path id="Path_Nav_Chat" data-name="Path Nav Chat" d="M18.664,3.885A10.861,10.861,0,0,0,2.591,18.458,4.078,4.078,0,0,1,.879,20.437a1.013,1.013,0,0,0,.29,1.911,5.472,5.472,0,0,0,.768.057,7.04,7.04,0,0,0,3.9-1.263A10.867,10.867,0,0,0,18.664,3.885Zm-.87,14.493A9.643,9.643,0,0,1,6.1,19.874a.612.612,0,0,0-.307-.085.646.646,0,0,0-.375.125A5.817,5.817,0,0,1,2.01,21.165a6.16,6.16,0,0,0,1.86-2.571.614.614,0,0,0-.1-.654,9.636,9.636,0,1,1,14.026.438Zm0,0"
                                                    transform="translate(-0.122 -0.66)" />
                                            </g>
                                        </g>
                                        <path id="Path_Nav_Chat_001" data-name="Path Nav Chat 001" d="M109.815,128.7h-9.1a.614.614,0,0,0,0,1.229h9.1a.614.614,0,1,0,0-1.229Zm0,0"
                                            transform="translate(-94.406 -121.38)" />
                                        <path id="Path_Nav_Chat_002" data-name="Path Nav Chat 002" d="M109.815,181h-9.1a.614.614,0,0,0,0,1.229h9.1a.614.614,0,1,0,0-1.229Zm0,0"
                                            transform="translate(-94.406 -170.705)" />
                                        <path id="Path_Nav_Chat_003" data-name="Path Nav Chat 002" d="M109.815,233.2h-9.1a.614.614,0,0,0,0,1.229h9.1a.614.614,0,1,0,0-1.229Zm0,0"
                                            transform="translate(-94.406 -219.936)" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- end::Header -->

                <!-- begin::Container -->
                <?php
                    $sql = "SELECT b.nomor_bpjs, b.nama_bpjs, b.id_kelas, k.iuran, t.tanggal_transaksi
                    FROM bpjs AS b
                    INNER JOIN kelas_bpjs AS k ON b.id_kelas = k.id_kelas
                    INNER JOIN transaksi_bpjs AS t ON t.bpjs = b.id_bpjs
                    WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "'";

                    if($result = mysqli_query($database, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ( $row = mysqli_fetch_assoc($result)) {
                                $date = date('F Y', strtotime('+1 month', strtotime($row['tanggal_transaksi'])));
                                $_SESSION['iuran'] = $row['iuran'];
                                $iuran_bpjs = $_SESSION['iuran'];
                ?>
                <div class="container p0">
                    <div class="ch-confirmation__body">
                        <div class="ch-content__info">
                            <div class="row ch-info__fill">
                                <div class="col-sm-6">
                                    <p>
                                        BPJS (<?php echo $row['nomor_bpjs'] ?>)
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right">
                                        Rp <?php echo number_format($row['iuran'], 0,",","."); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-info__fill">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Nama Pelanggan
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right">
                                        <?php echo $row['nama_bpjs']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-info__fill">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Periode
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right">
                                        <?php echo $date ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-info__fill ch-border__none">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Biaya Admin
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right">
                                        Rp 1.500
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-info__fill ch-border__none ch-bg__sell">
                                <div class="col-sm-6">
                                    <p class="weight-light">
                                        Harga Jual
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right">
                                        Rp <?php echo number_format($row['iuran']+3000, 0,",","."); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ch-info__fill">
                                <div class="col-sm-6">
                                    <p>
                                        Jumlah Pembayaran
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-info__nominal float-right ch-info__total">
                                        Rp <?php echo number_format($row['iuran']+1500, 0,",","."); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="ch-info__fill ch-border__none">
                                <div class="col-sm-12">
                                    <p class="weight-normal">
                                        Dengan melakukan transaksi ini Deposit anda akan berkurang
                                        <b>Rp <?php echo number_format($row['iuran']+1500, 0,",","."); ?></b>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }}}
                            $sql = "SELECT deposit FROM user WHERE no_hp = '" . $_SESSION['nohp'] . "'";
                
                            if($result = mysqli_query($database, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while ( $row = mysqli_fetch_assoc($result)) {
                            ?>
                        </div>
                        <div class="ch-content__deposit">
                            <div class="row">
                                <div class="col-sm-6 mt3">
                                    <p class="nominal-deposit">
                                        Deposit Anda
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="nominal-deposit weight-bold font-18 float-right">
                                        Rp <?php echo number_format($row['deposit'], 0, ",", '.'); ?>
                                    </p>
                                </div>
                                <?php }}} ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ch-confirmation__foot">
                        <div class="ch-content__pin">
                            <form class="ch-form__pin" action="konfirmasi-pembayaran-bpjs.php" method="POST">
                                <!-- <p>Masukkan PIN Anda</p> -->
                                <div class="ch-form__group input-bg input-pin">
                                    <label for="input_pin_valid">Masukkan PIN Anda</label>
                                    <input type="password" id="input_pin_valid" name="pin" placeholder="PIN" autofocus>
                                    <a href="#" class="clear-field mr10 mt20 hidden" id="clear"></a>
                                    <p class="warning mt10 hidden">PIN Writing is Wrong</p>
                                </div>
                                <div class="clearfix">
                                    <button name="confirm" type="submit" class="ch-btn__confirm mt15" id="btn_confirm" disabled>KONFIRMASI PESANAN</button>
                                </div>
                            </form>
                            <?php
                            } else {
                                
                                $pin = $_POST["pin"];

                                $query = "SELECT * FROM user WHERE no_hp='" . $_SESSION['nohp'] . "'";
                                $result = mysqli_query($database, $query);
                                $null = "";

                                if ($result) {
                                    $row = mysqli_fetch_row($result);
                                    if($row['7'] < $_SESSION['iuran']){
                                        header("location:member-deposit.html");
                                    } else if ($row[6] == $pin and $pin != $null) {
                                        $sql0 = "UPDATE transaksi_bpjs
                                        SET id_user = (SELECT id_user FROM user WHERE no_hp='" . $_SESSION['nohp'] . "')
                                        WHERE bpjs = (SELECT id_bpjs FROM bpjs WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "')";
                                        $result = mysqli_query($database, $sql0);
                                        $sql1 = "UPDATE transaksi_bpjs
                                        SET tanggal_transaksi = date_sub(tanggal_transaksi , interval -1 month)
                                        WHERE bpjs = (SELECT id_bpjs FROM bpjs WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "')";
                                        $result = mysqli_query($database, $sql1);
                                        $sql3 = "UPDATE transaksi_bpjs
                                        SET tanggal_input = NOW()
                                        WHERE bpjs = (SELECT id_bpjs FROM bpjs WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "')";
                                        $result = mysqli_query($database, $sql3);
                                        $sql2 = "UPDATE user
                                        SET deposit = deposit - (SELECT k.iuran
                                        FROM bpjs AS b
                                        INNER JOIN kelas_bpjs AS k ON b.id_kelas = k.id_kelas
                                        WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "') - '1500'
                                        WHERE no_hp='" . $_SESSION['nohp'] . "'";
                                        $result = mysqli_query($database, $sql2);
                                        $sql4 = "INSERT INTO riwayat_transaksi (id_bpjs, tanggal_input, periode, id_user)
                                        SELECT bpjs, tanggal_input, tanggal_transaksi, id_user
                                        FROM transaksi_bpjs
                                        WHERE bpjs = (SELECT id_bpjs FROM bpjs WHERE nomor_bpjs = '" . $_SESSION['nobpjs'] . "')";
                                        $result = mysqli_query($database, $sql4);
                                        header("location:thankyou-bpjs.php");
                                    } else { ?>
                                        <div class="homepage__denied"> <?php
                                            echo "PIN yang Anda masukan salah<br>"; ?>
							                <a href="konfirmasi-pembayaran-bpjs.php"><button class="ch-back__button">Ulangi</button></a>
                                        </div> <?php
                                    }
                                } else { ?>
                                    <div class="homepage__denied"> <?php
                                        echo "PIN yang Anda masukan salah<br>"; ?>
							            <a href="konfirmasi-pembayaran-bpjs.php"><button class="ch-back__button">Ulangi</button></a>
                                    </div> <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
                            <?php } ?>
<!-- end::Body -->

<!-- begin::Page Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery.autocomplete.min.js"></script>
<script src="assets/js/archie.js"></script>
<!-- end::Page Scripts -->

</html>