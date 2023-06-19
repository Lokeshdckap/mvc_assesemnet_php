<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Edit</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="card">
<div class="card-header">
    <h4>Edit Product</h4>
</div>
<div class="card-body">
   <?php foreach($details as $detail):?>
    <form action="/update" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="product_name">product_name</label>
                <input type="text" class="form-control" name="product_name" value="<?=$detail->product_name;?>">
            </div>
            <div class="col-md-6">
            <label for="product_image">product_image</label>
            <?php if($detail->product_image==true):?>
                <img src="<?=$detail->product_image;?>" style="width: 100px">
                <?php else:?>
                <h2>No image uploaded</h2>
                <br>
            <?php endif;?>
            </div>
            <div class="col-md-6">
              <label for="product_image">product_image</label>
                <input type="file" class="form-control" name="product_image" value="<?=$detail->product_image;?>">
            </div>
            <div class="col-md-6">
                <label for="sku">sku id</label>
                <input type="text" class="form-control" name="sku" value="<?=$detail->sku;?>">
            </div>
            <div class="col-md-6">
                <label for="price">price</label>
                <input type="text" class="form-control" name="price" value="<?=$detail->price;?>">
            </div>
            <select class="form-select" name="brand">
                            <option value="<?=$detail->brand;?>"><?=$detail->brand;?></option>
                            <option value="LG">LG</option>
                            <option value="Whirlpool">Whirlpool</option>
                            <option value="TATA">TATA</option>
                            <option value="Samsung">Samsung</option>
                          </select>
            <div class="col-md-6">
                <label for="manufacture_date">manufacture_date</label>
                <input type="date" id="txtDate" min="<?php echo date("Y-m-d"); ?>" name="manufacture_date" class="form-control" value="<?=$detail->manufacture_date;?>">
            </div>
            <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" value="<?=$detail->available_stock;?>">
            </div>
            <div class="col-md-12 py-10">
            <button type="submit" class="btn btn-primary" value="<?=$detail->id;?>" name="update">Update</button>
            </div>
        </div>
    </form>
    <?php endforeach;?>
    <a href="/list" class="btn btn-primary py-7">BACK</a>
</div>
</div>
</body>
</html>