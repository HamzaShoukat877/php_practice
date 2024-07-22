<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>


<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>add products</h4>
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
                                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "No Category available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" required class="form-control mb-2" placeholder="enter product name" />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">slug</label>
                                <input type="text" name="slug" required class="form-control mb-2" placeholder="enter slug" />
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description" required class="form-control mb-2" placeholder="enter Small description" ></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" required class="form-control mb-2" placeholder="enter description" ></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">original price</label>
                                <input type="text" name="original_price" required class="form-control mb-2" placeholder="enter original price" />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">selling price</label>
                                <input type="text" name="selling_price" required class="form-control mb-2" placeholder="enter selling price" />
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">upload image</label>
                                <input type="file" name="image" class="form-control mb-2" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="text" name="qty" required class="form-control mb-2" placeholder="enter Quantity " />
                                </div>
                                <div class="col-md-3">
                                    <label>status</label>
                                    <input type="checkbox" name="status"  />
                                </div>
                                <div class="col-md-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending"  />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">meta title</label>
                                <input type="text" name="meta_title" required class="form-control mb-2" placeholder="enter meta title" />
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">meta description</label>
                                <textarea rows="3" name="meta_description" required class="form-control mb-2" placeholder="enter meta description" ></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">meta keyword</label>
                                <textarea rows="3" name="meta_keywords" required class="form-control mb-2" placeholder="enter meta keyword" ></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn"> save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
