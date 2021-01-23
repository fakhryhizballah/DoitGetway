<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kamu Bisa melakukan transaksi dengan Cepat Mudah dan Aman">
    <meta name="keywords" content="Spairum Doit,Spairum Pay, dompet, Do it, card, KTP, Bayar, pay" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo apples.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="48x48">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <script src="assets/js/lib/jquery-3.5.1.min.js"></script>
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/logo apples.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="assets/img/spairum-logo.svg" alt="logo" class="logo">
        </div>
        <div class="right">
            <a href="#" class="headerButton">
                <img src="assets/img/user/<?= $akun['Poto']; ?>" alt="image" class="imaged w32">
                <!-- <span class="badge badge-danger">6</span> -->
            </a>
        </div>
    </div>
    <!-- * App Header -->
    <!-- App Capsule -->
    <div id="appCapsule">

        <?= $this->renderSection('User'); ?>
        <div class="flash-Success" data-flashdata="<?= session()->getFlashdata('Berhasil'); ?>"></div>
        <div class="flash-Error" data-flashdata="<?= session()->getFlashdata('Error'); ?>"></div>


    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="/" class="item">
            <div class="col">
                <ion-icon name="wallet-outline"></ion-icon>
                <strong>Dompet Saya</strong>
            </div>
        </a>
        <a href="/mycard" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>My Cards</strong>
            </div>
        </a>
        <a href="/riwayat" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Riwayat</strong>
            </div>
        </a>
        <!-- <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
                <strong>Menu</strong>
            </div>
        </a> -->
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="assets/img/user/<?= $akun['Poto']; ?>" alt="image" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong><?= $akun['Nama_Depan']; ?>&nbsp;<?= $akun['Nama_Belakang']; ?></strong>
                            <div class="text-muted">Username : <?= $akun['Username']; ?></div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- Saldo -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Saldo Dompet</div>
                        <div class="in">
                            <h1 class="amount">Rp<?= number_format($akun['Saldo'], 2, ",", "."); ?></h1>
                        </div>
                    </div>
                    <!-- * saldo -->

                    <!-- action group -->
                    <div class="action-group">
                        <a href="app-index.html" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                                Isi Saldo
                            </div>
                        </a>
                        <a href="#" class="action-button" data-toggle="modal" data-target="#depositActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-down-outline"></ion-icon>
                                </div>
                                Terima
                            </div>
                        </a>
                        <a href="#" class="action-button" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                Bayar
                            </div>
                        </a>
                        <a href="/mycard" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                My Cards
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Menu</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="/" class="item ">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Dompet Saya
                                    <!-- <span class="badge badge-primary">10</span> -->
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/mycard" class="item ">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Cards
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/mycard" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Riwayat
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * menu -->

                    <!-- others -->
                    <div class="listview-title mt-1">Lainnya</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Settings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Support
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="Auth/logout" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->

                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    <!-- Deposit Action Sheet -->
    <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Balance</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">From</label>
                                    <select class="form-control custom-select" id="account1">
                                        <option value="0">Savings (*** 5019)</option>
                                        <option value="1">Investment (*** 6212)</option>
                                        <option value="2">Mortgage (*** 5021)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input1">$</span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" value="100">
                                </div>
                            </div>


                            <div class="form-group basic">
                                <button type="button" class="btn btn-primary btn-block btn-lg" data-dismiss="modal">Deposit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->

    <!-- Send Action Sheet -->
    <div class="modal fade action-sheet" id="sendActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bayar atau Kirim Uang</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="/user/bayar" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account2">Dari</label>
                                    <select class="form-control custom-select" id="account1" name="dari">
                                        <option value="<?= $akun['ID_User']; ?>">Dompet</option>
                                        <?php foreach ($myCard as $r) : ?>
                                            <option value="<?= $r['ID_Card']; ?>"><?= $r['Jenis']; ?> (<?= $r['Ket']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="text11">Tujuan</label>
                                    <input type="number" id="tujuan" name="tujuan" minlength="10" maxlength="14" class="form-control" id="text11" placeholder="Masukan no telpon penerima">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input14">Rp</span>
                                    </div>
                                    <input type="number" class="form-control form-control-lg" name="nominal" id="nominal" placeholder="0">
                                </div>
                            </div>


                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Send Action Sheet -->

    <!-- Exchange Action Sheet -->
    <div class="modal fade action-sheet" id="ExchangeActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tukar Uang</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="/user/exchange" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Dari</label>
                                    <select class="form-control custom-select" id="account1" name="dari">
                                        <option value="<?= $akun['ID_User']; ?>">Dompet</option>
                                        <?php foreach ($myCard as $r) : ?>
                                            <option value="<?= $r['ID_Card']; ?>"><?= $r['Jenis']; ?> (<?= $r['Ket']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account2">Tujuan</label>
                                    <select class="form-control custom-select" id="account2" name="tujuan">
                                        <option value="<?= $akun['ID_User']; ?>">Dompet</option>
                                        <?php foreach ($myCard as $r) : ?>
                                            <option value="<?= $r['ID_Card']; ?>"><?= $r['Jenis']; ?> (<?= $r['Ket']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input14">Rp</span>
                                    </div>
                                    <input type="number" name="jumlah" class="form-control form-control-lg" placeholder="0">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Tukar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Exchange Action Sheet -->

    <!-- AddCardActionSheet -->
    <div class="modal fade action-sheet" id="AddCardActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kartu</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <div class="camera">
                            <video id="preview" class="kamera"></video>
                        </div>
                        <div class="camera">
                            <video id="preview" class="kamera"></video>
                        </div>

                        <form action="user/addcard" method="POST" id="myForm" class="user">
                            <?= csrf_field(); ?>
                            <div class="container">
                                <div class="form-group">
                                    <input type="hidden" class="form-control form-control-user" id="code" name="qrcode">
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">ID Reader</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="reader" id="reader" class="form-control form-control-lg" placeholder="Camera Scaner QR">
                                </div>
                            </div>
                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Oke</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * AddCardActionSheet -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <!-- <script src="assets/js/lib/jquery-3.4.1.min.js"></script> -->

    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script src="assets/js/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <!-- scanner -->
    <script src="scanner/js/app.js"></script>
    <script src="scanner/vendor/instascan/instascan.min.js"></script>
    <script src="scanner/js/scanner.js"></script>

    <script>
        // var settings = {
        //     "url": "http://192.168.1P.52/HomeAI",
        //     "method": "GET",
        //     "timeout": 0,
        //     
        // };

        // $.ajax({
        //     url: 'http://192.168.1P.52/HomeAI',
        //     method: 'GET',
        //     crossDomain: true,
        //     type: 'json',
        //     data: message,
        //     success: function(response) {
        //         console.log(response);
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    </script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/js/script.js"></script>



</body>


</html>