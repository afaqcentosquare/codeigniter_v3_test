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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Count of all active and verified users.</h4>
                        <p class="card-text"><?php echo $data['active_count'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Count of active and verified users who have attached active products.</h4>
                        <p class="card-text"><?php echo $data['attached_product_user_count'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Count of all active products (just from products table).</h4>
                        <p class="card-text"><?php echo $data['active_products'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Count of active products which don't belong to any user.</h4>
                        <p class="card-text"><?php echo $data['non_attach_products'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quantity Ordered of all active attached products.</h4>
                        <p class="card-text"><?php echo $data['total_quantity_attach_products'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Amount of all active attached products.</h4>
                        <p class="card-text"><?php echo $data['total_amount_of_attach_products'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo site_url('index.php/admin/product/create');?>" class="btn btn-primary">Add Product</a>
    </div>

    <div class="container mt-3">
  <h2>Product Table</h2>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Total Price (USD)</th>
        <th>Total Price (EUR)</th>
        <th>Total Price (RON)</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($data['product_info_by_user'] as $product) { ?>
      <tr>
        <td><?php echo $product['name'] ?></td>
        <td><?php echo $product['total_price'] ?></td>
        <td><?php echo convertCurrency("EUR",$product['total_price']) ?></td>
        <td><?php echo convertCurrency("RON",$product['total_price']) ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>