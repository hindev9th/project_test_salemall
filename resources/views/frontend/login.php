<?php $title = 'Đăng nhập' ?>
<?php require 'resources/views/frontend/layouts/header.php'; ?>
    <!--page header start-->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng nhập</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đăng nhập</p>
            </div>
        </div>
    </div>
    <!--page header end-->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 justify-content-center">
            <form action="/login/in" method="post">
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" required class="form-control" placeholder="Email">
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" id="password" required class="form-control" placeholder="Mật khẩu">
                </div>
                <button class="btn btn-primary w-100 mb-2">Đăng nhập</button>
                <span>Bạn chưa có tài khoản? <a href="/register" class="text-primary text-decoration-none">Đăng ký ngay</a></span>

            </form>
        </div>
    </div>
<?php require 'resources/views/frontend/layouts/footer.php'; ?>