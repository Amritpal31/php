<?php
require("includes/common.php");
if (isset($_SESSION['admin'])){
    header('location:admin/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Global Solutions</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        <div class="container" id="content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
            <?php
                $cat = $_GET["cat"];
                if($cat=='all-products'){
                    echo "<h1>Welcome to global store</h1>
                    <p>Global Solutions is the leading suppliers of construction building chemicals and waterproofing solutions and authorized suppliers of top MNC barnds.</p>
                    ";
                }
                else{
                    $stmt = "Select * from `category` where `cat_slug`='$cat'";
                    $result = mysqli_query($con, $stmt) or die(mysqli_error($con));
                    $row = mysqli_fetch_array($result);
                    if(mysqli_num_rows($result)){
                        echo "<h1>Welcome to ".strtolower($row["name"]). " section. </h1>
                        <p>".$row["desc"]. "</p>
                        ";
                    }
                    else{
                        http_response_code(404);
                        header('location:404.php');
                        exit;
                    }
                    }
            ?>
            </div>
            <hr>

            <?php
                $count=4;
                if($cat=='all-products'){
                    $stmt = "Select *, id as item_id from items";
                }
                else{
                    $stmt = "SELECT items.id as item_id, items.name as name, items.price as price, items.photo as photo from category INNER join items on items.category_id = category.id where category.cat_slug = '$cat'";
                }
                $result = mysqli_query($con, $stmt) or die(mysqli_error($con));
                $num_rows = mysqli_num_rows($result);
                if($num_rows){
                    while($row = mysqli_fetch_array($result)){
                        $count = ($count==4) ? 1 : $count+1;
                        if($count==1){
                            echo "<div class='row text-center'>";
                        }
                        echo "<div class='col-md-3 col-sm-6 home-feature'>
                        <div class='thumbnail'>
                            <img src= ".$row['photo']. " alt=''>
                            <div class='caption'>
                                <h3>".$row['name']. "</h3>
                                <p>Price: $".$row["price"]. "</p>";
                                if (!isset($_SESSION['email'])) {
                                    echo "<p><a href='login.php' role='button' class='btn btn-primary btn-block'>Buy Now</a></p>";
                                }
                                else {
                                    //We have created a function to check whether this particular product is added to cart or not.
                                    if (check_if_added_to_cart($row["item_id"])) { //This is same as if(check_if_added_to_cart != 0)
                                        echo '<a href="" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                    } else {
                                        echo '<a href='."cart-add.php?id=".$row["item_id"]. ' name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>';
                                    }
                                }
                            echo "</div>
                        </div>
                    </div>
                        ";
                    if($count==4){
                        echo "</div>";
                    }
                    }
                }
                else{
                    echo "</hr>
                        <h3>Currently no product found in this category</h3>
                        <p>Please visit again after sometime</p>
                        </hr>
                    ";
                }
            ?>
            
        </div> 

        <?php include("includes/footer.php"); ?>
    </body>

</html>
