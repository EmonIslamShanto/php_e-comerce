<?php

session_start();
include('config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table where slug='$slug' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getProByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products where category_id='$category_id' AND status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getIdActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table where id='$id' AND status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.selling_prize FROM carts c, products p WHERE c.product_id=p.id AND c.user_id='$user_id' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();
}
?>