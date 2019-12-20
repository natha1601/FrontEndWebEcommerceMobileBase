<?php 
  session_start();
  include 'koneksi.php';
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- <link href="assets/css/font-awesome.min.css" rel="stylesheet" /> -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>
    <div id="app">
        <div class="app-container">
            <div class="page archie-base archie-base__partly archie-page__riwayat-deposit">
            <?php  
                if (!isset($_SESSION['nohp'])) {
                    ?>
                    <div class="homepage__denied"> <?php
                    echo "Masuk untuk mengakses halaman ini"; ?>
                    <a href="login.php"><button class="ch-back__button">Masuk</button></a>
                    </div>
					<?php
                } else {
                    $sql = "SELECT no_hp, nama, email, foto, deposit FROM user WHERE no_hp = '" . $_SESSION['nohp'] . "'";
                                
                    if($result = mysqli_query($database, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ( $row = mysqli_fetch_assoc($result)) {
            ?>
                <!-- begin::Sidenav Menu -->
                <div id="ch-menu_SideNav" class="ch-ver__menu">
                    <div class="ch-aside__menu">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="assets/img/<?php echo $row['foto'] ?>.png" width="65" alt="photo profile">
                            </div>
                            <div class="col-sm-6">
                                <p class="ch-member__name"><?php echo $row['nama'] ?></p>
                                <p class="ch-member__email"><?php echo $row['email'] ?></p>
                                <p class="ch-member__phone mb10"><?php echo $row['no_hp'] ?></p>
                                <a class="ch-edit__button" href="edit-profile.html">Edit Profile</a>
                            </div>
                        <?php }}} 
                        if (!isset($_POST["print"])) {
                            ?>
                            <div class="col-sm-2">
                                <a href="javascript:void(0)" class="closebtn float-right" onclick="closeNav()" name="close-sidenav">
                                    <img src="assets/img/ico-nav-menu@2x.png" width="24" alt="sidebar menu">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="ch-member__point">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Poin Anda</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="ch-member__nominal float-right">1.256 Poin</p>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 16.445 16.531" width="16.446px" height="16.532px" class="ico--nav-menu">
                            <g id="Group_ICO_Bantuan" data-name="Group ICO Bantuan" transform="translate(-43.422 -468)">
                                <g id="Group_ICO_Bantuan_001" data-name="Group ICO Bantuan 001" transform="translate(43.422 468)">
                                    <path id="Path_ICO_Bantuan_001" data-name="Path ICO Bantuan 001" d="M14.166,3.112A8.225,8.225,0,0,0,1.993,14.148a3.088,3.088,0,0,1-1.3,1.5.767.767,0,0,0,.22,1.447,4.144,4.144,0,0,0,.582.043,5.331,5.331,0,0,0,2.955-.956A8.23,8.23,0,0,0,14.166,3.112Zm-.659,10.975A7.3,7.3,0,0,1,4.651,15.22a.463.463,0,0,0-.233-.065.489.489,0,0,0-.284.095,4.405,4.405,0,0,1-2.58.948,4.665,4.665,0,0,0,1.409-1.947.465.465,0,0,0-.078-.5,7.3,7.3,0,1,1,10.622.332Zm0,0"
                                        transform="translate(-0.124 -0.67)" />
                                </g>
                                <path id="Path_ICO_Bantuan_I_001" data-name="Path ICO I 001" d="M107.457,128.7h-6.892a.465.465,0,1,0,0,.93h6.892a.465.465,0,0,0,0-.93Zm0,0"
                                    transform="translate(-52.366 344.844)" />
                                <path id="Path_ICO_Bantuan_I_002" data-name="Path ICO I 002" d="M107.457,181h-6.892a.465.465,0,1,0,0,.93h6.892a.465.465,0,1,0,0-.93Zm0,0"
                                    transform="translate(-52.366 294.796)" />
                                <path id="Path_ICO_Bantuan_I_003" data-name="Path ICO I 003" d="M107.457,233.2h-6.892a.465.465,0,1,0,0,.93h6.892a.465.465,0,0,0,0-.93Zm0,0"
                                    transform="translate(-52.366 244.845)" />
                            </g>
                        </svg>
                        <span>Bantuan</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 15.93 14.951" width="16.446px" height="16.532px">
                            <g id="Group_ICO_Tukar_Poin" data-name="Group ICO Tukar Poin" transform="translate(0.101 0.1)">
                                <path id="Path_ICO_Tukar_Poin_001" data-name="Path ICO Tukar Poin 001" d="M165.409,0C162.787,0,160,.86,160,2.458V4.425a.492.492,0,0,0,.983,0V3.912a8.927,8.927,0,0,0,4.425,1,8.927,8.927,0,0,0,4.425-1v.513c0,.479-1.211,1.248-3.482,1.438a.493.493,0,0,0,.04.983.2.2,0,0,0,.043,0,7.889,7.889,0,0,0,3.4-.977v.525c0,.421-.891,1.023-2.544,1.315a.491.491,0,0,0,.083.974.41.41,0,0,0,.086-.009,6.556,6.556,0,0,0,2.372-.83v.516c0,.421-.891,1.023-2.544,1.315a.491.491,0,0,0,.083.974.41.41,0,0,0,.086-.009,6.556,6.556,0,0,0,2.372-.83v.516c0,.421-.891,1.023-2.544,1.315a.491.491,0,0,0,.083.974.41.41,0,0,0,.086-.009,6.556,6.556,0,0,0,2.372-.83v.516c0,.479-1.211,1.248-3.482,1.438a.493.493,0,0,0,.04.983.2.2,0,0,0,.043,0c2.182-.184,4.385-1,4.385-2.418V2.458C170.817.86,168.03,0,165.409,0Zm0,3.933c-2.7,0-4.425-.873-4.425-1.475S162.707.983,165.409.983s4.425.873,4.425,1.475S168.11,3.933,165.409,3.933Z"
                                    transform="translate(-155.083 0)" />
                                <path id="Path_ICO_Tukar_Poin_002" data-name="Path ICO Tukar Poin 002" d="M5.409,200.85c2.621,0,5.409-.86,5.409-2.458v-3.934c0-1.6-2.787-2.458-5.409-2.458S0,192.86,0,194.458v3.934C0,199.99,2.787,200.85,5.409,200.85Zm4.425-4.425c0,.6-1.724,1.475-4.425,1.475s-4.425-.873-4.425-1.475v-.513a8.927,8.927,0,0,0,4.425,1,8.927,8.927,0,0,0,4.425-1Zm-4.425,3.442c-2.7,0-4.425-.873-4.425-1.475v-.513a8.927,8.927,0,0,0,4.425,1,8.927,8.927,0,0,0,4.425-1v.513C9.834,198.994,8.11,199.867,5.409,199.867Zm0-6.884c2.7,0,4.425.873,4.425,1.475s-1.724,1.475-4.425,1.475-4.425-.873-4.425-1.475S2.707,192.983,5.409,192.983Z"
                                    transform="translate(0 -186.1)" />
                            </g>
                        </svg>
                        <span>Tukar Poin</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 15.779 15.779" width="16.446px" height="16.532px">
                            <g id="Group_ICO_Kupon_Saya" data-name="Group ICO Kupon Saya" transform="translate(0.05 0.051)">
                                <path id="Path_ICO_Kupon_Saya" data-name="Path ICO Kupon Saya" d="M12.23,3.036A1.82,1.82,0,0,0,12.714,1.8,1.786,1.786,0,0,0,10.947,0,5.6,5.6,0,0,0,7.835,2.088,5.67,5.67,0,0,0,4.739.032a1.786,1.786,0,0,0-1.768,1.8,1.8,1.8,0,0,0,.452,1.2H0v4.3H.936v8.343H14.75V7.339h.928v-4.3ZM10.943.668a1.126,1.126,0,0,1,1.1,1.168,1.161,1.161,0,0,1-.9,1.148H8.431c-.172-.052-.228-.112-.228-.148,0-.568,2-2.168,2.74-2.168Zm-6.207,0c.7,0,2.736,1.6,2.736,2.168,0,.052-.12.108-.2.148H4.539a1.162,1.162,0,0,1-.9-1.148A1.14,1.14,0,0,1,4.735.668Zm1.1,14.342H1.6V7.339H5.835Zm0-8.3H.668v-3H5.839l0,3Zm3.336,8.3H6.5V3.7H9.171Zm4.9,0H9.839V7.339h4.235Zm.932-8.3H9.839v-3H15.01l0,3Zm0,0"
                                    transform="translate(0 0)" />
                            </g>
                        </svg>
                        <span>Kupon Saya</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--stroke" viewBox="0 0 14.305 17.881" width="16.446px" height="16.532px">
                            <g id="Group_Ringkasan_Transaksi" data-name="Group Ringkasan Transaksi" transform="translate(-26 -253)">
                                <g id="Rectangle_Ringkasan_Transaksi" data-name="Rectangle Ringkasan Transaksi" class="ico--nav-menu fill--none" transform="translate(26 253)">
                                    <rect width="14.305" height="17.881" rx="2" />
                                    <rect x="0.45" y="0.45" width="13.405" height="16.981" rx="1.55" />
                                </g>
                                <line id="Line_Ringkasan_Transaksi_001" data-name="Line Ringkasan Transaksi 001" x2="8.046" transform="translate(29.129 257.023)"
                                />
                                <line id="Line_Ringkasan_Transaksi_002" data-name="Line Ringkasan Transaksi 002" x2="8.046" transform="translate(29.129 259.705)"
                                />
                                <line id="Line_Ringkasan_transaksi_003" data-name="Line Ringkasan Transaksi 003" x2="2.682" transform="translate(29.129 262.387)"
                                />
                            </g>
                        </svg>
                        <span>Ringkasan Transaksi</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 11.637 17.73" width="16.446px" height="16.532px">
                            <g id="Group_Pengaturan_PIN" data-name="Group Pengaturan PIN" transform="translate(-392.322 -467.187)">
                                <path id="Path_Pengaturan_PIN_001" data-name="Path Pengaturan PIN 001" d="M10.643,7.31h-.021V4.855a4.855,4.855,0,0,0-9.71,0V7.31H.9a.9.9,0,0,0-.9.9v3.657a5.768,5.768,0,1,0,11.535,0V8.205A.893.893,0,0,0,10.643,7.31ZM1.484,4.855a4.283,4.283,0,0,1,8.567,0V7.31H9.4V4.855a3.636,3.636,0,0,0-7.272,0V7.31H1.484ZM2.7,7.31V4.855a3.065,3.065,0,0,1,6.129,0V7.31Zm8.264,4.552a5.2,5.2,0,0,1-10.4,0V8.205A.323.323,0,0,1,.9,7.882h9.748a.323.323,0,0,1,.324.324Z"
                                    transform="translate(392.373 467.238)" />
                                <path id="Path_Pengaturan_PIN_002" data-name="Path Pengaturan PIN 002" d="M133.9,300.8a1.2,1.2,0,0,0-.286,2.362v.968a.286.286,0,1,0,.572,0v-.968a1.2,1.2,0,0,0-.286-2.362Zm0,1.828a.627.627,0,1,1,.627-.627A.627.627,0,0,1,133.9,302.628Z"
                                    transform="translate(264.242 176.795)" />
                            </g>
                        </svg>
                        <span>Pengaturan Pin</span>
                    </a>
                    <a href="riwayat-transaksi.php">
                        <svg viewBox="0 0 14.08 14.08" width="16.446px" height="16.532px">
                            <g id="Group_Riwayat_Transaksi" data-name="Group Riwayat Transaksi" transform="translate(-24.001 -294.001)">
                                <g id="Path_Riwayat_Transaksi" data-name="Path Riwayat Transaksi" class="ico--nav-menu fill--none" transform="translate(24 294)">
                                    <path class="ico--nav-menu stroke--none" d="M7.04,0A7.04,7.04,0,1,1,0,7.04,7.04,7.04,0,0,1,7.04,0Z" />
                                    <path class="ico--nav-menu nav-menu--fill" d="M 7.039794921875 0.8999948501586914 C 3.654294967651367 0.8999948501586914 0.8999948501586914 3.654294967651367 0.8999948501586914 7.039794921875 C 0.8999948501586914 10.42528533935547 3.654294967651367 13.17958450317383 7.039794921875 13.17958450317383 C 10.42528533935547 13.17958450317383 13.17958450317383 10.42528533935547 13.17958450317383 7.039794921875 C 13.17958450317383 3.654294967651367 10.42528533935547 0.8999948501586914 7.039794921875 0.8999948501586914 M 7.039794921875 -4.76837158203125e-06 C 10.92776489257812 -4.76837158203125e-06 14.07958507537842 3.151824951171875 14.07958507537842 7.039794921875 C 14.07958507537842 10.92776489257812 10.92776489257812 14.07958507537842 7.039794921875 14.07958507537842 C 3.151824951171875 14.07958507537842 -4.76837158203125e-06 10.92776489257812 -4.76837158203125e-06 7.039794921875 C -4.76837158203125e-06 3.151824951171875 3.151824951171875 -4.76837158203125e-06 7.039794921875 -4.76837158203125e-06 Z"
                                    />
                                </g>
                                <path id="Path_Riwayat_Transaksi_001" data-name="Path Riwayat Transaksi 001" class="ico--nav-menu nav-menu--stroke" d="M-3114,297.038v4.454h3.948"
                                    transform="translate(3145.04 0.372)" />
                            </g>
                        </svg>
                        <span>Riwayat Transaksi</span>
                    </a>
                    <a href="riwayat-deposit.php">
                        <svg class="ico--nav-menu nav-menu--stroke" viewBox="0 0 14.742 18" width="16.446px" height="16.532px">
                            <g id="Group_Riwayat_Deposit" data-name="Group Riwayat Deposit" transform="translate(3184 -266)">
                                <path id="Subtraction_Riwayat_Deposit" data-name="Subtraction Riwayat Deposit" d="M7.153,15.555H1.55A1.552,1.552,0,0,1,0,14V1.55A1.552,1.552,0,0,1,1.55,0h9.2A1.552,1.552,0,0,1,12.3,1.55v8.861a3.7,3.7,0,0,0-5.146,5.142Z"
                                    transform="translate(-3183.55 266.45)" />
                                <g id="Path_Riwayat_Deposit" data-name="Path Riwayat Deposit" class="cls-2" transform="translate(-3177.401 275.856)">
                                    <path d="M4.072,0A4.072,4.072,0,1,1,0,4.072,4.072,4.072,0,0,1,4.072,0Z" />
                                    <path class="ico--nav-menu nav-menu--fill" d="M 4.071925163269043 7.343855381011963 C 5.876075267791748 7.343855381011963 7.343855381011963 5.876075267791748 7.343855381011963 4.071925163269043 C 7.343855381011963 2.267775058746338 5.876075267791748 0.7999951839447021 4.071925163269043 0.7999951839447021 C 2.267775058746338 0.7999951839447021 0.7999951839447021 2.267775058746338 0.7999951839447021 4.071925163269043 C 0.7999951839447021 5.876075267791748 2.267775058746338 7.343855381011963 4.071925163269043 7.343855381011963 M 4.071925163269043 8.143855094909668 C 1.823065161705017 8.143855094909668 -4.836731022805907e-06 6.320785045623779 -4.836731022805907e-06 4.071925163269043 C -4.836731022805907e-06 1.823065161705017 1.823065161705017 -4.836731022805907e-06 4.071925163269043 -4.836731022805907e-06 C 6.320785045623779 -4.836731022805907e-06 8.143855094909668 1.823065161705017 8.143855094909668 4.071925163269043 C 8.143855094909668 6.320785045623779 6.320785045623779 8.143855094909668 4.071925163269043 8.143855094909668 Z"
                                    />
                                </g>
                                <path id="Path_Riwayat_Deposit_001" data-name="Path Riwayat Deposit 001" d="M-3114,297.038v2.576h2.283" transform="translate(-59.33 -19.209)"
                                />
                                <line id="Line_Riwayat_Deposit_001" data-name="Line Riwayat Deposit 001" x2="7.329" transform="translate(-3181.066 269.748)"
                                />
                                <line id="Line_Riwayat_Deposit_002" data-name="Line Riwayat Deposit 002" x2="7.329" transform="translate(-3181.066 272.191)"
                                />
                                <line id="Line_Riwayat_Deposit_003" data-name="Line Riwayat Deposit 003" x2="2.443" transform="translate(-3181.066 274.635)"
                                />
                            </g>
                        </svg>
                        <span>Riwayat Deposit</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 16.947 16.947" width="16.446px" height="16.532px">
                            <g id="Group_Kredit" data-name="Group Kredit" transform="translate(-11 -11)">
                                <g id="Group_Kredit_001" data-name="Group Kredit 001" transform="translate(11 11)">
                                    <path id="Path_Kredit_001" data-name="Path Kredit 001" d="M27.587,18.318h-.432V15.4a1.206,1.206,0,0,0-1.19-1.224H25.64V12.224A1.172,1.172,0,0,0,24.523,11H24.45L12.117,14.171l-.014,0A1.216,1.216,0,0,0,11,15.4V26.722a1.206,1.206,0,0,0,1.19,1.224H25.965a1.213,1.213,0,0,0,1.224-1.224v-3h.4a.339.339,0,0,0,.36-.36V18.681A.362.362,0,0,0,27.587,18.318Zm-3-6.633a.532.532,0,0,1,.36.54v1.947H15ZM26.47,26.722a.525.525,0,0,1-.5.54H12.19a.525.525,0,0,1-.5-.54V15.4a.525.525,0,0,1,.5-.54H25.927a.525.525,0,0,1,.5.54v2.919H22.863a2.7,2.7,0,1,0,0,5.409H26.47Zm.754-3.68H22.863a1.982,1.982,0,0,1,0-3.963h4.361Z"
                                        transform="translate(-11 -11)" />
                                    <path id="Path_Kredit_002" data-name="Path Kredit 002" d="M342.5,292.86a.359.359,0,0,0,.36.36h.325a.36.36,0,0,0,0-.719h-.322A.342.342,0,0,0,342.5,292.86Z"
                                        transform="translate(-331.035 -282.764)" />
                                </g>
                            </g>
                        </svg>
                        <span>Kredit</span>
                    </a>
                    <a href="#">
                        <svg class="ico--nav-menu nav-menu--stroke" viewBox="0 0 15.59 15.164" width="16.446px" height="16.532px">
                            <g id="Group_Pengaturan_Printer" data-name="Group Pengaturan Printer" transform="translate(3211.045 -488.016)">
                                <path id="Subtraction_Pengaturan_printer" data-name="Subtraction Pengaturan Printer" class="cls-1" d="M3.668,9.844H0V0H14.79V9.842H11.123V6.735H3.668V9.843Z"
                                    transform="translate(-3210.645 490.765)" />
                                <path id="Path_Pengaturan_Printer_001" data-name="Path Pengaturan Printer 001" d="M-3089.534,921.788v2.349h7.456v-2.349h-7.456Z"
                                    transform="translate(-117.444 -433.371)" />
                                <path id="Path_Pengaturan_Printer_002" data-name="Path Pengaturan Printer 002" d="M-3089.534,921.787v5.279h7.456v-5.279h-7.456Z"
                                    transform="translate(-117.444 -424.287)" />
                                <path id="Path_Pengaturan_Printer_003" data-name="Path Pengaturan Printer 003" d="M-3114.014,553.07h10.79" transform="translate(-94.716 -55.57)"
                                />
                                <path id="Path_Pengaturan_Printer_004" data-name="Path Pengaturan Printer 004" d="M-3114.014,553.07h1.57" transform="translate(-86.496 -59.189)"
                                />
                            </g>
                        </svg>
                        <span>Pengaturan Printer</span>
                    </a>
                    <a href="logout.php">
                        <svg class="ico--nav-menu nav-menu--stroke" viewBox="0 0 15.705 15.611" width="16.446px" height="16.532px">
                            <g id="Group_Keluap_App" data-name="Group Keluar App" transform="translate(-26.887 -538)">
                                <path id="Path_Keluar_App_001" data-name="Path Keluar App 001" d="M-3108.038,602.588v-4.2h-9.576V613h9.812v-4.262" transform="translate(3145 -59.889)"
                                />
                                <path id="Path_Keluar_App_002" data-name="Path Keluar App 002" d="M-3110.67,607.79h9.168" transform="translate(3143.452 -62.29)"
                                />
                                <path id="Path_Keluar_App_003" data-name="Path Keluar App 003" d="M-3101.451,603.435l2.056,3.548-2.056,3.094" transform="translate(3141.398 -60.935)"
                                />
                            </g>
                        </svg>
                        <span>Keluar Aplikasi</span>
                    </a>
                </div>
                <!-- end::Sidenav Menu -->

                <!-- begin::Header -->
                <header>
                    <div class="ch-header__both clearfix">
                        <div class="row">
                            <div class="col-sm-2 p0">
                                <img class="float-left" src="assets/img/ico-nav-menu@2x.png" width="24" alt="burger menu" style="cursor: pointer;" onclick="openNav()">
                            </div>
                            <div class="col-sm-8">
                                <p class="ch-header__title">Riwayat Transaksi</p>
                            </div>
                            <div class="col-sm-2 p0">
                                <a class="float-right" href="#">
                                    <svg class="ico--nav-header nav-header--chat" id="Group_Nav_Chat" data-name="Group Nav Chat" aria-label="Chat" alt="Chat" role="link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 21.717 21.83" width="21px" height="21px">
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
                <div class="container-fluid">
                <?php
                    $sql = " SELECT deposit
                    FROM user
                    WHERE no_hp = '" . $_SESSION['nohp'] . "'";

                    if($result = mysqli_query($database, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ( $row = mysqli_fetch_assoc($result)) {
                ?>
                    <!-- begin::Subheader -->
                    <div class="ch-deposit__subheader">
                        <div class="ch-deposit__stack">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="ch-word__deposit">Deposit Anda Saat ini</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="ch-nominal__deposit float-right">Rp <?php echo number_format($row['deposit'], 0, ",", "."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php }}} ?>
                    <!-- end::Subheader -->

                    <!-- begin::History Deposit -->
                    <?php
                        $sql = " SELECT r.tanggal_input, r.periode , b.nama_bpjs, k.iuran, r.id_rtransaksi
                        FROM riwayat_transaksi r
                        INNER JOIN bpjs b ON r.id_bpjs = b.id_bpjs
                        INNER JOIN kelas_bpjs k ON k.id_kelas = b.id_kelas
                        WHERE id_user = (SELECT id_user FROM user WHERE no_hp = '" . $_SESSION['nohp'] . "')
                        ORDER BY tanggal_input DESC";

                        $i = 0;

                        if($result = mysqli_query($database, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while ( $row = mysqli_fetch_assoc($result)) {
                                    $i = $i + 1;
                                    $date = date('F Y', strtotime($row['periode']));
                                    $_SESSION['idtransaksiprint' . $i] = $row['id_rtransaksi'];
                    ?>
                    <div class="ch-history__deposit">
                        <div class="ch-history__stack stack__riwayat">
                            <div class="ch-history__item">
                                <p class="ch-history__date"><?php echo $row['tanggal_input'] ?></p>
                                <p>Transaksi untuk order : <?php echo $row['nama_bpjs'] ?> | BPJS periode <?php echo $date ?></p>
                                <div class="row mt10">
                                    <div class="col-sm-6 p0">
                                        <p class="ch-credit__text m0">Pembayaran <em>Rp <?php echo number_format($row['iuran'], 0, ",", ".") ?></em></p>
                                    </div>
                                    <div class="col-sm-6 p0">
                                        <form class="ch-history__print-form" action="riwayat-transaksi.php" method="POST">
                                            <button target="_blank" value="<?php echo $i ?>" class="ch-history__print float-right m0" name="print" type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php }}}
                                } else {
                                    $btn = $_POST['print'];
                                    $_SESSION['idinvoice'] = $btn;

                                    $sql0 = "INSERT INTO invoice (tanggal_print, id_user, id_rtransaksi)
                                    SELECT NOW(), id_user, id_rtransaksi
                                    FROM riwayat_transaksi
                                    WHERE id_rtransaksi = '" . $_SESSION['idtransaksiprint' . $btn] . "'";
                                    $result = mysqli_query($database, $sql0);
                                    header("location: invoice.php");
                                } ?>
                    <!-- end::History Deposit -->
                </div>
                <!-- end::Container -->

                <!-- begin::Footer -->
                <footer class="ch-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="ch-horz__menu">
                                <a href="homepage.php">
                                    <div class="ch-menu-middle__item">
                                        <svg class="ico--menu-footer menu-footer--inactive" viewBox="0 0 28.359 26.652" width="28px" height="26px">
                                            <g id="Group_Home" data-name="Group Home" transform="translate(0.037)">
                                                <path id="Path_Home_001" data-name="Path Home 001" d="M29.541,33a.812.812,0,0,0-.832.832V45H22.927V40.406a.794.794,0,0,0-.792-.792h-4.2a.8.8,0,0,0-.832.792V44.96H11.324V34.188a.8.8,0,0,0-.832-.792.794.794,0,0,0-.792.792v11.6a.794.794,0,0,0,.792.792h7.445a.794.794,0,0,0,.792-.792V41.237H21.3v4.554a.8.8,0,0,0,.832.792h7.406a.794.794,0,0,0,.792-.792v-12A.794.794,0,0,0,29.541,33Zm0,0"
                                                    transform="translate(-5.882 -19.931)" />
                                                <path id="Path_Home_002" data-name="Path Home 002" d="M28.094,13.7,21.639,7.208v-4.4a.812.812,0,0,0-.832-.832.8.8,0,0,0-.792.832V5.623L14.709.238A.782.782,0,0,0,14.155,0a.806.806,0,0,0-.594.238L.215,13.623a.735.735,0,0,0,0,1.109.779.779,0,0,0,1.148,0L14.155,1.98,26.946,14.89a.82.82,0,0,0,.594.2.973.973,0,0,0,.594-.2.954.954,0,0,0-.04-1.188Zm0,0"
                                                />
                                            </g>
                                        </svg>
                                        <span>Home</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="ch-horz__menu">
                                <a href="riwayat-transaksi.php">
                                    <div class="ch-menu-middle__item">
                                        <svg class="ico--menu-footer menu-footer--active" viewBox="0 0 27.492 27.449" width="28px" height="26px">
                                            <g id="Group_Transaksi" data-name="Group Transaksi" transform="translate(0 -0.001)">
                                                <path id="Path_Transaksi_001" data-name="Path Transaksi 001" d="M26.406,8.387a13.508,13.508,0,0,0-7.344-7.3,13.688,13.688,0,0,0-10.675,0A13.734,13.734,0,0,0,0,13.725,13.734,13.734,0,0,0,8.387,26.366a13.688,13.688,0,0,0,10.675,0,13.638,13.638,0,0,0,7.344-7.3,13.5,13.5,0,0,0,1.084-5.337,12.35,12.35,0,0,0-1.084-5.337ZM24.239,19.825a12.25,12.25,0,0,1-4.414,4.414,11.844,11.844,0,0,1-6.06,1.645,11.7,11.7,0,0,1-4.7-.963A11.8,11.8,0,0,1,2.649,18.5a11.7,11.7,0,0,1-.963-4.7,11.808,11.808,0,0,1,1.605-6.06A12.25,12.25,0,0,1,7.705,3.331a11.981,11.981,0,0,1,12.119,0,12.25,12.25,0,0,1,4.414,4.414,11.7,11.7,0,0,1,1.605,6.06,11.874,11.874,0,0,1-1.605,6.02Zm0,0"
                                                />
                                                <path id="Path_Transaksi_002" data-name="Path Transaksi 002" d="M33.826,21.028V13.243a.857.857,0,0,0-.883-.843.848.848,0,0,0-.843.843v7.906a.4.4,0,0,1,.04.12.735.735,0,0,0,.241.682l4.495,4.495a.824.824,0,0,0,1.164,0,.789.789,0,0,0,0-1.164Zm0,0"
                                                    transform="translate(-19.218 -7.424)" />
                                            </g>
                                        </svg>
                                        <span class="active">Riwayat Transaksi</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="ch-horz__menu">
                                <a href="riwayat-deposit.php">
                                    <div class="ch-menu-middle__item">
                                        <svg class="ico--menu-footer menu-footer--inactive" viewBox="0 0 25.826 25.826" width="28px" height="26px">
                                            <g id="Group_Deposit" transform="translate(0.15 0.149)">
                                                <g id="Group_Deposit_001" transform="translate(0 0)">
                                                    <path id="Path_Deposit_001" d="M35.983,22.023h-.651v-4.4a1.817,1.817,0,0,0-1.792-1.844h-.49V12.844A1.765,1.765,0,0,0,31.368,11h-.109L12.683,15.777c-.005,0-.016.005-.021.005A1.832,1.832,0,0,0,11,17.626V34.681a1.817,1.817,0,0,0,1.792,1.844H33.54a1.828,1.828,0,0,0,1.844-1.844V30.17h.6a.511.511,0,0,0,.542-.542V22.57A.545.545,0,0,0,35.983,22.023Zm-4.511-9.991a.8.8,0,0,1,.542.813v2.933H17.027ZM34.3,34.681a.79.79,0,0,1-.761.813H12.792a.79.79,0,0,1-.761-.813V17.626a.79.79,0,0,1,.761-.813H33.483a.79.79,0,0,1,.761.813v4.4H28.868a4.074,4.074,0,1,0,0,8.147H34.3Zm1.136-5.543H28.868a2.985,2.985,0,0,1,0-5.97h6.569Z"
                                                        transform="translate(-11 -11)" />
                                                    <path id="Path_Deposit_002" d="M342.5,293.042a.541.541,0,0,0,.542.542h.49a.542.542,0,0,0,0-1.084h-.485A.516.516,0,0,0,342.5,293.042Z"
                                                        transform="translate(-325.232 -277.836)" />
                                                </g>
                                            </g>
                                        </svg>
                                        <span >Riwayat Deposit</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end::Footer -->
                <?php } ?>
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