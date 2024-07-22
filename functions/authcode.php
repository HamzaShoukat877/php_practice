<?php
session_start();
include ('../config/dbcon.php');
include('myfunction.php');

if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']); // corrected spelling
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']); // corrected spelling

    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    // check if email is already exist
    if(mysqli_num_rows($check_email_query_run) > 0){
        redirect('../register.php',"Email already registered");
        exit();
    } else {
        if($password == $cpassword){
            $insert_query = "INSERT INTO users (name,email,phone,password) values ('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){
                redirect('../login.php',"Registered Successfully");
                exit();
            } else{
                redirect('../register.php',"Something went wrong");
                exit();
            }
        } else{
            redirect('../register.php',"Passwords do not match");
            exit();
        }
    }
} elseif(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password  = mysqli_real_escape_string($con, $_POST['password']); 

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as ;

        print_r($role_as);

        if($role_as == 1){
            redirect('../admin/index.php',"welcome to Dashboard");

        } else{
            redirect('../index.php',"Logged in successfully");
            exit();
        }

        
    } else {
        redirect('../login.php',"Invalid credentials");
        exit();
    }
}
?>
