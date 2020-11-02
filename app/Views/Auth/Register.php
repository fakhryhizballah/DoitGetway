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
        <a href="app-login.html" class="headerButton">
            Login
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('Auth'); ?>

<div id="appCapsule">

    <div class="section mt-2 text-center">
        <h1>Register now</h1>
        <h4>Fill the form to register</h4>
    </div>
    <div class="section mt-2 mb-5 p-3">
        <form action="#">
            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="email1">E-mail</label>
                    <input type="email" class="form-control" id="email1" placeholder="Your e-mail">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" placeholder="Your password">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="form-group basic">
                <div class="input-wrapper">
                    <label class="label" for="password2">Password Again</label>
                    <input type="password" class="form-control" id="password2" placeholder="Type password again">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>

            <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" id="customChecka1">
                <label class="custom-control-label" for="customChecka1">
                    Saya Menyetujiui <a href="#" data-toggle="modal" data-target="#termsModal">Syarat dan ketentuan</a>
                </label>
            </div>

            <div class="form-button-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
            </div>

        </form>
    </div>

</div>
<!-- * App Capsule -->


<!-- Terms Modal -->
<div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Syarat dan ketentuan</h5>
                <a href="javascript:;" data-dismiss="modal">Tutup</a>
            </div>
            <div class="modal-body">
                <p>
                    Ketika Anda menggunakan DoIt, Anda mempercayakan uang dan informasi yang anda miliki kepada kami, PT. EET (“DoIt” by Spairum). Penting bagi Kami untuk menjaga kepercayaan Anda. Untuk itu, Kami perlu Anda membaca dan menyetujui langkah-langkah yang Kami terapkan, untuk menjaga kepercayaan Anda, yang Kami jabarkan dalam ketentuan ini.
                </p>
                <strong>Cakupan</strong>
                <p>
                    Ketentuan ini berlaku terhadap seluruh pengguna yang mengakses dan/atau menggunakan salah satu atau seluruh layanan yang tersedia di DoIt, uang elektronik yang Kami terbitkan beserta layanan-layanan yang terkait dengannya, yang disediakan melalui aplikasi DoIt atau platform resmi lainnya dari beberapa mitra kami dimana melalui platform tersebut beberapa atau seluruh bagian dari fitur DoIt dapat diakses (“Mitra Platform Resmi”), dan terhadap setiap orang yang menyampaikan permintaan atau memberikan informasi kepada Kami atau kepada Mitra Platform Resmi terkait dengan setiap atau seluruh layanan DoIt.
                </p>
                <strong>Informasi pribadi</strong>
                <p><strong>a.</strong>
                    Anda setuju bahwa pengumpulan, pemanfaatan, dan penyerahan data yang Anda sampaikan kepada Kami, termasuk melalui aplikasi DoIt dan/atau Mitra Platform Resmi, dan data yang Kami kumpulkan sehubungan dengan penyediaan layanan Kami kepada Anda, termasuk namun tidak terbatas pada informasi pribadi Anda, harus tunduk pada kebijakan privasi yang berlaku dalam aplikasi DoIt (https://www.spairum.com/privacy-policy/) (“Kebijakan Privasi Kami”).
                </p>
            </div>
        </div>
    </div>
</div>
<!-- * Terms Modal -->

<?= $this->endSection(); ?>