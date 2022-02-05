<!-- header -->
<nav class="navbar navbar-light bg-light shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo/bootstrap-logo.svg') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            <span class="">ระบบจัดการหลังบ้าน</span>
        </a>
        <div class="nav-2">
            <button class="navbar-toggler navbar-brand" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header shadow">
                    <h5 class="offcanvas-title mb-3" id="offcanvasNavbarLabel">
                        <i class="fas fa-cogs" style="font-size: 25px;"><span class="mx-3">จัดการระบบ</span></i>
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body shadow">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"><span class="mx-2">ภาพรวมระบบ</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ route('admin.category') }}">
                                <i class="fas fa-plus"><span class="mx-2">จัดการประเภทสินค้า</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ route('admin.product') }}">
                                <i class="fas fa-plus"><span class="mx-2">จัดการสินค้า</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ route('admin.order') }}">
                                <i class="fas fa-shopping-cart"><span class="mx-2">รายการสั่งซื้อ</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ route('admin.payment') }}">
                                <i class="far fa-credit-card"><strong class="mx-2">รายการชำระเงิน</strong></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" href="{{ url('admin/member') }}">
                                <i class="fas fa-address-card"><span class="mx-2">ข้อมูลสมาชิก</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ route('admin.profile') }}">
                                <i class="fas fa-user-lock"><span class="mx-2">ข้อมูลส่วนตัว</span></i>
                            </a>
                        </li>
                        <li class="nav-item mb-3 border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" aria-current="page" href="{{ url('/') }}">
                                <i class="fas fa-shopping-cart"><span class="mx-2">หน้า Shopping</span></i>
                            </a>
                        </li>
                        <li class="nav-item border border-dark border border-1 shadow">
                            <a class="nav-link active p-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"><span class="mx-3">ออกจากระบบ</span></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
