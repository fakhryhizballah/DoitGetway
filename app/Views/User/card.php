<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>

<div class="section mt-2">

    <!-- card block -->
    <div class="card-block mb-2">
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
                <h1 class="title">$ 1,256,90</h1>
            </div>
            <div class="in">
                <div class="card-number">
                    <span class="label">Jenis Kartu</span>
                    9905 0903 0234 9905
                </div>
            </div>
        </div>
    </div>
    <!-- * card block -->

    <!-- card block -->
    <div class="card-block bg-secondary mb-2">
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
                <h1 class="title">$ 521,44</h1>
            </div>
            <div class="in">
                <div class="card-number">
                    <span class="label">Jenis Kartu</span>
                    9905 0903 0234 9905
                </div>
            </div>
        </div>
    </div>
    <!-- * card block -->
    <!-- card block -->
    <div class="card-block bg-secondary mb-2">
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
                <h1 class="title">$ 521,44</h1>
            </div>
            <div class="in">
                <div class="card-number">
                    <span class="label">Jenis Kartu</span>
                    9905 0903 0234 9905
                </div>
            </div>
        </div>
    </div>
    <!-- * card block -->
</div>



<?= $this->endSection(); ?>