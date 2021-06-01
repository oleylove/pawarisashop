<div class="col-md-2">
    <div class="card">
        <div class="card-header">
            เมนูหลัก
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist" id="btnSidebar">
                <li role="presentation" class="mb-3">
                    <i class="fas fa-chart-line mr-2" style="font-size: 20px"></i>
                    <a href="{{ route('dashboard') }}" style="font-size: 16px">
                        Dashboard
                    </a>
                </li>
                <li role="presentation" class="mb-3">
                    <i class="fas fa-users mr-2" style="font-size: 20px"></i>
                    <a href="{{ url('/order') }}" style="font-size: 16px">
                        คำสั่งซื้อสินค้า
                    </a>
                </li>
                <li role="presentation" class="mb-3">
                    <i class="fab fa-product-hunt mr-2" style="font-size: 20px"></i>
                    <a href="{{ url('/product') }}" style="font-size: 16px">
                        รายการสินค้า
                    </a>
                </li>
                <li role="presentation" class="mb-3">
                    <i class="fas fa-users mr-2" style="font-size: 20px"></i>
                    <a href="{{ url('/profile') }}" style="font-size: 16px">
                        รายชื่อลูกค้า
                    </a>
                </li>
                <li role="presentation" class="mb-3">
                    <i class="fas fa-book-open mr-2" style="font-size: 20px"></i>
                    <a href="{{ url('/income') }}" style="font-size: 16px">
                        บัญชีร้าน
                    </a>
                </li>

                <li role="presentation" class="mb-3">
                    <i class="fas fa-cogs mr-2" style="font-size: 20px"></i>
                    <a href="{{ url('/config') }}" style="font-size: 16px">
                        ตั้งค่าเว็บ
                    </a>
                </li>

                <li role="presentation" class="mb-2 text-danger">
                    <i class="fas fa-unlock-alt mr-2" style="font-size: 20px"></i>
                    <a href="javascript:void(0)" class="text-danger" id="changePassword" style="font-size: 16px">
                        เปลี่ยนรหัสผ่าน
                    </a>
                </li>
            </ul>
            @include ('admin.modal-changpasswoed')
        </div>
    </div>
</div>
