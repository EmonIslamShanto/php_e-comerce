<?php
include('../config/dbcon.php');
if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

    if($password == $cpassword)
    {
        $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
        $insert_query_run = mysqli_query($con,$insert_query);

        if($insert_query_run)
        {
            $_SESSION['message'] = "Registration Succesfully Complete";
            header('Location: ../login.php');
        }
        else
        {
            $_SESSION['message'] = "Something went wrong";
            header('Location: ../register.php');
        }
    }
    else
    {
        $_SESSION['message'] = "Password do not match";
        header('Location: ../register.php');
    }
}


?>