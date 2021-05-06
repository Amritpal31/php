
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php">Global Solutions</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
            <li>
            <form class="navbar-form navbar-left" role="search" method="GET" action="search.php">
                <div class="form-group">
                    <input name="keyword" type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            </li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <?php
                        $stmt = "Select * from `category`";
                        $result = mysqli_query($con, $stmt) or die(mysqli_error($con));
                                    while ($row = mysqli_fetch_array($result)){
                                        echo "<li><a href=". 'products.php?cat='.$row["cat_slug"].">".$row["name"]."</a></li>";
                                    } 
                    ?>  
                    </ul>
                    </li>
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                    <li><a href = "settings.php"><span class = "glyphicon glyphicon-user"></span> Settings</a></li>
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
                    <?php
                } else {
                    ?>
                    
                    <!-- Signup options -->
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signup <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="signup.php">Customer Signup</a></li>
                      <li><a href="supplier/signup.php">Supplier Signup</a></li>
                    </ul>
                    </li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</div>