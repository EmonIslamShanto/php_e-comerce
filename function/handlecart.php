<?php
session_start();
include('../config/dbcon.php');

if(isset($_SESSION['auth']))
{
    if(isset($_POST['scope']))
    $scope = $_POST['scope'];
    switch($scope)
    {
        case "add":
            $product_id = $_POST['product_id'];
            $product_qty = $_POST['product_qty'];

            $user_id = $_SESSION['auth_user']['user_id'];

            $check_cart = "SELECT * FROM carts WHERE product_id='$product_id' AND user_id='$user_id'";
            $check_cart_run = mysqli_query($con, $check_cart);

            if(mysqli_num_rows($check_cart_run) > 0)
            {
                echo "already";
            }
            else
            {
                $insert_query = "INSERT INTO carts (user_id, product_id, product_qty) VALUES ('$user_id','$product_id','$product_qty')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run)
                {
                    echo 201;
                }
                else
                {
                    echo 500;
                }              
            }

            break;

        default:
            echo 500;
    }
}
else
{
    echo 401;
}


?>