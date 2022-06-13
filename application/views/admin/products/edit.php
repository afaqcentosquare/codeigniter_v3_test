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
                    <form action="<?php echo site_url('index.php/admin/product/update/'.$data->id);?>" method="POST" class="row g-3">
                        <h4>Update Product</h4>
                        <?php
                        echo $this->session->flashdata('is_updated');
                        ?>
                        <div class="col-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $data->title?>" placeholder="Enter product title">
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Enter description here"><?php echo $data->description?></textarea>
                        </div>
                        <div class="col-12">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?php echo $data->status == 'active' ? 'selected' : ''?>>Active</option>
                                <option value="inactive" <?php echo $data->status == 'inactive' ? 'selected' : ''?>>InActive</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url('index.php/admin/product/index');?>" class="btn btn-dark float-start">Go to Product List</a>
                            <button type="submit" class="btn btn-dark float-end">Update</button>
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