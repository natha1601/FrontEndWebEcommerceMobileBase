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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- <link href="assets/css/font-awesome.min.css" rel="stylesheet" /> -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>
    <div id="app">
        <div class="app-container">
            <div class="page archie-base archie-base__both archie-page__homepage">
            <?php  
                if (!isset($_SESSION['nohp'])) {
                    ?>
                    <div class="homepage__denied"> <?php
                    echo "Masuk untuk mengakses halaman ini"; ?>
                    <a href="login.php"><button class="ch-back__button">Masuk</button></a>
                    </div>
					<?php
                } else {
            ?>
                <!-- begin::Sidenav Menu -->
                <div id="ch-menu_SideNav" class="ch-ver__menu">
                    <div class="ch-aside__menu">
                        <div class="row">
                            <div class="col-sm-4">
                            <?php
                                $sql = "SELECT no_hp, nama, email, foto, deposit FROM user WHERE no_hp = '" . $_SESSION['nohp'] . "'";
                            
                                if($result = mysqli_query($database, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while ( $row = mysqli_fetch_assoc($result)) {
                            ?>
                                <img src="assets/img/<?php echo $row['foto']; ?>.png" width="65" alt="photo profile">
                            </div>
                            <div class="col-sm-6">
                                <p class="ch-member__name"><?php echo $row['nama']; ?></p>
                                <p class="ch-member__email"><?php echo $row['email']; ?></p>
                                <p class="ch-member__phone mb10"><?php echo $row['no_hp']; ?></p>
                                <a class="ch-edit__button"href="edit-profile.html">Edit Profile</a>
                            </div>
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
                    <a href="bantuan.html">
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
                    <a href="member-point.html">
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
                    <a href="member-point.html">
                        <svg class="ico--nav-menu nav-menu--fill" viewBox="0 0 15.779 15.779" width="16.446px" height="16.532px">
                            <g id="Group_ICO_Kupon_Saya" data-name="Group ICO Kupon Saya" transform="translate(0.05 0.051)">
                                <path id="Path_ICO_Kupon_Saya" data-name="Path ICO Kupon Saya" d="M12.23,3.036A1.82,1.82,0,0,0,12.714,1.8,1.786,1.786,0,0,0,10.947,0,5.6,5.6,0,0,0,7.835,2.088,5.67,5.67,0,0,0,4.739.032a1.786,1.786,0,0,0-1.768,1.8,1.8,1.8,0,0,0,.452,1.2H0v4.3H.936v8.343H14.75V7.339h.928v-4.3ZM10.943.668a1.126,1.126,0,0,1,1.1,1.168,1.161,1.161,0,0,1-.9,1.148H8.431c-.172-.052-.228-.112-.228-.148,0-.568,2-2.168,2.74-2.168Zm-6.207,0c.7,0,2.736,1.6,2.736,2.168,0,.052-.12.108-.2.148H4.539a1.162,1.162,0,0,1-.9-1.148A1.14,1.14,0,0,1,4.735.668Zm1.1,14.342H1.6V7.339H5.835Zm0-8.3H.668v-3H5.839l0,3Zm3.336,8.3H6.5V3.7H9.171Zm4.9,0H9.839V7.339h4.235Zm.932-8.3H9.839v-3H15.01l0,3Zm0,0"
                                    transform="translate(0 0)" />
                            </g>
                        </svg>
                        <span>Kupon Saya</span>
                    </a>
                    <a href="ringkasan-transaksi.html">
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
                    <a href="pengaturan-pin.html">
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
                    <a href="kredit.html">
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
                    <a href="pengaturan-printer.html">
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
                    <!-- begin::menu toggle, title logo, and Telp Customer Care -->
                    <div class="ch-header__main clearfix">
                        <div class="ch-main__left">
                            <a>
                                <img src="assets/img/ico-nav-menu@2x.png" width="24" alt="burger menu" style="cursor: pointer;" onclick="openNav()">
                                <span>Pulsa47</span>
                            </a>
                        </div>
                        <div class="ch-main__right">
                            <a>
                                <label for="modal-control">
                                    <svg viewBox="0 0 9.164 9.166" class="ico--customer-care" width="11px" height="11px">
                                        <g id="phone_receiver" transform="translate(0 -0.001)">
                                            <g id="group_phone_receiver" transform="translate(0 0)">
                                                <g id="group_phone_receiver_01" data-name="group_phone_receiver_01" transform="translate(0 0)">
                                                    <path id="path_phone_reciver" d="M9.161,7.421a.443.443,0,0,1-.136.388L7.734,9.091a.726.726,0,0,1-.228.165.942.942,0,0,1-.276.087l-.058,0q-.048,0-.126,0a4.47,4.47,0,0,1-.6-.063A4.529,4.529,0,0,1,5.44,8.979a8.468,8.468,0,0,1-1.354-.743A10.093,10.093,0,0,1,2.476,6.877,10.637,10.637,0,0,1,1.35,5.6,9.132,9.132,0,0,1,.632,4.465a6.094,6.094,0,0,1-.408-.942A5,5,0,0,1,.04,2.795,2.406,2.406,0,0,1,0,2.314q.01-.175.01-.194A.944.944,0,0,1,.1,1.843a.728.728,0,0,1,.165-.228L1.554.324a.427.427,0,0,1,.31-.136.362.362,0,0,1,.223.073.675.675,0,0,1,.165.18L3.291,2.411a.473.473,0,0,1,.049.34.605.605,0,0,1-.165.311L2.7,3.537a.162.162,0,0,0-.034.063.24.24,0,0,0-.015.073,1.754,1.754,0,0,0,.175.466,4.278,4.278,0,0,0,.359.568,6.3,6.3,0,0,0,.689.772,6.428,6.428,0,0,0,.776.694,4.482,4.482,0,0,0,.568.364,1.508,1.508,0,0,0,.349.141l.121.024a.231.231,0,0,0,.063-.015.162.162,0,0,0,.063-.034l.553-.563a.594.594,0,0,1,.408-.155.507.507,0,0,1,.262.058h.01L8.918,7.1A.488.488,0,0,1,9.161,7.421Z"
                                                        transform="translate(0 -0.188)" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span>Telp Customer Care</span>
                                </label>
                                <input type="checkbox" id="modal-control" class="modal">
                                <!-- begin::Modal Customer Care -->
                                <div>
                                    <div class="card customer-care">
                                        <label for="modal-control" class="modal-close bg-transparant p0"></label>
                                        <h3 class="section card-title">Telp Customer Care</h3>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <p class="section number-cs">Telkomsel</p>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="section number-cs">08131234565431</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p class="section number-cs">Indosat</p>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="section number-cs">085711234567</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <p class="section number-cs">XL</p>
                                            </div>
                                            <div class="col-sm-7">
                                                <p class="section number-cs">08181234565432</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end::Modal Customer Care -->
                            </a>
                        </div>
                    </div>
                    <!-- end::menu toggle, title logo, and Telp Customer Care -->

                    <!-- begin::Slider Banner -->
                    <div class="slider">
                        <div class="arrows">
                            <a class="previous" href="product-isi-pulsa.html">&#xf053;</a>
                            <a class="next" href="product-isi-pulsa.html">&#xf054;</a>
                        </div>
                        <div class="slides">
                            <div class="slide active">
                                <span class="title-slide">
                                    <p class="text">Nikmati kemudahan
                                        <b>isi</b>
                                        <br>
                                        <b>pulsa</b> dan
                                        <b>paket data</b> anda</p>
                                </span>
                                <img class="slide-1" src="assets/img/slide-img-01.png" alt="slide 1">
                            </div>
                            <div class="slide">
                                <span class="title-slide">
                                    <p class="text">Hanya perlu
                                        <b>30 detik</b> untuk
                                        <br>isi pulsa di Sepulsa</p>
                                </span>
                                <img class="slide-2" src="assets/img/slide-img-02.png" alt="slide 2">
                            </div>
                            <div class="slide">
                                <span class="title-slide">
                                    <p class="text">Tingkatkan transaksi raih
                                        <br> poin &
                                        <b>Reedem hadiahnya!</b>
                                    </p>
                                </span>
                                <img class="slide-3" src="assets/img/slide-img-03.png" alt="slide 3">
                            </div>
                        </div>
                        <div class="bullets"></div>
                    </div>
                    <!-- end::Slider Banner -->
                </header>
                <!-- end::Header -->

                <!-- begin::SubHeader -->
                <div class="ch-subheader">
                    <div class="row">
                        <div class="col-sm-6 p0">
                            <a href="member-deposit.php" class="row">
                                <div class="col-sm-3 pt5">
                                    <svg class="ico-poin--deposit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.25 26.25" width="25px" height="25px">
                                        <g id="wallet" transform="translate(0.301 0.301)">
                                            <g id="group" transform="translate(0 0)">
                                                <path id="path" d="M36.105,22.076h-.654V17.658a1.826,1.826,0,0,0-1.8-1.853h-.492V12.853A1.774,1.774,0,0,0,31.467,11h-.11L12.691,15.8c-.005,0-.016.005-.021.005A1.841,1.841,0,0,0,11,17.658V34.8a1.826,1.826,0,0,0,1.8,1.853H33.65A1.837,1.837,0,0,0,35.5,34.8V30.263h.6a.514.514,0,0,0,.544-.544V22.626A.548.548,0,0,0,36.105,22.076Zm-4.533-10.04a.805.805,0,0,1,.544.817V15.8H17.056ZM34.414,34.8a.794.794,0,0,1-.764.817H12.8a.794.794,0,0,1-.764-.817V17.658a.794.794,0,0,1,.764-.817H33.592a.794.794,0,0,1,.764.817v4.418h-5.4a4.093,4.093,0,1,0,0,8.187h5.46Zm1.141-5.57h-6.6a3,3,0,0,1,0-6h6.6Z"
                                                    transform="translate(-11 -11)" />
                                                <path id="path-2" data-name="path" d="M342.5,293.045a.543.543,0,0,0,.545.544h.492a.544.544,0,0,0,0-1.089h-.487A.518.518,0,0,0,342.5,293.045Z"
                                                    transform="translate(-325.148 -277.765)" />
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-sm-9">
                                    <p class="ch-subheader__title">Deposit Anda</p>
                                    <p class="ch-subheader__nominal">Rp <?php echo number_format($row['deposit'], 0,",","."); ?></p>
                                    <?php }}} ?>
                                </div>
                            </a>
                        </div>

                        <div class="ch-vertical__rectangle">
                        </div>

                        <div class="col-sm-5 p0 pl10">
                            <a href="member-point.html" class="row">
                                <div class="col-sm-3 pt5">
                                    <svg id="Group_4740" data-name="Group 4740" class="ico-poin--deposit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.965 25.283" width="26px" height="25px">
                                        <path id="Path_3487" data-name="Path 3487" d="M169.271,0C164.778,0,160,1.475,160,4.214V7.585a.843.843,0,1,0,1.686,0v-.88a15.3,15.3,0,0,0,7.585,1.722,15.3,15.3,0,0,0,7.585-1.722v.88c0,.822-2.075,2.139-5.968,2.465a.844.844,0,0,0,.068,1.686.348.348,0,0,0,.074-.005,13.523,13.523,0,0,0,5.831-1.675v.9c0,.722-1.528,1.754-4.361,2.254a.841.841,0,0,0,.142,1.67.7.7,0,0,0,.147-.016,11.237,11.237,0,0,0,4.066-1.422v.885c0,.722-1.528,1.754-4.361,2.254a.841.841,0,0,0,.142,1.67.7.7,0,0,0,.147-.016,11.237,11.237,0,0,0,4.066-1.422V17.7c0,.722-1.528,1.754-4.361,2.254a.841.841,0,0,0,.142,1.67.7.7,0,0,0,.147-.016,11.238,11.238,0,0,0,4.067-1.422v.885c0,.822-2.075,2.139-5.968,2.465a.844.844,0,0,0,.068,1.686.348.348,0,0,0,.074-.005c3.74-.316,7.517-1.712,7.517-4.146V4.214C178.542,1.475,173.764,0,169.271,0Zm0,6.742c-4.63,0-7.585-1.5-7.585-2.528s2.955-2.528,7.585-2.528,7.585,1.5,7.585,2.528S173.9,6.742,169.271,6.742Z"
                                            transform="translate(-151.572 0)" />
                                        <path id="Path_3488" data-name="Path 3488" d="M9.271,207.17c4.493,0,9.271-1.475,9.271-4.214v-6.742c0-2.739-4.778-4.214-9.271-4.214S0,193.475,0,196.214v6.742C0,205.7,4.778,207.17,9.271,207.17Zm7.585-7.585c0,1.032-2.955,2.528-7.585,2.528s-7.585-1.5-7.585-2.528v-.88a15.3,15.3,0,0,0,7.585,1.722,15.3,15.3,0,0,0,7.585-1.722Zm-7.585,5.9c-4.63,0-7.585-1.5-7.585-2.528v-.88A15.3,15.3,0,0,0,9.271,203.8a15.3,15.3,0,0,0,7.585-1.722v.88C16.856,203.989,13.9,205.485,9.271,205.485Zm0-11.8c4.63,0,7.585,1.5,7.585,2.528s-2.955,2.528-7.585,2.528-7.585-1.5-7.585-2.528S4.641,193.686,9.271,193.686Z"
                                            transform="translate(0 -181.886)" />
                                    </svg>
                                </div>
                                <div class="col-sm-9 pl10">
                                    <p class="ch-subheader__title">Poin Anda</p>
                                    <p class="ch-subheader__nominal">1.256</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end::SubHeader -->

                <!-- begin::Product list -->
                <div class="container">
                    <div class="ch-product__list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-isi-pulsa.html">
                                        <div class="product-middle">
                                            <svg class="product-fill product--isi-pulsa" id="Group_Isi_Pulsa" data-name="Group Isi Pulsa" viewBox="0 0 23.506 40.379" width="23px" height="40px">
                                                <path id="Path_Isi_Pulsa" data-name="Path Isi Pulsa" d="M20.766,0H2.74A2.837,2.837,0,0,0,0,2.74v34.9a2.837,2.837,0,0,0,2.74,2.74H20.766a2.837,2.837,0,0,0,2.74-2.74V2.74A2.837,2.837,0,0,0,20.766,0ZM8.8,2.019h5.768a.31.31,0,0,1,.288.288.31.31,0,0,1-.288.288H8.8a.31.31,0,0,1-.288-.288A.31.31,0,0,1,8.8,2.019Zm2.884,37.062a1.3,1.3,0,1,1,1.3-1.3c.144.577-.433,1.3-1.3,1.3Zm9.806-3.749H1.875V4.326H21.487V35.332Zm0,0"
                                                />
                                            </svg>
                                            <span>Isi Pulsa</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-paket-data.html">
                                        <div class="product-middle">
                                            <svg class="product-fill product--paket-data" viewBox="0 0 31.521 40.379" width="31px" height="40px">
                                                <g id="Group_Paket_Data" data-name="Group Paket Data" transform="translate(-168.23 -291)">
                                                    <path id="Subtraction_Paket_Data" data-name="Subtraction Paket Data" d="M20.729,40.379h-18A2.731,2.731,0,0,1,0,37.651V2.727A2.73,2.73,0,0,1,2.728,0h18a2.73,2.73,0,0,1,2.728,2.727V13.181h-1.9V4.324H1.9V35.332h19.66V30.9h1.9v6.754A2.731,2.731,0,0,1,20.729,40.379Zm-9-4.092a1.365,1.365,0,1,0,1.364,1.365A1.366,1.366,0,0,0,11.728,36.286ZM8.85,1.966a.331.331,0,1,0,0,.661h5.759a.331.331,0,0,0,0-.661Z"
                                                        transform="translate(168.23 291)" />
                                                    <g id="Group_Sinyal" data-name="Group Sinyal" transform="translate(182.496 306.973)">
                                                        <path id="Path_Sinyal_001" data-name="Path Sinyal 001" d="M17.16,3.5A12.1,12.1,0,0,0,8.663,0a11.957,11.957,0,0,0-8.5,3.5A1.184,1.184,0,0,0,0,4a1.184,1.184,0,0,0,.167.5l.916.916a.654.654,0,0,0,.916,0,9.252,9.252,0,0,1,13.162,0,.654.654,0,0,0,.916,0l.916-.916c.167-.167.167-.25.167-.5a.376.376,0,0,0,0-.5Zm0,0"
                                                        />
                                                        <path id="Path_Sinyal_002" data-name="Path Sinyal 002" d="M9.427,6.4A6.61,6.61,0,0,0,4.762,8.316a.654.654,0,0,0,0,.916l.916,1a.654.654,0,0,0,.916,0A3.967,3.967,0,0,1,9.427,9.066a4.347,4.347,0,0,1,2.832,1.166.654.654,0,0,0,.916,0l.916-1a.654.654,0,0,0,0-.916A6.61,6.61,0,0,0,9.427,6.4Zm0,0"
                                                            transform="translate(-0.764 -1.069)" />
                                                        <path id="Path_Sinyal_003" data-name="Path Sinyal 003" d="M11.466,14.133A1.333,1.333,0,1,1,10.133,12.8a1.316,1.316,0,0,1,1.333,1.333Zm0,0"
                                                            transform="translate(-1.469 -2.137)" />
                                                    </g>
                                                </g>
                                            </svg>
                                            <span>Paket Data</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-listrik-pln.html">
                                        <div class="product-middle">
                                            <svg class="product-fill product--listrik-pln" viewBox="0 0 22.117 38.746" width="21px" height="38px">
                                                <g id="Group_Listrik_PLN" data-name="Group Listrik PLN" transform="translate(0.424 0.35)">
                                                    <path id="Path_Listrik_PLN" data-name="Path Listrik PLN" d="M.875,38.047a.985.985,0,0,1-.374-.1c-.2-.136-.51-.442-.238-1.121l4.212-10.6h-3.3a1.111,1.111,0,0,1-.985-.51,1.119,1.119,0,0,1-.034-1.087l4.45-9.818H1.079a1.111,1.111,0,0,1-.985-.51A1.119,1.119,0,0,1,.06,13.215L6.107.985A1.951,1.951,0,0,1,7.7,0H20.273a1.047,1.047,0,0,1,.951.51,1.055,1.055,0,0,1-.1,1.087L13.886,12.909h2.921a1.01,1.01,0,0,1,.951.544.994.994,0,0,1-.136,1.087l-5.979,8.493H12.8a.941.941,0,0,1,.951.544.976.976,0,0,1-.238,1.087L1.623,37.674A.976.976,0,0,1,.875,38.047Zm.679-13.181H4.816a1.208,1.208,0,0,1,.985.476,1.121,1.121,0,0,1,.1,1.087L2.676,34.514,11.95,24.391h-.917a1.01,1.01,0,0,1-.951-.544.994.994,0,0,1,.136-1.087L16.2,14.268H13.343a1.146,1.146,0,0,1-.985-.51,1.055,1.055,0,0,1,.1-1.087L19.7,1.359H7.7A.646.646,0,0,0,7.33,1.6h0L1.487,13.52h3.5a1.111,1.111,0,0,1,.985.51A1.123,1.123,0,0,1,6,15.117Z"
                                                        transform="translate(0)" />
                                                </g>
                                            </svg>
                                            <span>Listrik PLN</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-bpjs-kesehatan.php">
                                        <div class="product-middle">
                                            <svg class="product-fill product--bpjs-kesehatan" viewBox="0 0 33.818 34.131" width="31px" height="31px">
                                                <g id="Group_BPJS_Kesehatan" data-name="Group BPJS Kesehatan" transform="translate(-159.418 -404.146)">
                                                    <path id="Path_BPJS_Kesehatan_001" d="M89.713,41.2l2.742-2.468H89.4V35.329h1.449L88.185,32.9,85.6,35.29h1.332v4.074c0,1.254.235,1.841,1.332,1.841Z"
                                                        transform="translate(82.482 384.14)" />
                                                    <path id="Path_BPJS_Kesehatan_002" d="M113.042,32.939,110.3,35.407h3.055v3.408h-1.449l2.664,2.429,2.585-2.39h-1.332V34.741c0-1.254-.235-1.841-1.332-1.841l-1.449.039Z"
                                                        transform="translate(67.457 384.14)" />
                                                    <path id="Path_BPJS_Kesehatan_003" d="M104.365,49.842,101.9,47.1v3.055H98.49V48.706L96.1,51.37l2.39,2.585V52.623h4.074c1.254,0,1.841-.235,1.841-1.332l-.039-1.449Z"
                                                        transform="translate(76.095 375.502)" />
                                                    <path id="Path_BPJS_Kesehatan_004" d="M96.1,26.513l2.468,2.742V26.2h3.408v1.449l2.429-2.664L102.015,22.4v1.332H97.941c-1.254,0-1.841.235-1.841,1.332v1.449Z"
                                                        transform="translate(76.095 390.527)" />
                                                    <path id="Path_BPJS_Kesehatan_005" d="M66.749,24.2c-.353.548-.627.548-.9,2.9a8.957,8.957,0,0,0,1.214,4.857,3.087,3.087,0,0,1,.548-2.076c.705-.94,2.154-2.35,2.82-3.251a5.86,5.86,0,0,0,.862-2.154h0a4.9,4.9,0,0,1-4.544-.274Z"
                                                        transform="translate(94.517 389.432)" />
                                                    <path id="Path_BPJS_Kesehatan_006" d="M72.673,8.186A3.486,3.486,0,1,1,69.186,4.7a3.494,3.494,0,0,1,3.486,3.486Z" transform="translate(94.586 401.293)"
                                                    />
                                                    <path id="Path_BPJS_Kesehatan_007" d="M84.7,2.42A14.4,14.4,0,0,1,90.027.108a25.758,25.758,0,0,1,6.542.274,7.986,7.986,0,0,0-3.016.823,25.658,25.658,0,0,0-3.447,2.938,16.947,16.947,0,0,1-3.29,2.507,4.2,4.2,0,0,1-1.449.392A4.683,4.683,0,0,0,85.64,5.4,4.743,4.743,0,0,0,84.7,2.42Z"
                                                        transform="translate(83.029 404.161)" />
                                                    <path id="Path_BPJS_Kesehatan_008" d="M87.8,75.344c.548.353.548.627,2.9.9a8.9,8.9,0,0,0,4.818-1.214,3.087,3.087,0,0,1-2.076-.548c-.94-.705-2.35-2.154-3.251-2.82a5.86,5.86,0,0,0-2.154-.862h0a4.991,4.991,0,0,1,.431,2.037,4.538,4.538,0,0,1-.666,2.507Z"
                                                        transform="translate(81.143 361.086)" />
                                                    <path id="Path_BPJS_Kesehatan_009" d="M71.786,67.2A3.486,3.486,0,1,1,68.3,70.686,3.494,3.494,0,0,1,71.786,67.2Z" transform="translate(93.005 363.276)"
                                                    />
                                                    <path id="Path_BPJS_Kesehatan_010" d="M65.92,47.469a14.4,14.4,0,0,1-2.311-5.327,25.919,25.919,0,0,1,.274-6.542,7.986,7.986,0,0,0,.823,3.016,25.657,25.657,0,0,0,2.938,3.447,16.947,16.947,0,0,1,2.507,3.29,4.2,4.2,0,0,1,.392,1.449,4.683,4.683,0,0,0-1.645-.274,5.081,5.081,0,0,0-2.977.94Z"
                                                        transform="translate(95.934 382.498)" />
                                                    <path id="Path_BPJS_Kesehatan_011" d="M138.144,50.817c.353-.548.627-.548.9-2.9a8.9,8.9,0,0,0-1.214-4.818,3.087,3.087,0,0,1-.548,2.076c-.705.94-2.154,2.35-2.82,3.251a5.86,5.86,0,0,0-.862,2.154h0a4.991,4.991,0,0,1,2.037-.431,4.628,4.628,0,0,1,2.507.666Z"
                                                        transform="translate(53.284 377.936)" />
                                                    <path id="Path_BPJS_Kesehatan_012" d="M129.9,67.986a3.486,3.486,0,1,1,3.486,3.486,3.494,3.494,0,0,1-3.486-3.486Z" transform="translate(55.535 364.918)"
                                                    />
                                                    <path id="Path_BPJS_Kesehatan_013" d="M110.269,73.722a14.4,14.4,0,0,1-5.327,2.311,25.919,25.919,0,0,1-6.542-.274,7.986,7.986,0,0,0,3.016-.823A25.66,25.66,0,0,0,104.863,72a16.948,16.948,0,0,1,3.29-2.507A4.2,4.2,0,0,1,109.6,69.1a4.682,4.682,0,0,0-.274,1.645,4.589,4.589,0,0,0,.94,2.977Z"
                                                        transform="translate(74.696 362.12)" />
                                                    <path id="Path_BPJS_Kesehatan_014" d="M113.617,3.149c-.548-.353-.548-.627-2.9-.9A8.9,8.9,0,0,0,105.9,3.462a3.087,3.087,0,0,1,2.076.548c.94.705,2.35,2.154,3.251,2.82a5.86,5.86,0,0,0,2.154.862h0a4.991,4.991,0,0,1-.431-2.037,4.628,4.628,0,0,1,.666-2.507Z"
                                                        transform="translate(70.134 402.806)" />
                                                    <path id="Path_BPJS_Kesehatan_015" d="M130.786,9.073a3.486,3.486,0,1,1,3.486-3.486,3.494,3.494,0,0,1-3.486,3.486Z" transform="translate(57.117 402.875)"
                                                    />
                                                    <path id="Path_BPJS_Kesehatan_016" d="M136.422,21.1a14.4,14.4,0,0,1,2.311,5.327,25.919,25.919,0,0,1-.274,6.542,7.986,7.986,0,0,0-.823-3.016,25.658,25.658,0,0,0-2.938-3.447,16.948,16.948,0,0,1-2.507-3.29,4.2,4.2,0,0,1-.392-1.449,4.682,4.682,0,0,0,1.645.274,4.743,4.743,0,0,0,2.977-.94Z"
                                                        transform="translate(54.379 391.318)" />
                                                </g>
                                            </svg>
                                            <span>BPJS Kesehatan</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-tagihan-telkom.html">
                                        <div class="product-middle">
                                            <svg class="product-fill product--tagihan-telkom" viewBox="0 0 35.402 35.012" width="35px" height="34px">
                                                <g id="Group_Tagihan_Telkom" data-name="Group Tagihan Telkom" transform="translate(0.199 0.199)">
                                                    <path id="Path_Tagihan_Telkom_001" d="M177.794,61.782h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.242,1.242,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-150.572 -50.1)" />
                                                    <path id="Path_Tagihan_Telkom_002" d="M133.679,61.782h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.243,1.243,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-112.972 -50.1)" />
                                                    <path id="Path_Tagihan_Telkom_003" d="M89.577,61.782h2.167a1.243,1.243,0,0,0,0-2.482H89.577A1.215,1.215,0,0,0,88.4,60.541a1.2,1.2,0,0,0,1.179,1.241Zm0,0"
                                                        transform="translate(-75.37 -50.1)" />
                                                    <path id="Path_Tagihan_Telkom_004" d="M177.794,91.282h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.242,1.242,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-150.572 -75.024)" />
                                                    <path id="Path_Tagihan_Telkom_005" d="M133.679,91.282h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.243,1.243,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-112.972 -75.024)" />
                                                    <path id="Path_Tagihan_Telkom_006" d="M89.577,91.282h2.167a1.243,1.243,0,0,0,0-2.482H89.577A1.215,1.215,0,0,0,88.4,90.041a1.2,1.2,0,0,0,1.179,1.241Zm0,0"
                                                        transform="translate(-75.37 -75.024)" />
                                                    <path id="Path_Tagihan_Telkom_007" d="M177.794,120.882h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.242,1.242,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-150.572 -100.031)" />
                                                    <path id="Path_Tagihan_Telkom_008" d="M133.679,120.882h2.167a1.243,1.243,0,0,0,0-2.482h-2.167a1.243,1.243,0,0,0,0,2.482Zm0,0"
                                                        transform="translate(-112.972 -100.031)" />
                                                    <path id="Path_Tagihan_Telkom_009" d="M89.577,120.882h2.167a1.243,1.243,0,0,0,0-2.482H89.577a1.215,1.215,0,0,0-1.179,1.241,1.2,1.2,0,0,0,1.179,1.241Zm0,0"
                                                        transform="translate(-75.37 -100.031)" />
                                                    <path id="Path_Tagihan_Telkom_010" d="M34.365,2.3H11.054V1.241A1.215,1.215,0,0,0,9.875,0h-8.7A1.215,1.215,0,0,0,0,1.241V28.779a1.229,1.229,0,0,0,1.179,1.257H4.333v1.086a3.412,3.412,0,0,0,3.316,3.491h8.74a3.412,3.412,0,0,0,3.316-3.491V27.739h14.1A1.227,1.227,0,0,0,35,26.5V3.537A1.193,1.193,0,0,0,33.839,2.3ZM1.885,1.859H9V28.124H1.885ZM17.026,32.789H7.76a.966.966,0,0,1-.943-.993l-.1-1.776H9.875a1.215,1.215,0,0,0,1.179-1.241V27.739h6.834l.1,4.057S17.542,32.789,17.026,32.789Zm16.348-6.835H11.054V4.351H33.374Zm0,0"
                                                        transform="translate(0 0)" />
                                                </g>
                                            </svg>
                                            <span>Tagihan Telkom</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-bayar-cicilan.html">
                                        <div class="product-middle">
                                            <!--<img src="assets/img/pln.png" width="23" alt="product cicilan">-->
                                            <svg class="product-fill product--bayar-cicilan" viewBox="0 0 33.5 40.5" width="30px" height="35px">
                                                <g id="Group_Bayar_Cicilan" data-name="Group Bayar Cicilan" transform="translate(-283.5 -395.5)">
                                                    <g id="Group_Bayar_Cicilan_001" data-name="Group Bayar Cicilan 001" transform="translate(284 396)">
                                                        <path id="Path_Bayar_Cicilan_001" data-name="Path Bayar Cicilan 001" d="M22.661,6.532,16.313.184A.63.63,0,0,0,15.867,0H2.54A2.539,2.539,0,0,0,0,2.54V27.926a2.538,2.538,0,0,0,2.54,2.534H20.311a2.543,2.543,0,0,0,2.54-2.54V6.979A.663.663,0,0,0,22.661,6.532ZM16.5,2.166l4.176,4.176H17.765A1.268,1.268,0,0,1,16.5,5.075V2.166Zm3.808,27.028H2.54a1.268,1.268,0,0,1-1.267-1.267V2.54A1.268,1.268,0,0,1,2.54,1.273H15.23V5.081a2.543,2.543,0,0,0,2.54,2.54h3.808V27.926A1.273,1.273,0,0,1,20.305,29.194Z"
                                                            transform="translate(0 0)" />
                                                        <path id="Path_Bayar_Cicilan_002" data-name="Path Bayar Cicilan 002" d="M78.594,298.7H64.637a.634.634,0,1,0,0,1.267H78.6a.634.634,0,1,0-.006-1.267Z"
                                                            transform="translate(-60.192 -280.929)" />
                                                        <path id="Path_Bayar_Cicilan_003" data-name="Path Bayar Cicilan 003" d="M78.594,234.7H64.637a.637.637,0,1,0,0,1.273H78.6a.637.637,0,1,0-.006-1.273Z"
                                                            transform="translate(-60.192 -220.737)" />
                                                        <path id="Path_Bayar_Cicilan_004" data-name="Path Bayar Cicilan 004" d="M78.594,362.7H64.637a.634.634,0,1,0,0,1.267H78.6a.634.634,0,1,0-.006-1.267Z"
                                                            transform="translate(-60.192 -341.122)" />
                                                        <path id="Path_Bayar_Cicilan_005" data-name="Path Bayar Cicilan 005" d="M72.252,426.7H64.637a.634.634,0,1,0,0,1.267h7.615a.634.634,0,1,0,0-1.267Z"
                                                            transform="translate(-60.192 -401.314)" />
                                                        <path id="Path_Bayar_Cicilan_006" data-name="Path Bayar Cicilan 006" d="M178.852,170.7h-7.615a.637.637,0,0,0,0,1.273h7.615a.637.637,0,1,0,0-1.273Z"
                                                            transform="translate(-160.45 -160.544)" />
                                                    </g>
                                                    <text id="Font_Rupiah" transform="translate(293 407)">
                                                        <tspan x="-6.665" y="0" class="product--fill-size">Rp</tspan>
                                                    </text>
                                                    <g transform="matrix(1, 0, 0, 1, 283.5, 395.5)">
                                                        <circle id="Ellipse_Bayar_Cicilan" data-name="Ellipse Bayar Cicilan" cx="7" cy="7" r="7" transform="translate(16.5 21.5)"
                                                        />
                                                    </g>
                                                    <text id="Font_Plus" data-name="Font Plus" class="product--fill-font" transform="translate(311 428)">
                                                        <tspan x="-7.592" y="" class="product--fill-font-plus">+</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                            <span>Bayar Cicilan</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a href="product-tagihan-pdam.html">
                                        <div class="product-middle">
                                            <svg class="product-fill product--tagihan-pdam" id="Group_Tagihan_PDAM" data-name="Group Tagihan PDAM" viewBox="0 0 27.525 37.596" width="27px" height="37px">
                                                <path id="Path_Tagihan_PDAM_001" data-name="Path Tagihan PDAM 001" d="M13.733,37.6A13.766,13.766,0,0,1,0,23.8C0,16.723,11.291,2.2,12.634.549A1.305,1.305,0,0,1,13.733,0a1.5,1.5,0,0,1,1.16.549C16.174,2.2,27.526,16.723,27.526,23.8A13.779,13.779,0,0,1,13.733,37.6Zm0-33.752C9.948,8.972,2.93,19.165,2.93,23.8a10.8,10.8,0,0,0,21.606,0c.061-4.639-6.958-14.831-10.8-19.958Zm0,0"
                                                />
                                                <path id="Path_Tagihan_PDAM_002" data-name="Path Tagihan PDAM 002" d="M21.565,46.038a1.465,1.465,0,0,1,0-2.93,4.962,4.962,0,0,0,4.944-4.944,1.465,1.465,0,1,1,2.93,0,7.815,7.815,0,0,1-7.873,7.873Zm0,0"
                                                    transform="translate(-7.832 -14.301)" />
                                            </svg>
                                            <span>Tagihan PDAM</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a>
                                        <div class="product-middle">
                                            <p class="label">Soon</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a>
                                        <div class="product-middle">
                                            <p class="label">Soon</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-product">
                                    <a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::Product list -->

                <!-- begin::Footer -->
                <footer class="ch-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="ch-horz__menu">
                                <a href="homepage.php">
                                    <div class="ch-menu-middle__item">
                                        <svg class="ico--menu-footer menu-footer--active" viewBox="0 0 28.359 26.652" width="28px" height="26px">
                                            <g id="Group_Home" data-name="Group Home" transform="translate(0.037)">
                                                <path id="Path_Home_001" data-name="Path Home 001" d="M29.541,33a.812.812,0,0,0-.832.832V45H22.927V40.406a.794.794,0,0,0-.792-.792h-4.2a.8.8,0,0,0-.832.792V44.96H11.324V34.188a.8.8,0,0,0-.832-.792.794.794,0,0,0-.792.792v11.6a.794.794,0,0,0,.792.792h7.445a.794.794,0,0,0,.792-.792V41.237H21.3v4.554a.8.8,0,0,0,.832.792h7.406a.794.794,0,0,0,.792-.792v-12A.794.794,0,0,0,29.541,33Zm0,0"
                                                    transform="translate(-5.882 -19.931)" />
                                                <path id="Path_Home_002" data-name="Path Home 002" d="M28.094,13.7,21.639,7.208v-4.4a.812.812,0,0,0-.832-.832.8.8,0,0,0-.792.832V5.623L14.709.238A.782.782,0,0,0,14.155,0a.806.806,0,0,0-.594.238L.215,13.623a.735.735,0,0,0,0,1.109.779.779,0,0,0,1.148,0L14.155,1.98,26.946,14.89a.82.82,0,0,0,.594.2.973.973,0,0,0,.594-.2.954.954,0,0,0-.04-1.188Zm0,0"
                                                />
                                            </g>
                                        </svg>
                                        <span class="active">Home</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="ch-horz__menu">
                                <a href="riwayat-transaksi.php">
                                    <div class="ch-menu-middle__item">
                                        <svg class="ico--menu-footer menu-footer--inactive" viewBox="0 0 27.492 27.449" width="28px" height="26px">
                                            <g id="Group_Transaksi" data-name="Group Transaksi" transform="translate(0 -0.001)">
                                                <path id="Path_Transaksi_001" data-name="Path Transaksi 001" d="M26.406,8.387a13.508,13.508,0,0,0-7.344-7.3,13.688,13.688,0,0,0-10.675,0A13.734,13.734,0,0,0,0,13.725,13.734,13.734,0,0,0,8.387,26.366a13.688,13.688,0,0,0,10.675,0,13.638,13.638,0,0,0,7.344-7.3,13.5,13.5,0,0,0,1.084-5.337,12.35,12.35,0,0,0-1.084-5.337ZM24.239,19.825a12.25,12.25,0,0,1-4.414,4.414,11.844,11.844,0,0,1-6.06,1.645,11.7,11.7,0,0,1-4.7-.963A11.8,11.8,0,0,1,2.649,18.5a11.7,11.7,0,0,1-.963-4.7,11.808,11.808,0,0,1,1.605-6.06A12.25,12.25,0,0,1,7.705,3.331a11.981,11.981,0,0,1,12.119,0,12.25,12.25,0,0,1,4.414,4.414,11.7,11.7,0,0,1,1.605,6.06,11.874,11.874,0,0,1-1.605,6.02Zm0,0"
                                                />
                                                <path id="Path_Transaksi_002" data-name="Path Transaksi 002" d="M33.826,21.028V13.243a.857.857,0,0,0-.883-.843.848.848,0,0,0-.843.843v7.906a.4.4,0,0,1,.04.12.735.735,0,0,0,.241.682l4.495,4.495a.824.824,0,0,0,1.164,0,.789.789,0,0,0,0-1.164Zm0,0"
                                                    transform="translate(-19.218 -7.424)" />
                                            </g>
                                        </svg>
                                        <span>Riwayat Transaksi</span>
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
                                        <span>Riwayat Deposit</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end::Footer -->
                <?php  
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<!-- end::Body -->

<!-- begin::Page Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery.autocomplete.min.js"></script>
<script src="assets/js/archie.js"></script>
<!-- end::Page Scripts -->

</html>