<?= $this->extend('Layout/AuthLayout', $title); ?>

<?= $this->section('AppHededr'); ?>
<div class="appHeader no-border">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle"></div>
    <div class="right">
        <a href="/" class="headerButton">
            Login
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('Auth'); ?>
<div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Ganti password</h1>
        <h4>Masukan Password Baru untuk menganti password</h4>
    </div>
    <div class="section mt-2 mb-5 p-3">
        <form action="../Auth/gantipassword" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password">Password Baru</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?> " id="password1" name="password1" placeholder="Password anda">
                    <div class="invalid-feedback"><?= $validation->getError('password1'); ?></div>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password">Ulangi Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?> " id="password2" name="password2" placeholder="Ulangi password anda">
                    <div class="invalid-feedback"><?= $validation->getError('password2'); ?></div>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Ganti Password</button>
            </div>
        </form>
    </div>

</div>

<?= $this->endSection(); ?>