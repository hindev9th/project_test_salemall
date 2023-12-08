<?php $title = 'Admin | Product' ?>
<?php $selected = 'product' ?>
<?php require 'resources/views/admin/layouts/head.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Products</h4>
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">Products</h5>
            <a href="/admin/product/create" class="btn btn-primary btn-add"><i name='plus-medical'></i> Add</a>
        </div>
        <div class="text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php foreach ($products ?? null as $product): ?>
                    <?php /** @var $product \Src\Entities\Product */ ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong><?= $product->getId() ?></strong></td>
                        <td><img src="<?php asset('images/products/'.$product->getImage()); ?>" width="70px" alt=""></td>
                        <td><?= $product->getName() ?></td>
                        <td><?= number_format($product->getPrice()) ?>đ</td>
                        <td><?= $product->getCreatedAt() ?></td>
                        <td><?= $product->getUpdatedAt() ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/admin/product/edit/<?= $product->getId() ?>"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="#"
                                       onclick="document.getElementById('from-destroy-<?= $product->getId() ?>').submit()"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                                <form action="/admin/product/destroy" id="from-destroy-<?= $product->getId() ?>"
                                      method="post">
                                    <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($products) : ?>
    <div class="demo-inline-spacing d-flex justify-content-center navbar-detached rounded-3 bg-white mt-4">
        <!-- Basic Pagination -->
        <nav aria-label="Page navigation">
            <?php if (isset($counts)): ?>
                <?php $numPage = $counts/5; $currentPage =  $currentPage ?? null; ?>
                <ul class="pagination">
                    <li class="page-item first">
                        <a class="page-link" href="/admin/category"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    <?php if ($currentPage > 0): ?>
                        <li class="page-item prev">
                            <a class="page-link" href="/admin/category?page=<?=$currentPage-1?>"><i class="tf-icon bx bx-chevron-left"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 0;$i < $numPage;$i++ ) :?>

                        <li class="page-item <?= $currentPage === $i ? 'active' : ''?>">
                            <a class="page-link" href="/admin/product?page=<?=$i?>"><?=$i+1?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if ($currentPage < $numPage-1): ?>
                        <li class="page-item next">
                            <a class="page-link" href="/admin/category?page=<?=$currentPage+1?>"><i class="tf-icon bx bx-chevron-right"></i></a>
                        </li>
                    <?php endif; ?>
                    <li class="page-item last">
                        <a class="page-link" href="/admin/category?page=<?=$numPage-1?>"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                </ul>
            <?php endif; ?>
        </nav>
        <!--/ Basic Pagination -->
    </div>
    <?php endif; ?>
</div>
<?php require 'resources/views/admin/layouts/foot.php'; ?>
