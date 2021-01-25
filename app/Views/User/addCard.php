<!-- AddCardActionSheet -->
<div class="modal fade action-sheet" id="modaltambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kartu</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div id="scan" class="camera">
                        <video id="preview" class="kamera"></video>
                    </div>
                    <form action="user/addcard" method="POST" id="myForm" class="user">
                        <?= csrf_field(); ?>
                        <div class="container">
                            <div class="form-group">
                                <input type="hidden" class="form-control form-control-user" id="code" name="qrcode">
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label class="label">ID Reader</label>
                            <div class="input-group mb-3">
                                <input type="text" name="reader" id="reader" class="form-control form-control-lg" placeholder="Camera Scaner QR">
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
<!-- * AddCardActionSheet -->