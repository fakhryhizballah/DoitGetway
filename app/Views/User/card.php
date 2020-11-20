<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>

<div class="section mt-2">

    <!-- card block -->
    <?php foreach ($myCard as $r) : ?>
        <div class="card-block mb-2 <?= $r['Warna']; ?>">
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
                    <h1 class="title">Rp. <?= $r['Saldo']; ?></h1>
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
    <?php endforeach; ?>
    <!-- * card block -->
</div>


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