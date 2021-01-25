<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>
<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'http://192.168.1.52/HomeAPI',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_CUSTOMREQUEST => 'GET',
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// $response = json_decode($response, true);
// $namaUsr = $response['message']['Username'];
// $Snama = session()->get('Username');

// echo $namaUsr;

?>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
<div class="flash-Error2" data-flashdata="<?= session()->getFlashdata('Error2'); ?>"></div>
<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Total Saldo</span>
                <h1 class="total">Rp <?= number_format($akun['Saldo'] + $SaldoCard, 0, ",", "."); ?></h1>
            </div>
            <div class="right">
                <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                    <ion-icon name="add-outline"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer">
            <div class="item">
                <a href="#" data-toggle="modal" data-target="#depositActionSheet">
                    <div class="icon-wrapper bg-danger">
                        <ion-icon name="arrow-down-outline"></ion-icon>
                    </div>
                    <strong>Terima</strong>
                </a>
            </div>
            <div class="item">
                <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                    <div class="icon-wrapper">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <strong>Bayar</strong>
                </a>
            </div>
            <div class="item">
                <!-- <a data-toggle="modal" data-target="#AddCardActionSheet"> -->
                <!-- <a href="/QR"> -->
                <a class="">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="journal-outline"></ion-icon>
                    </div>
                    <strong>Add Cards</strong>
                </a>
                <button type="button" class="btn btn-primary tomboladdcard"></button>
            </div>
            <div class="item">
                <a data-toggle="modal" data-target="#ExchangeActionSheet">
                    <div class="icon-wrapper bg-warning">
                        <ion-icon name="swap-vertical"></ion-icon>
                    </div>
                    <strong>Exchange</strong>
                </a>
            </div>

        </div>
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->



<!-- Stats -->
<div class="section">
    <div class="row mt-2">
        <div class="col-7">
            <div class="stat-box">
                <div class="title">Saldo Dompet</div>
                <div class="value text-success">Rp <?= number_format($akun['Saldo'], 0, ",", "."); ?></div>
            </div>
        </div>
        <div class="col-5">
            <div class="stat-box">
                <div class="title">Total Card</div>
                <div class="value text-danger"> <?= $SumCard; ?></div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="stat-box">
                <div class="title">Total Saldo Card</div>
                <div class="value">Rp <?= number_format($SaldoCard, 0, ",", "."); ?></div>
            </div>
        </div>
        <!-- <div class="col-6">
            <div class="stat-box">
                <div class="title">Savings</div>
                <div class="value">$ 120.99</div>
            </div>
        </div> -->
    </div>
</div>
<!-- * Stats -->


<!-- my cards -->
<div class="section full mt-4">
    <div class="section-heading padding">
        <h2 class="title">My Cards</h2>
        <a href="/mycard" class="link">View All</a>
    </div>
    <div class="carousel-single owl-carousel owl-theme shadowfix">
        <?php foreach ($myCard as $r) : ?>
            <div class="item">
                <!-- card block -->
                <div class="card-block <?= $r['Warna']; ?>">
                    <div class="card-main">
                        <div class="card-button dropdown">
                            <button type="button" class="btn btn-link btn-icon" data-toggle="dropdown">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EditCardActionSheet<?= $r['ID_Card']; ?>">
                                    <ion-icon name="pencil-outline"></ion-icon>Edit
                                </a>
                                <a class="dropdown-item" href="/User/removeCard/<?= $r['ID_Card']; ?>">
                                    <ion-icon name="close-outline"></ion-icon>Remove
                                </a>
                                <!-- <a class="dropdown-item" href="javacript:;">
                                    <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                </a> -->
                            </div>
                        </div>
                        <div class="balance">
                            <span class="label">Saldo</span>
                            <h1 class="title">Rp <?= $r['Saldo']; ?></h1>
                        </div>
                        <div class="in">
                            <div class="card-number">
                                <span class="label">Card Info</span>
                                <?= $r['Ket']; ?>
                            </div>
                            <div class="bottom">
                                <div class="card-ccv">
                                    <span class="label">Card Tipe</span>
                                    <?= $r['Jenis']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * card block -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- * my cards -->

<!-- EditCardActionSheet -->
<?php foreach ($myCard as $r) : ?>
    <div class="modal fade action-sheet" id="EditCardActionSheet<?= $r['ID_Card']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Card</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="user/editCard/<?= $r['ID_Card']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">Warna</label>
                                    <select class="form-control custom-select" id="account1" name="warna">
                                        <option value="<?= $r['Warna']; ?>">Pilih Warna</option>
                                        <option value="bg-primary">Biru</option>
                                        <option value="bg-secondary">Abu-Abu</option>
                                        <option value="bg-success">Hijau</option>
                                        <option value="bg-danger">Merah</option>
                                        <option value="bg-warning">Kuning</option>
                                        <option value="bg-info">Biru Muda</option>
                                        <option value="bg-dark">Hitam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Card Tipe</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="jenis" id="jenis" class="form-control form-control-lg" placeholder="" value="<?= $r['Jenis']; ?>">
                                </div>
                            </div>
                            <div class="form-group basic">
                                <label class="label">Info Card</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="Ket" id="Ket" class="form-control form-control-lg" placeholder="" value="<?= $r['Ket']; ?>">
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
<?php endforeach; ?>



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
                    <form id="exchange" method="POST">
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
                            <!-- <button type="submit" class="btn btn-primary btn-block btn-lg">Tukar</button> -->
                            <button type="submit" onclick="exchange" class="btn btn-primary btn-block btn-lg">Tukar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
    $("#exchange").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/user/exch",
            data: $(this).serialize(),
            success: function(data) {}
        });
    });

    $(document).ready(function() {
        console.log("ready!");
        $('.tomboladdcard').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'User/addCard1',
                dataType: "json",
                success: function($response) {
                    // $('.viewmodal').html(response.data).show;
                    $('#modaltambah').modal('show');
                },
                error: function(xhr, ajaxOptions, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText);
                }

            });
        });
    });
</script>
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
                    <div id="scan" class="camera">
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


<?= $this->endSection(); ?>