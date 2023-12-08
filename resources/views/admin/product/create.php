<?php $title = 'Product | Create' ?>
<?php require 'resources/views/admin/layouts/head.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Create</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="/admin/product" class="btn btn-warning text-white ms-2">Cancel</a>
                    <button onclick="document.getElementById('btn-action-save').click();" type="submit"
                            class="btn btn-primary ms-2">Save
                    </button>

                </div>

                <div class="card-body">
                    <div class="text-center">
                        <img src="" id="img-preview" alt="preview" width="230" height="400">
                    </div>
                    <form action="/admin/product/store" id="form-create" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" accept="*/image/*" class="form-control" required id="image" name="image" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Laptop..">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required placeholder="100.000đ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description..."></textarea>
                        </div>
                        <button class="d-none" id="btn-action-save"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const img = document.getElementById('image');
    const imgPreview = document.getElementById('img-preview');

    img.onchange = function (e){
        file = img.files[0]

        image = URL.createObjectURL(file);
        imgPreview.src = image;
    }

    imgPreview.onclick = function (){
        img.click();
    }
</script>
<?php require 'resources/views/admin/layouts/foot.php'; ?>
