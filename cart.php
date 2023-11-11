<?php 
include('function/userFunction.php');
include('includes/header.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-white"><a class="text-white text-decoration-none" href="index.php">Home</a> / cart
        <a href="index.php" class="text-white text-decoration-none float-start">Back</a>
        </h5>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="cil-md-12">
                    <div class="row align-item-center">
                        <div class="col-md-2 mb-2">
                            <h6>Producct Image</h6>
                        </div>
                        <div class="col-md-3 mb-2">
                            <h6>Producct Name</h6>
                        </div>
                        <div class="col-md-3 mb-2">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2 mb-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2 mb-2">
                            <h6>Action</h6>
                        </div>
                    </div>
                    <?php
                        $items = getCartItems();
                        foreach ($items as $citems)
                    {
                        ?>
                        <div class="card product_data shadow-sm mb-3">
                            <div class="row align-item-center">
                                <div class="col-md-2 mt-3">
                                    <img src="uploads/<?= $citems['image']?>" alt="Image" width="80px" height="50px">
                                </div>
                                <div class="col-md-3 mt-3 ">
                                    <h5><?= $citems['name']?></h5>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <h5><?= $citems['selling_prize']?></h5>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citems['product_qty']?>" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash ms-2"></i>Remove</button>
                                </div>
                            </div>                        
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
