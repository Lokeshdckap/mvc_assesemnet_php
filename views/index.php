<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>

    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<link rel="stylesheet" href="custom.css">
</head>
<body>
<div class="card">
<div class="card-header">
    <h4>Add Products</h4>
</div>
<div class="card-body">
    <form action="/store" method="POST" enctype="multipart/form-data" id="form">
        <div class="row">
        <?php if(isset($_SESSION['All Field is required'])): ?>
            <p><?php echo $_SESSION['All Field is required'];?></p>
        <?php endif;?>
            <div class="col-md-6">
                <label for="product_name">product_name</label>
                <input type="text" class="form-control product_name" name="product_name">
        </div>
            <div class="col-md-6">
                <label for="product_image">product_image</label>
                <input type="file" class="form-control product_image" name="product_image">
                <p></p>
            </div>
            <div class="w-full max-w-md space-y-8">
        <?php if(isset($_SESSION['SKU Already Exists'])): ?>
                <span><?php echo $_SESSION['SKU Already Exists'];?></span>
        <?php endif;?>
            <div class="col-md-6">
                <label for="sku">sku id</label>
                <input type="text" class="form-control sku" name="sku">
            </div>
            <p></p>            
            <div class="col-md-6">
            <label for="price">price</label>
            <input type="number" class="form-control price" name="price" min="0">
            </div>
            <p></p>
            <select class="form-select brand" name="brand">
                            <option value="">Select a Brand</option>
                            <option value="LG">LG</option>
                            <option value="Whirlpool">Whirlpool</option>
                            <option value="TATA">TATA</option>
                            <option value="Samsung">Samsung</option>
            </select>
            <p></p>
            <div class="col-md-6">
                <label for="manufacture_date">manufacture_date</label>
                <input type="date" id="txtDate" min="<?php echo date("Y-m-d"); ?>" name="manufacture_date" class="form-control manufacture_date">
             </div>
            <p></p>
            <div class="col-md-6">
            <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" class="form-control stock" name="stock" min="0">
            </div>
            <p></p>
            <div class="col-md-12 py-10">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-warning"><a href="/list">Product-details</a></button>
            </div>
        </div>
    </form>
</div>
</div>
<script src="index.js"></script>
</body>
</html>
