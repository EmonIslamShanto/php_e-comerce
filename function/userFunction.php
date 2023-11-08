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

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();
}
?>