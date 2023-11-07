<?php 

include('function/userFunction.php');
include('includes/header.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-white"><a class="text-white text-decoration-none" href="index.php">Home</a> / Categories</h5>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Categories</h1>
                <hr>
                <div class="row">
                <?php 
                    $categories = getAllActive("catagories");

                    if(mysqli_num_rows($categories) > 0)
                    {
                        foreach($categories as $item)
                        {
                            ?>
                                <div class="col-md-3 mb-2">
                                    <div class="card shadow align-items-center">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Category Image" width="100px" height="90px">
                                            <h4><?= $item['name']; ?></h4>
                                        </div>
                                    </div>
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
<?php include('includes/footer.php');?>
