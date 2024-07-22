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
                    $category = getById('categories', $id);

                    if(mysqli_num_rows($category) > 0){

                        $data = mysqli_fetch_array($category)
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>edit category</h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="category_id" value="<?= $data['id'] ?>" />
                                            <label>Name</label>
                                            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" placeholder="enter category name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>slug</label>
                                            <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control" placeholder="enter slug" />
                                        </div>
                                        <div class="col-md-12">
                                            <label>Description</label>
                                            <textarea rows="3" name="description" class="form-control" placeholder="enter description" ><?= $data['description']  ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>upload image</label>
                                            <input type="file" name="image" class="form-control" />
                                            <label>current image</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image'] ?>" />
                                            <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" style="object-fit: cover" alt ="image" />
                                        </div>
                                        <div class="col-md-12">
                                            <label>meta title</label>
                                            <input type="text" name="meta_title" value="<?= $data['meta_title']  ?>" class="form-control" placeholder="enter meta title" />
                                        </div>
                                        <div class="col-md-12">
                                            <label>meta description</label>
                                            <textarea rows="3" name="meta_description" class="form-control" placeholder="enter meta description" ><?= $data['meta_description']  ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>meta keyword</label>
                                            <textarea rows="3" name="meta_keywords" class="form-control" placeholder="enter meta keyword" ><?= $data['meta_keywords']  ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>status</label>
                                            <input type="checkbox" <?= $data['status'] ? "checked" : ""  ?> name="status"  />
                                        </div>
                                        <div class="col-md-6">
                                            <label>popular</label>
                                            <input type="checkbox" <?= $data['popular'] ? "checked" : ""  ?> name="popular"  />
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="update_category_btn">update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else{
                        echo "category not found";
                    }

                } else{
                    echo "id missing from url ";
                }
            ?>

        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
