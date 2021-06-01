@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Contact')

@section('content')
<!-- start contact section -->
<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-contact-area">
                    <div class="aa-contact-top">
                        <h2>เรายินดีที่จะช่วยเหลือคุณ</h2>
                        <p>หากมีบัญหาในการใช้งาน หรือการสั่งซื้อสินค้า หรืออื่นๆ กรุณาติดต่อเราได้ตลอดเวลาคะ</p>
                    </div>
                    <!-- contact map -->
                    <div class="aa-contact-map">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
                        </iframe> --}}
                    </div>
                    <!-- Contact address -->
                    <div class="aa-contact-address">
                        <div class="row">
                            {{-- <div class="col-md-8">
                                <div class="aa-contact-address-left">
                                    <form class="comments-form contact-form" action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Your Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Subject" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Company" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <button class="aa-secondary-btn">Send</button>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="aa-contact-address-right">
                                    <address>
                                        <h4>{{ $config->title }}</h4>
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi
                                            dolor facilis! Nihil error, eius.</p> --}}
                                        <p><span class="fas fa-home"></span>  {{ $config->address }}</p>
                                        <p><span class="fas fa-phone-square-alt"></span> {{ $config->phone }}</p>
                                        <p><span class="fab fa-facebook"></span> {{ $config->facebook }}</p>
                                        <p><span class="fab fa-line"></span>  {{ $config->line }}</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
