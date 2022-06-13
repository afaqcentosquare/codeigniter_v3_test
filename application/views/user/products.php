<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Product Table</h2>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($data as $product) { ?>
      <tr>
        <td><?php echo $product->title ?></td>
        <td><?php echo $product->description ?></td>
        <td><span class="badge <?php echo $product->status == 'active' ? 'bg-success' : 'bg-danger' ?>"><?php echo $product->status ?></span></td>
        <td>
            <a href="<?php echo site_url('index.php/user/order/'.$product->id);?>" class="btn btn-dark float-start me-3">Select Product</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
