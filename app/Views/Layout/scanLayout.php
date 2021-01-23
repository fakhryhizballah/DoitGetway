<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- scanner -->
    <script src="scanner/vendor/modernizr/modernizr.js"></script>
    <script src="scanner/vendor/vue/vue.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kamu Bisa melakukan transaksi dengan Cepat Mudah dan Aman">
    <meta name="keywords" content="Spairum Doit,Spairum Pay, dompet, Do it, card, KTP, Bayar, pay" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo apples.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="48x48">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <script src="assets/js/lib/jquery-3.5.1.min.js"></script>
</head>
<div class="container">
    <div class="camera">
        <video id="preview" class="kamera" style="width: 70%; margin-left: 50px;margin-top: 140px;margin-right: 50px;"></video>
    </div>
    <form action="user/addcard" method="POST" id="myForm" class="user">
        <?= csrf_field(); ?>
        <div class="container">
            <div class="form-group">
                <input type="hidden" class="form-control form-control-user" id="code" name="qrcode">
            </div>
        </div>
    </form>
</div>

<body>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- scanner -->
    <script src="scanner/js/app.js"></script>
    <script src="scanner/vendor/instascan/instascan.min.js"></script>
    <script src="scanner/js/scanner.js"></script>

    <!-- page level script -->
    <script></script>
    <!-- scanner -->
    <script src="scanner/js/app.js"></script>
    <script src="scanner/vendor/instascan/instascan.min.js"></script>
    <script src="scanner/js/scanner.js"></script>
    <!-- sweet alernt -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/script.js"></script>
</body>

</html>