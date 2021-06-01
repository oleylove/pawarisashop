<form method="POST" action="{{ route('update.order') }}" accept-charset="UTF-8" class="form-horizontal was-validated"
    enctype="multipart/form-data" id="FormSlipOrder">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <div class="modal fade bd-example-modal-sm" id="ModalSlipOrder" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="col-md slipOrder">
                        <img id="slipOrder" src="" class="img-fluid rounded-lg border border-success">
                    </div>
                    <div class="col-md mt-1">
                        <div class="input-group" id="data-tracking">

                        </div>
                    </div>
                    <div class="col-md mt-1">
                        <div class="input-group" id="data-shipping">

                        </div>
                    </div>
                    <div class="col-md mt-1">
                        <div class="input-group" id="data-consignee">

                        </div>
                    </div>
                </div>
                <input type="hidden" id="id" name="id" class="d-none">
                <input type="hidden" id="status" name="status" class="d-none">
                <input type="hidden" id="net" name="net" class="d-none">
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-block" id="SaveSlipOrder" value="">
                </div>
            </div>
        </div>
    </div>
</form>
