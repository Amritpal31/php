<?php require("includes/common.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include("includes/header.php"); 
        include('includes/check-if-added.php');
    ?>
    <div class="container">
    <h2>Search Results</h2>
        <?php
            $key = $_GET["keyword"];
            $stmt = "Select *, id as item_id from `items` where name like '%".$key."%'";
            $result = mysqli_query($con, $stmt) or die(mysqli_error($con));
            $num_rows = mysqli_num_rows($result);
            if ($num_rows){
                $count = 4;
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
                echo "<div class='container row' style='margin-bottom:287px;'>
                    </hr>
                    <h3>No Results Found!</h3>
                    </hr>    
                </div>";
            }
        ?>
        </div>
    <?php include("includes/footer.php") ?>
</body>
</html>