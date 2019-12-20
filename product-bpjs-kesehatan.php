<?php 
  session_start();
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
<!-- end::Head -->

<!-- begin::Body -->
<body>
    <div id="app">
        <div class="app-container">
            <div class="page archie-base archie-base__both archie-page__product-bpjs">
            <?php  
                if (!isset($_SESSION['nohp'])) {
                    ?>
                    <div class="homepage__denied"> <?php
                    echo "Masuk untuk mengakses halaman ini"; ?>
                    <a href="login.php"><button class="ch-back__button">Masuk</button></a>
                    </div>
					<?php
                } else {
                    if (!isset($_POST["next"])) {
            ?>
                <!-- begin::Header -->
                <header>
                    <div class="ch-header__both clearfix">
                        <div class="row">
                            <div class="col-sm-2 p0">
                                <a class="float-left" href="homepage.php">
                                    <svg class="ico--nav-header nav-header--back" aria-label="Back to Home" alt="Back to Home" role="link" viewBox="0 0 9.197 16.701"
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
                <div class="container">
                    <div class="portlet mt15">
                        <div class="ch-portlet">
                            <div class="ch-portlet__form mb5">
                                <form action="" method="POST">
                                    <div class="p__field-container p__field-bg field-bpjs">
                                        <input name="nobpjs" type="number" class="p__field" id="input_numb_bpjs">
                                        <label for="input_numb_bpjs">Nomor BPJS</label>
                                        <span class="focus-border"></span>
                                        <a href="#" class="clear-field mr10" id="clear"></a>
                                    </div>
                            </div>
                            <div class="ch-portlet__foot">
                                <button name="next" type="submit" class="ch-btn__lanjutkan" disabled>Lanjutkan</button>
                                <p class="hidden">Nomor BPJS tidak tersedia</p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php  
			        } else {
                        include 'koneksi.php';
                        
                        $nobpjs = $_POST["nobpjs"];

                        $query = "SELECT * FROM bpjs WHERE nomor_bpjs ='" . $nobpjs . "'";
                        $result = mysqli_query($database, $query);
                        $null = "";

                        if ($result) {
                            $row = mysqli_fetch_row($result);
                            if ($row[2] == $nobpjs) {
                                $_SESSION['nobpjs'] = $nobpjs;
						        $nobpjs_user = $_SESSION['nobpjs'];
                                header("location:konfirmasi-pembayaran-bpjs.php");
                            } else {
                                ?>
                                <div class="homepage__denied"> <?php
                                    echo "Nomor BPJS tidak terdaftar<br>"; ?>
							        <a href="product-bpjs-kesehatan.php"><button class="ch-back__button">Kembali</button></a>
                                </div> <?php
                            }
                        } else {
                            ?>
                            <div class="homepage__denied"> <?php
                                echo "Nomor BPJS tidak terdaftar<br>"; ?>
						        <a href="product-bpjs-kesehatan.php"><button class="ch-back__button">Kembali</button></a>
                            </div> <?php
                        }
                    }
                }
                ?>
                <!-- end::Container -->
            </div>
        </div>
    </div>
</body>
<!-- end::Body -->

<!-- begin::Page Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery.autocomplete.min.js"></script>
<script src="assets/js/archie.js"></script>
<script>
    // $(window).load(function(){
    $(document).ready(function() {
        $("input").focusout(function() {
            if ($(this).val() != "") {
                $(this).addClass("has-content");
            } else {
                $(this).removeClass("has-content");
            }
        })
    });
</script>
<!-- end::Page Scripts -->

</html>