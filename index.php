<?php
    session_start();
    include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-12">
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
            <h1>hello world</h1>
            <button class="btn btn-primary">testing</button><br>

            <?php

                $string = "PHP is the web scripting language of php choice";

                $exp = preg_match_all("/php/i",$string,$array);

                if($exp){
                    echo "A match is found";
                } else{
                    echo "something wrong";
                }
                echo "<pre>";
                print_r($array);
                echo "</pre>";

            ?>
        </div>
    </div>
</div>


<?php include('includes/footer.php')?>