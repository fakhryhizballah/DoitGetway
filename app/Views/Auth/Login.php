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

    <div class="section mt-2 text-center">
        <h1>Login</h1>
        <h4>Silahkan Masuk</h4>
    </div>
    <div class="section mt-2 mb-5 p-3">
        <form action="#">
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="email1">E-mail</label>
                    <input type="email" class="form-control" id="email1" placeholder="Username/e-mail">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" placeholder="password">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-links mt-2">
                <div>
                    <a href="/daftar">Daftar Sekarang</a>
                </div>
                <div><a href="app-forgot-password.html" class="text-muted">Lupa Password</a></div>
            </div>

            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection(); ?>