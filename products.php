<?php 

include('function/userFunction.php');
include('includes/header.php');

if(isset($_GET['catagory']))
{

    $category_slug = $_GET['catagory'];
    $category_data = getSlugActive("catagories",$category_slug);
    $category = mysqli_fetch_array($category_data);

    if($category)
    {
    $cid = $category['id'];

    ?>

    <div class="py-3 bg-primary">
        <div class="container">
            <h5 class="text-white">
                <a class="text-white text-decoration-none" href="index.php">Home /</a>
                <a class="text-white text-decoration-none" href="categories.php">Categories /</a>
                <?= $category['name'];?>
                <a href="categories.php" class="text-white text-decoration-none float-start">Back</a>
            </h5>
            
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $category['name'];?></h2>
                    <hr>
                    <div class="row">
                    <?php 
                        $products = getProByCategory($cid);

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2">
                                    <a class="text-decoration-none" href="product-view.php?product=<?= $item['slug'];?>">
                                            <div class="card shadow align-items-center">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" width="100px" height="90px">
                                                    <h4><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No data available!!";
                        }
                    ?>
                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php   
    }
    else
    {
        echo"Something Went Wrong!!!";
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
