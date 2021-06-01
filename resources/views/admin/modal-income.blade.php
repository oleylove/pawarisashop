<!-- Modal -->
<form method="POST" action="{{ url('/income') }}" accept-charset="UTF-8" class="form-horizontal was-validated"
    enctype="multipart/form-data" id="FormIncome">
    {{ csrf_field() }}

    <div class="modal fade" id="ModalIncome" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="remark" class="control-label">{{ 'รายรับ-รายจ่าย' }}</label>
                                <select class="custom-select" id="remark" name="remark" required>
                                    <option value="">กรุณาเลือก...</option>
                                    <option value="รายรับ">รายรับ</option>
                                    <option value="รายจ่าย">รายจ่าย</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="income" class="control-label">{{ 'จำนวนเงิน' }}</label>
                                <input class="form-control" name="income" type="number" id="income" min="1" required>
                                <input class="d-none" type="hidden" id="id" name="id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="refer" class="control-label">{{ 'หมายเหตุ' }}</label>
                                <select class="custom-select" id="refer" name="refer" required>
                                    <option value="">กรุณาเลือก...</option>
                                    <option value="ขายสินค้า">ขายสินค้า</option>
                                    <option value="ซื้อสินค้า">ซื้อสินค้า</option>
                                    <option value="จัดส่งสินค้า">จัดส่งสินค้า</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger">
                        กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึกคะ!
                    </button>
                    <button type="submit" class="btn btn-primary" id="btnSaveIncome">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
