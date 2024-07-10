<?php


include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>


<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>add category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="enter category name" />
                            </div>
                            <div class="col-md-6">
                                <label>slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="enter slug" />
                            </div>
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea rows="3" name="description" class="form-control" placeholder="enter description" ></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>upload image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="col-md-12">
                                <label>meta title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="enter meta title" />
                            </div>
                            <div class="col-md-12">
                                <label>meta description</label>
                                <textarea rows="3" name="meta_description" class="form-control" placeholder="enter meta description" ></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>meta keyword</label>
                                <textarea rows="3" name="meta_keywords" class="form-control" placeholder="enter meta keyword" ></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>status</label>
                                <input type="checkbox" name="status"  />
                            </div>
                            <div class="col-md-6">
                                <label>popular</label>
                                <input type="checkbox" name="popular"  />
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn"> save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
