<!-- Modal -->
<form method="POST" action="{{ route('admin.changepassword') }}" accept-charset="UTF-8" class="form-horizontal"
    enctype="multipart/form-data" id="FormChangePassword">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalChangePassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-contect-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="current_password"
                                    autocomplete="current-password" placeholder="รหัสผ่านเดิม" required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-contect-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="new_password" type="password" class="form-control" name="new_password"
                                    autocomplete="current-password" placeholder="รหัสผ่านใหม่" required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-contect-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="new_confirm_password" type="password" class="form-control"
                                    name="new_confirm_password" autocomplete="current-password"
                                    placeholder="ยืนยันรหัสผ่านใหม่" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnSaveChangePassword">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
