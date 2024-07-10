<?php
session_start();


if(isset($_SESSION['auth'])){
    $_SESSION['message'] = 'you are already loged in';
    header('Location:index.php');
    exit();
}

include('includes/header.php');

?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                    if(isset($_SESSION['message'])){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey</strong> <?=  $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Login Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="please enter email address" autocomplete="false">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="enter password" autocomplete="false">
                                </div>
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('includes/footer.php')?>