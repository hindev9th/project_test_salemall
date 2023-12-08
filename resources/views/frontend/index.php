<?php $title = 'Trang chủ' ?>
<?php require 'resources/views/frontend/layouts/header.php' ?>
<?php require 'resources/views/frontend/layouts/slide.php' ?>
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php foreach (($products ?? null) as $product) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <a href="/product/<?= $product->getId()?>" class="text-decoration-none">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class=" w-100"
                                     src="<?php asset('images/products/' . $product->getImage()); ?>" height="390" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?= $product->getName() ?></h6>
                                <div class="d-flex justify-content-center">
                                    <?php if (auth()): ?>
                                        <h6><?= number_format($product->getPrice()) ?>đ</h6>
                                    <?php else: ?>
                                        <h6 class="text-warning">Liên hệ</h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="#" class="btn btn-sm text-dark p-0"><i class="fas fa-heart text-primary mr-1"></i>Yêu
                                thích</a>
                            <a href="#" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm bào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Products End -->
<?php if (isset($counts)): ?>
    <?php $count_page = $counts/24; ?>
    <?php $current_page = $current_page ?? 0; ?>
    <div class="col-12 pb-1">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-3">
                <li class="page-item <?=$current_page <= 0 ? 'disabled' : ''?>">
                    <a class="page-link" href="/?page=<?=$current_page-1?>" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php for ($i = 0; $i < $count_page; $i++) : ?>
                    <li class="page-item <?=$i === $current_page ? 'active' : ''?>"><a class="page-link" href="/?page=<?=$i?>"><?=$i?></a></li>
                <?php endfor; ?>
                <li class="page-item <?=$current_page >= ($count_page-1) ? 'disabled' : ''?>">
                    <a class="page-link" href="/?page=<?=$current_page+1?>" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php require 'resources/views/frontend/layouts/footer.php' ?>