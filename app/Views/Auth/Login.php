<?= $this->extend('Layout/AuthLayout', $title); ?>

<?= $this->section('AppHededr'); ?>
<div class="appHeader no-border">
    <!-- <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div> -->
    <div class="pageTitle"></div>
    <div class="right">
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('Auth'); ?>
<div id="appCapsule">
    <div class="flash-Success" data-flashdata="<?= session()->getFlashdata('Berhasil'); ?>"></div>
    <div class="flash-Error" data-flashdata="<?= session()->getFlashdata('Error'); ?>"></div>
    <div class="section mt-2 text-center">
        <h1>Login</h1>
        <h4>Silahkan Masuk</h4>
    </div>
    <div class="section mt-2 mb-5 p-3">
        <form action="Auth/login" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="email">E-mail / Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Username/e-mail" value="<?= old('email'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="password">
                    <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
            </div>
        </form>

        <div class="form-links mt-2">
            <div>
                <a href="/daftar">Daftar Sekarang</a>
            </div>
            <div><a href="/lupapassword" class="text-muted">Lupa Password</a></div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>