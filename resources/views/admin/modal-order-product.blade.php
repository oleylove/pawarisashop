<div class="modal fade bd-example-modal-lg" id="ModalOrderProduct" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row no-gutters mb-1">
                    <div class="col-md">
                        <img id="productPhoto" src="" class="img-fluid rounded-lg border border-success">
                    </div>
                    <div class="col-md mt-1">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless">
                                <tbody class="text-left">
                                    <tr>
                                        <th> ขนาด </th>
                                        <td id="product-size">  </td>
                                    </tr>
                                    <tr>
                                        <th> สี </th>
                                        <td id="product-color">  </td>
                                    </tr>
                                    <tr>
                                        <th> ราคา </th>
                                        <td id="product-price">  </td>
                                    </tr>
                                    <tr>
                                        <th> ต้นทุน </th>
                                        <td id="product-cost">  </td>
                                    </tr>
                                    <tr>
                                        <th> ส่วนลด </th>
                                        <td id="product-disc">  </td>
                                    </tr>
                                    <tr>
                                        <th> ขายไปแล้ว </th>
                                        <td id="product-sold">  </td>
                                    </tr>
                                    <tr>
                                        <th> เหลืออยู่ </th>
                                        <td id="product-qty">  </td>
                                    </tr>
                                    <tr>
                                        <th> Vote </th>
                                        <td id="product-vote">  </td>
                                    </tr>
                                    <tr>
                                        <th> Score </th>
                                        <td id="product-score">  </td>
                                    </tr>
                                    <tr>
                                        <th> Rating </th>
                                        <td id="product-rating">
                                            <div class="barra-rating">
                                                <span class="bg-rating"></span>
                                                <span class="stars-rating">
                                                    @for($i=1; $i<=5; $i++)
                                                    <span class="star-rating">
                                                        <span class="starAbsolute-rating"
                                                            style="background-image: url({{ url('/') }}/storage/starvote/starpng.png);">
                                                        </span>
                                                    </span>
                                                    @endfor
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md text-left">
                    <p id="product-content"> </p>

                </div>
            </div>
        </div>
    </div>
</div>
