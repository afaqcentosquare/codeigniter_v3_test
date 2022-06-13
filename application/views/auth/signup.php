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
                    <form action="<?php echo site_url('index.php/register');?>" method="POST" class="row g-3">
                        <h4>Signup</h4>
                        <?php
                        echo $this->session->flashdata('is_register');
                        ?>
                        <div class="col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your full name">
                        </div>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Register</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Already have an account? <a href="<?php echo site_url('index.php/login');?>">Signin</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>