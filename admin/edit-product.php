<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>


<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $product = getById("products",$id);

                if(mysqli_num_rows($product) > 0){

                    $data = mysqli_fetch_array($product)

                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit products</h4>
                        </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0">Select category</label>
                                    <select name="category_id" class="form-select mb-2">
                                        <option selected>Select Category</option>
                                        <?php
                                        $categories = getAllData("categories");

                                        if(mysqli_num_rows($categories) > 0){
                                            foreach ($categories as $category) {
                                                ?>
                                                <option value="<?= $category['id'] ?>" <?= $data['category_id'] == $category['id'] ? "selected" : "" ?> ><?= $category['name'] ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "No Category available";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>" />
                                <div class="col-md-6">
                                    <label class="mb-0">Name</label>
                                    <input type="text" name="name" value=<?= $data['name'] ?> required class="form-control mb-2" placeholder="enter product name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">slug</label>
                                    <input type="text" name="slug" value=<?= $data['slug'] ?> required class="form-control mb-2" placeholder="enter slug" />
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Small Description</label>
                                    <textarea rows="3" name="small_description" required class="form-control mb-2" placeholder="enter Small description" ><?= $data['small_description'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Description</label>
                                    <textarea rows="3" name="description" required class="form-control mb-2" placeholder="enter description" ><?= $data['description'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">original price</label>
                                    <input type="text" name="original_price" value=<?= $data['original_price'] ?> required class="form-control mb-2" placeholder="enter original price" />
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">selling price</label>
                                    <input type="text" name="selling_price" value=<?= $data['selling_price'] ?> required class="form-control mb-2" placeholder="enter selling price" />
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">upload image</label>
                                    <input type="file" name="image" class="form-control mb-2" />
                                    <label class="mb-0">current image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>" />
                                    <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" style="object-fit: cover" alt ="image" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-0">Quantity</label>
                                        <input type="text" name="qty" required class="form-control mb-2" placeholder="enter Quantity " value=<?= $data['qty'] ?> />
                                    </div>
                                    <div class="col-md-3">
                                        <label>status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] == '0' ? '' : 'checked' ?>  />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? '' : 'checked' ?> />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">meta title</label>
                                    <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" required class="form-control mb-2" placeholder="enter meta title" />
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">meta description</label>
                                    <textarea rows="3" name="meta_description" required class="form-control mb-2" placeholder="enter meta description" ><?= $data['meta_description'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">meta keyword</label>
                                    <textarea rows="3" name="meta_keywords" required class="form-control mb-2" placeholder="enter meta keyword" ><?= $data['meta_keywords'] ?></textarea>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_product_btn">update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <?php
                } else{
                    echo "Product not found";
                }
            } else{
                echo "ID missing from url";
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
