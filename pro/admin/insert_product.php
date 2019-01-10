<?php
require "../server/functions.php";
?>
require_once "db_connection.php";
if(isset($_POST['insert_pro'])){
//getting text data from the fields
$pro_title = $_POST['pro_title'];
$pro_cat = $_POST['pro_cat'];
$pro_brand = $_POST['pro_brand'];
$pro_price = $_POST['pro_price'];
$pro_desc = $_POST['pro_desc'];
$pro_keywords = $_POST['pro_keywords'];
//getting image from the field
$pro_image = $_FILES['pro_image']['name'];
$pro_image_tmp = $_FILES['pro_image']['tmp_name'];
move_uploaded_file($pro_image_tmp,"product_images/$pro_image");
$insert_product = "insert into products (pro_cat, pro_brand,pro_title,pro_price,pro_desc,pro_image,pro_keywords)
VALUES ('$pro_cat','$pro_brand','$pro_title','$pro_price','$pro_desc','$pro_image','$pro_keywords');";
$insert_pro = mysqli_query($con, $insert_product);
if($insert_pro){
header("location: ".$_SERVER['PHP_SELF']);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    @@ -20,7 +40,7 @@
<body>
<div class="container">
    <h1 class="text-center my-4"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span> Product </h1>
    <form>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
                    <label for="pro_title" class="float-md-right"> <span class="d-sm-none d-md-inline"> Product </span> Title:</label>
                    @@ -43,12 +63,15 @@
                </div>
                <select class="form-control" id="pro_cat" name="pro_cat">
                    <option>Select Category</option>
                    <?php getCats2(); ?>
                    <!--                        <option>Mobile</option>-->
                    <!--                        <option>Laptop</option>-->
                    <!--                        <option>Tablet</option>-->
                    <!--                        <option>Watch</option>-->
                    <!--                        <option>Camera</option>-->
                    <?php
                    $getCatsQuery = "select * from categories";
                    $getCatsResult = mysqli_query($con,$getCatsQuery);
                    while($row = mysqli_fetch_assoc($getCatsResult)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                    ?>
                </select>
            </div>
</div>
@@ -64,13 +87,15 @@
</div>
<select class="form-control" id="pro_brand" name="pro_brand">
    <option>Select Brand</option>
    <?php getBrands2(); ?>
    <!--                        <option>Apple</option>-->
    <!--                        <option>Samsung</option>-->
    <!--                        <option>Oppo</option>-->
    <!--                        <option>Dell</option>-->
    <!--                        <option>HP</option>-->
    <!--                        <option>Sony</option>-->
    <?php
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<option value='$brand_id'>$brand_title</option>";
    }
    ?>
</select>
</div>
</div>
@@ -82,7 +107,7 @@
<div class="input-group-prepend">
    <div class="input-group-text"><i class="far fa-image"></i></div>
</div>
<input class="form-control" type="file" id="pro_img" name="pro_img">
<input class="form-control" type="file" id="pro_image" name="pro_image">
</div>
</div>
</div>
@@ -106,7 +131,7 @@
<div class="input-group-prepend">
    <div class="input-group-text"><i class="fas fa-key"></i></div>
</div>
<input class="form-control" type="text" id="pro_kw" name="pro_kw" placeholder="Enter Product Keywords">
<input class="form-control" type="text" id="pro_keywords" name="pro_keywords" placeholder="Enter Product Keywords">
</div>
</div>
</div>
@@ -126,10 +151,11 @@
<div class="row my-3">
    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Now </button>
        <button type="submit" name="insert_pro" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Now </button>
    </div>
</div>
</form>
</div>
</body>
</html>
</html>