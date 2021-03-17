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
        <h1>Reset password</h1>
        <h4>Type your e-mail to reset your password</h4>
    </div>
    <div class="section mt-2 mb-5 p-3">
        <form action="Auth/sendemail" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="email">E-mail</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> " id="email" name="email" placeholder="E-mail" value="<?= old('email'); ?>">
                    <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Reset</button>
            </div>
        </form>
    </div>

</div>

<?= $this->endSection(); ?>