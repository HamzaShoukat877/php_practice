<?php

include('../functions/myfunction.php');


if(isset($_SESSION['auth'])){
    if($_SESSION['role_as'] == 0){
        redirect('../index.php',"you are not authorized to access this page");
    }
} else{
    redirect('../login.php',"Login to continue");
}

?>