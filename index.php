<?php
require("includes/common.php");

// Redirects the user to products page if he/she is logged in.
if (isset($_SESSION['email'])) {
  header('location: products.php?cat=all-products');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .image-size{
                height: 50%;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Global Solutions</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px;">
        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--Header end-->

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <h1>LEADING CONSTRUCTION BUILDING CHEMICALS</h1>
                            <p>We protect your constructed building & home.
                                Waterproofing Solutions, Admixtures & Grouting, Repairs/Rehabilitation and many more solutions we provide.
                            </p>
                            <br/>
                            <a  href="products.php?cat=all-products" class="btn btn-danger btn-lg active">Shop Now</a>
                        </div>
                    </center>
                </div>
            </div>
            <!--Main banner image end-->

            <!--Item categories listing-->
            <div class="container" id=item-list>
                <?php
                    $stmt = "Select * from `category`";
                    $result = mysqli_query($con, $stmt) or die($mysqli_error($con));
                    $num_items = mysqli_num_rows($result);
                        $count=3;
                        while ($row = mysqli_fetch_array($result)){
                            $count= ($count==3) ? 1 : $count+1;
                            if($count==1){
                                echo "<div class='row text-center category-row'>";
                            }
                            echo "
                            <div class='col-sm-4'>
                            <a href=". 'products.php?cat='.$row["cat_slug"]. ">
                                <div class='thumbnail'>
                                <div class='image-size'>
                                    <img src=".$row["image"]." alt=''>
                                </div>    
                                    <div class='caption'>
                                        <h3>".$row["name"]."</h3>
                                    </div>
                                </div> 
                            </a>
                        </div>
                            ";
                        if($count==3){
                            echo "</div>";
                        }
                        }
                ?>
                </div>
                    </div>
        <!--Footer-->
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
   
    </body> 
</html>