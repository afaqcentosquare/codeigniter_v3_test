<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="<?php echo site_url('index.php/user/order/data/store');?>" method="POST" class="row g-3">
                        <h4>Order</h4>
                        <?php
                        echo $this->session->flashdata('is_created');
                        ?>
                        <input type="hidden" type="number" name="product_id" value="<?php echo $id ?>"/>
                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id')?>"/>
                        <div class="col-12">
                            <label>Enter Quantity</label>
                            <input type="number" min="1" name="quantity" class="form-control" placeholder="Enter quantity">
                        </div>
                        <div class="col-12">
                            <label>Price</label>
                            <input type="price" min="1" name="price" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>