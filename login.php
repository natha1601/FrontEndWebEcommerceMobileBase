
<?php session_start(); ?>
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
            <div class="page archie-base archie-base__prefix archie-page__login">
                <div class="ch-login__wrapper">
                    <div class="ch-login__signin">
                        <!-- begin::Head Login -->
                        <?php  
				            if (!isset($_POST["login"])) {
                        ?>
                        <div class="ch-login__head">
                            <h3 class="ch-login__title">
                                Hi
                            </h3>
                            <p class="ch-login__subheader">
                                Partner Pulsa47
                            </p>
                            <p class="ch-login__breadcrumbs">
                                Silahkan login untuk melakukan transaksi
                            </p>
                        </div>
                        <!-- end::Head Login -->

                        <!-- begin::Form Login -->
                        <form class="ch-login__form" action="login.php" method="POST">
                            <div class="form-group ch-form__group ch-form__phone">
                                <input type="number" class="form-control ch-input" id="input_phone" name="nohp">
                                <label for="input_phone">Nomor Handphone</label>
                                <span class="focus-border"></span>
                                <a href="#" class="clear-field mr10" aria-label="Clear Input" alt="Clear Input" role="link"></a>
                            </div>
                            <div class="form-group ch-form__group ch-form__password mt10">
                                <input type="password" class="form-control ch-input" id="input_password" name="password">
                                <label for="input_password">Password</label>
                                <span class="focus-border"></span>
                                <a href="#" class="clear-field mr10" aria-label="Clear Input" alt="Clear Input" role="link"></a>
                            </div>
                            <div class="clearfix mt15">
                                <a href="#" class="float-right" id="forgot_password">Lupa Password?</a>
                            </div>
                            <div class="clearfix hidden">
                                <p class="ch-login__warning">Nomor telepon atau password salah.</p>
                            </div>
                            <div class="clearfix mt15">
                                <button name="login" type="submit" class="ch-login__button" id="btn_login">Login</button>
                            </div>
                        </form>
                        <?php  
			                } else {
                                include 'koneksi.php';
                                
                                $nohp = $_POST["nohp"];
                                $pass = $_POST["password"];

                                $query = "SELECT * FROM user WHERE no_hp='" . $nohp . "'";
                                $result = mysqli_query($database, $query);
                                $null = "";

                                if ($result) {
                                    $row = mysqli_fetch_row($result);
                                    if ($row[2] == $pass and $row[1] == $nohp and $pass != $null  and $nohp != $null) {
                                        $_SESSION['nohp'] = $nohp;
                                        $nohp_user = $_SESSION['nohp'];
                                        header("location:homepage.php");
                                    } else {
                                        echo "Nomor telepon atau password salah<br>"; ?>
							            <a href="login.php"><button class="ch-back__button">Kembali</button></a>
						                <?php
                                    }
                                } else {
                                    echo "Nomor telepon atau password salah<br>"; ?>
							        <a href="login.php"><button class="ch-back__button">Kembali</button></a>
						            <?php
                                }
                            }
                        ?>
                        <!-- end::Form Login -->
                    </div>
                </div>
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