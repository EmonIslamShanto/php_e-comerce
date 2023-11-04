<?php 
session_start();
include('includes/header.php');?>
<?php
             if(isset($_SESSION['message']))
             { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong>Hey!</strong> <?= $_SESSION['message'];?></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                <?php
                unset($_SESSION['message']);
            }
            ?>

    <h1>Hello World</h1>

    <button class="btn btn-primary">Testing</button>

<?php include('includes/footer.php');?>
