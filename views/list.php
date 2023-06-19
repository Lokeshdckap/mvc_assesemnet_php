<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="card">
        <div class="card-header">
            <h4>Products Details</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>product_name</th>
                        <th>product_image</th>
                        <th>sku</th>
                        <th>price</th>
                        <th>brand</th>
                        <th>Available</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($details as $key => $detail):?>
                 <tr>
                        <td><?php echo $key+1?></td>
                        <td><?php echo $detail->product_name?></td>
                        <td><img src="<?php echo $detail->product_image?>" alt="" width="100px"></td>
                        <td><?php echo $detail->sku?></td>
                        <td><?php echo $detail->price?></td>
                        <td><?php echo $detail->brand?></td>
                        <td><?php if($detail->available_stock > 10):?>
                         <label class="badge bg-success">In stock</label>
                         <?php else:?>
                         <label class="badge bg-warning">Low Stock</label>
                         <br>
                         <?php endif;?>
                        </td>
                    <td>
                        <form method="post" action="/edit" enctype="multipart/form-data">
                        <button type="submit" value="<?=$detail->id;?>" name="edit" class="btn btn-warning">Edit</button>
                        </form>
                        <form method="post" action="/delete">
                        <button type="submit" value="<?=$detail->id;?>" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
               </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-success"><a href="/">Add new Product</a></button>
        </div>
    </div>
</body>