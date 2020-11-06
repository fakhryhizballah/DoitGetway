<?= $this->extend('Layout/UserLayout', $title); ?>

<?= $this->section('User'); ?>
<div class="section full">

    <ul class="listview image-listview flush">
        <li class="active">
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Payment Received</strong></div>
                        <div class="text-small mb-05">John sent you <b>$ 50</b></div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                    <span class="badge badge-primary badge-empty"></span>
                </div>
            </a>
        </li>
        <li class="active">
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-success">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Money has been sent</strong></div>
                        <div class="text-small mb-05">The money you sent to John was successfully sent.</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                    <span class="badge badge-primary">3</span>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-danger">
                    <ion-icon name="key-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Password changed</strong></div>
                        <div class="text-small mb-05">Your password has been changed</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-warning">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>New Messages</strong></div>
                        <div class="text-small mb-05">You have new messages from John</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-primary">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Payment Received</strong></div>
                        <div class="text-small mb-05">John sent you <b>$ 50</b></div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-success">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Money has been sent</strong></div>
                        <div class="text-small mb-05">The money you sent to John was successfully sent.</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-danger">
                    <ion-icon name="key-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>Password changed</strong></div>
                        <div class="text-small mb-05">Your password has been changed</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="app-notification-detail.html" class="item">
                <div class="icon-box bg-warning">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </div>
                <div class="in">
                    <div>
                        <div class="mb-05"><strong>New Messages</strong></div>
                        <div class="text-small mb-05">You have new messages from John</div>
                        <div class="text-xsmall">5/3/2020 10:30 AM</div>
                    </div>
                </div>
            </a>
        </li>
    </ul>

</div>

<?= $this->endSection(); ?>