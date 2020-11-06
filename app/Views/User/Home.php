<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>
<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Total Saldo</span>
                <h1 class="total">Rp. 2,562.50</h1>
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
                <a href="app-cards.html">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                    <strong>Cards</strong>
                </a>
            </div>
            <div class="item">
                <a href="#" data-toggle="modal" data-target="#sendActionSheet">
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
                <h5 class="modal-title">Send Money</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="account2">From</label>
                                <select class="form-control custom-select" id="account2">
                                    <option value="0">Savings (*** 5019)</option>
                                    <option value="1">Investment (*** 6212)</option>
                                    <option value="2">Mortgage (*** 5021)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="text11">To</label>
                                <input type="email" class="form-control" id="text11" placeholder="Enter bank ID">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label">Enter Amount</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input14">$</span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="0">
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
<!-- * Send Action Sheet -->

<!-- Stats -->
<div class="section">
    <div class="row mt-2">
        <div class="col-7">
            <div class="stat-box">
                <div class="title">Saldo Dompet</div>
                <div class="value text-success">Rp 5525</div>
            </div>
        </div>
        <div class="col-5">
            <div class="stat-box">
                <div class="title">Total Card</div>
                <div class="value text-danger"> 5</div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="stat-box">
                <div class="title">Total Saldo Card</div>
                <div class="value">Rp 53.25</div>
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
        <div class="item">

            <!-- card block -->
            <div class="card-block bg-primary">
                <div class="card-main">
                    <div class="card-button dropdown">
                        <button type="button" class="btn btn-link btn-icon" data-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="pencil-outline"></ion-icon>Edit
                            </a>
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="close-outline"></ion-icon>Remove
                            </a>
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                            </a>
                        </div>
                    </div>
                    <div class="balance">
                        <span class="label">Saldo</span>
                        <h1 class="title">Rp 1,256,90</h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">Tipe Kartu</span>
                            Kartu Tanda Penduduk
                        </div>
                    </div>
                </div>
            </div>
            <!-- * card block -->
        </div>

        <div class="item">
            <!-- card block -->
            <div class="card-block">
                <div class="card-main">
                    <div class="card-button dropdown">
                        <button type="button" class="btn btn-link btn-icon" data-toggle="dropdown">
                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="pencil-outline"></ion-icon>Edit
                            </a>
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="close-outline"></ion-icon>Remove
                            </a>
                            <a class="dropdown-item" href="javacript:;">
                                <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                            </a>
                        </div>
                    </div>
                    <div class="balance">
                        <span class="label">BALANCE</span>
                        <h1 class="title">$ 1,256,90</h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">Tipe Kartu</span>
                            White Card
                        </div>
                    </div>
                </div>
            </div>
            <!-- * card block -->
        </div>

    </div>
</div>
<!-- * my cards -->

<!-- 
<?= $this->endSection(); ?>