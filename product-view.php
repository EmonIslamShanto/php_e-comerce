<?php 

include('function/userFunction.php');
include('includes/header.php');

if(isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);

    if($product)
    {
        ?>
        <div class="py-3 bg-primary">
            <div class="container">
                <h5 class="text-white">
                    <a class="text-white text-decoration-none" href="index.php">Home /</a>
                    <a class="text-white text-decoration-none" href="index.php">Categories /</a>
                    <?= $product['name'];?>
                    <a href="categories.php" class="text-white text-decoration-none float-start">Back</a>
                </h5>
                
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">                       
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <h3 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-start text-danger"><?php if($product['trending']){echo"Tending";} ?></span>
                        </h3>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>TK <span class="text-success fw-bold"><?= $product['selling_prize']; ?></span></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>TK <s class="text-danger"><?= $product['original_prize']; ?></s></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <button class="btn btn-primary px-4"><i class="fa fa-shopping-cart me-2"> Add to cart</i></button>
                            </div>
                            <div class="col-md-5 mt-3">
                            <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"> Add to wishlistt</i></button>
                            </div>
                        </div>
                        <hr>
                        <h4>Product Description</h4>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else
    {
        echo"Product not found!!!";
    ?>

    <a href="categories.php" class="btn btn-primary float-start mt-2 ms-5">Back</a>
    <?php 
    }
}
else
{
    echo"Something Went Wrong!!!";
    ?>

    <a href="categories.php" class="btn btn-primary float-start mt-2 ms-5">Back</a>
    <?php 
}
include('includes/footer.php');?>
