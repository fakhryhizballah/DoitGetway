<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>
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
                <a data-toggle="modal" data-target="#AddCardActionSheet">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="journal-outline"></ion-icon>
                    </div>
                    <strong>Add Cards</strong>
                </a>
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
<!-- * EditCardActionSheet -->


<?= $this->endSection(); ?>