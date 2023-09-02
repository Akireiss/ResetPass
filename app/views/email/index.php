<?php 
require '../components/header.php';
require '../email/IndexController.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="../email/IndexController.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="product" class="form-label">Product</label>
                            <input type="text" name="product" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">Buy Product</button>
                        </div>
                    </form>
                    <div><?php echo $message; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>









