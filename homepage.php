<?php 
session_start();
$conn=mysqli_connect("localhost","root","","food")or die("Can't Connect...");
$_SESSION['id']= uniqid();
$_SESSION['status']= true;


    
?>
<!DOCTYPE html>
<html lang="en">

<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Soup - Restaurant with Online Ordering System</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

<!-- CSS Plugins -->
<link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick.css" />
<link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css" />
<link rel="stylesheet" href="assets/plugins/animsition/dist/css/animsition.min.css" />

<!-- CSS Icons -->
<link rel="stylesheet" href="assets/css/themify-icons.css" />
<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="assets/css/themes/theme-beige.min.css" />

</head>

<body>

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title">
                <h5 class="title">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content">
                <table class="table-cart">

<?php
            // connect to the database
              $mysqli = mysqli_connect("localhost", "root", "", "food");

            // number of results to show per page
            $per_page = 500;

            $unid = $_SESSION['id'];
            $subtot=0;
            $del=0;
            $tot=0;
            $total_results=0;


            // figure out the total pages in the database
            if ($result = $mysqli->query("SELECT * FROM cart WHERE id='$unid' "))
            {
            if ($result->num_rows > 0)
            {
            $total_results = $result->num_rows;
            // ceil() returns the next highest integer value by rounding up value if necessary
            $total_pages = ceil($total_results / $per_page);

            // check if the 'page' variable is set in the URL (ex: viewpg.php?page=1)
            if (isset($_GET['page']) && is_numeric($_GET['page']))
            {
            $show_page = $_GET['page'];

            // make sure the $show_page value is valid
            if ($show_page > 0 && $show_page <= $total_pages)
            {
            $start = ($show_page -1) * $per_page;
            $end = $start + $per_page;
            }
            else
            {
            // error - show first set of results
            $start = 0;
            $end = $per_page;
            }
            }
            else
            {
            // if page isn't set, show first set of results
            $start = 0;
            $end = $per_page;
            }

            // display data in table
            //echo "<table  cellpadding='10'>";
            //echo "<tr> <th>ID</th> <th>Event Name</th> <th>College</th> <th>District</th> <th></th> <th></th></tr>";

            // loop through results of database query, displaying them in the table
            for ($i = $start; $i < $end; $i++)
            {
            // make sure that PHP doesn't try to show results that don't exist
            if ($i == $total_results) { break; }

            // find specific row
            $result->data_seek($i);
            $row = $result->fetch_row();

            
            $subtot= $subtot + $row[5];
            $del=50;
            $tot=$subtot + $del ;
           

            // echo out the contents of each row into a table
            //echo "<tr>";
            ?>   

                    <tr>
                        <td class="title">
                            <span class="name"><a href="#productModal" data-toggle="modal"><?php echo $row[2] ; ?></a></span>
                            <span class="caption text-muted"><?php echo $row[3] ; ?></span>
                        </td>
                        <td class="price"><?php echo $row[4] ; ?></td>
                        <td class="price">Rs.<?php echo $row[5] ; ?></td>
                        <td class="actions">
                            <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                            <a href="process_cart.php?id=<?php echo $row[0] ; ?>" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>

<?php
            
}
}
}
// close database connection
            $mysqli->close();
            ?>

                </table>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>Rs.<?php echo $subtot ; ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Delivery:</div>
                        <div class="col-5"><strong>Rs.<?php echo $del ; ?></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>Rs.<?php echo $tot ; ?></strong></div>
                    </div>
                </div>
            </div>
        </div>
        <a href="checkout.php" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
    </div>
<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
                        <a href="index.php">
                            <img src="assets/img/logo-light.svg" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li><a href="index.php">Home</a></li>
                            <li class="has-dropdown">
                                <a href="#">About</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="services.php">Services</a></li>
                                        <li><a href="gallery.php">Gallery</a></li>
                                        <li><a href="reviews.php">Reviews</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="assets/img/photos/dropdown-about.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="offer.php">Offers</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li class="has-dropdown">   
                                <a href="#">More</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">                                  
                                        <li><a href="book-a-table.php">Book a table</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="confirmation.php">Confirmation</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="assets/img/photos/dropdown-more.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="module left" >
                        <a href="menu.php" class="btn btn-outline-secondary"><span>Order</span></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification"><?php echo $total_results;  ?></span>
                        </span>
                        <span class="cart-value">Rs.<?php echo $tot;  ?></span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>    

        <div class="module module-logo">
            <a href="index.php">
                <img src="assets/img/logo-horizontal-dark.svg" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification"><?php echo $total_results;  ?></span>
        </a>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">

        <!-- Section - Main -->
        <!-- Section - Main -->
        <section class="section section-main section-main-1 bg-light">
            
            <div class="container dark">
                <div class="slide-container">
                    <div id="section-main-1-carousel-image" class="image inner-controls">
                        <div class="slide"><div class="bg-image"><img src="assets/img/photos/slider-pasta.jpg" alt=""></div></div>
                        <div class="slide"><div class="bg-image"><img src="assets/img/photos/slider-burger.jpg" alt=""></div></div>
                        <div class="slide"><div class="bg-image"><img src="assets/img/photos/slider-dessert.jpg" alt=""></div></div>
                    </div>
                    <div class="content dark">
                        <div id="section-main-1-carousel-content">
                            <div class="content-inner">
                                <h4 class="text-muted">New product!</h4>
                                <h1>Bigoli Pasta</h1>
                                <div class="btn-group">
                                    <a href="#productModal" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Add to cart</span></a>
                                    <span class="price price-lg">Rs.90</span>
                                </div>
                            </div>
                            <div class="content-inner">
                                <h1>Get 10% off coupon</h1>
                                <h5 class="text-muted mb-5">and use it with your next order!</h5>
                                <a href="offer.php" class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
                            </div>
                            <div class="content-inner">
                                <h1>Delicious Desserts</h1>
                                <h5 class="text-muted mb-5">Order it online even now!</h5>
                                <a href="menu.php" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                            </div>
                        </div>
                        <nav class="content-nav">
                            <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
                            <a class="next" href="#"><i class="ti-arrow-right"></i></a>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
        <!-- Section - About -->
        <section class="section section-bg-edge">

            <div class="image right col-md-6 push-md-6">
                <div class="bg-image"><img src="assets/img/photos/bg-food.jpg" alt=""></div>
            </div>
        
            <div class="container">
                <div class="col-lg-5 col-md-9">
                    <div class="rate mb-5 rate-lg"><?php 

                    for ($i=0; $i < 5; $i++) { 
                      echo  "<i class='fa fa-star active'></i>";
                    }

                      ?></div>
                    <h1>The best food in Your Place!</h1>
                    <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
                    <div class="blockquotes">
 <?php
            // connect to the database
              $mysqli = mysqli_connect("localhost", "root", "", "food");

            // number of results to show per page
            $per_page = 10;

            // figure out the total pages in the database
            if ($result = $mysqli->query("SELECT * FROM soup_review ORDER BY id Desc"))
            {
            if ($result->num_rows != 0)
            {
            $total_results = $result->num_rows;
            // ceil() returns the next highest integer value by rounding up value if necessary
            $total_pages = ceil($total_results / $per_page);

            // check if the 'page' variable is set in the URL (ex: viewpg.php?page=1)
            if (isset($_GET['page']) && is_numeric($_GET['page']))
            {
            $show_page = $_GET['page'];

            // make sure the $show_page value is valid
            if ($show_page > 0 && $show_page <= $total_pages)
            {
            $start = ($show_page -1) * $per_page;
            $end = $start + $per_page;
            }
            else
            {
            // error - show first set of results
            $start = 0;
            $end = $per_page;
            }
            }
            else
            {
            // if page isn't set, show first set of results
            $start = 0;
            $end = $per_page;
            }

            // display data in table
            //echo "<table  cellpadding='10'>";
            //echo "<tr> <th>ID</th> <th>Event Name</th> <th>College</th> <th>District</th> <th></th> <th></th></tr>";

            // loop through results of database query, displaying them in the table
            for ($i = $start; $i < $end; $i++)
            {
            // make sure that PHP doesn't try to show results that don't exist
            if ($i == $total_results) { break; }

            // find specific row
            $result->data_seek($i);
            $row = $result->fetch_row();

            if ($i % 2 ==0){
                $bg= "light";
            }else{
                $bg= "dark";

            }

            $background = $bg;

            // echo out the contents of each row into a table
            //echo "<tr>";
            ?>                         

                        
                        <!-- Blockquote -->
                        <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                            <div class="blockquote-content <?php echo $background ?>">
                                <div class="rate rate-sm mb-3"><?php 

                    for ($a=0; $a < $row[2]; $a++) { 
                      echo  "<i class='fa fa-star active'></i>";
                    }

                      ?></div>
                                <p><?php echo $row[1] ?></p>
                            </div>
                            <footer>
                                <img src="assets/img/avatars/avatar04.jpg" alt="">
                                <span class="name"><?php echo $row[3] ?><span class="text-muted">, <?php echo $row[4] ?></span></span>
                            </footer>
                        </blockquote>


        <?php
            
}
}
}
// close database connection
            $mysqli->close();
            ?> 

                    </div>
                </div>
            </div>

        </section>

        <!-- Section - Steps -->
        <section class="section section-extended right dark">

            <div class="container bg-dark">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2"><a href="menu.php">Pick a dish</a></h4>
                                <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Make a payment</h4>
                                <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                            <div class="feature-content">
                                <h4 class="mb-2">Recieve your food!</h4>
                                <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Section - Menu -->
        <section class="section pb-0 protrude">

            <div class="container">
                <h1 class="mb-6">Our menu</h1>
            </div>

            <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Soup">
                        <img src="assets/img/photos/menu-sample-soup.jpeg" alt="" class="image">
                        <h3 class="title">Soup</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Burgers">
                        <img src="assets/img/photos/menu-sample-burgers.jpg" alt="" class="image">
                        <h3 class="title">Burgers</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Pizza">
                        <img src="assets/img/photos/menu-sample-pizza.jpg" alt="" class="image">
                        <h3 class="title">Pizza</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Non-veg">
                        <img src="assets/img/photos/menu-sample-nv.jpg" alt="" class="image">
                        <h3 class="title">Non-Veg</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Pasta">
                        <img src="assets/img/photos/menu-sample-pasta.jpg" alt="" class="image">
                        <h3 class="title">Pasta</h3>
                    </a>
                </div>
                <!-- Menu Sample -->
                <div class="menu-sample">
                    <a href="menu.php#Desserts">
                        <img src="assets/img/photos/menu-sample-dessert.jpg" alt="" class="image">
                        <h3 class="title">Desserts</h3>
                    </a>
                </div>
            </div>

        </section>

        <!-- Section - Offers -->
        <section class="section bg-light">

            <div class="container">
                <h1 class="text-center mb-6">Special offers</h1>
                <div class="carousel" data-slick='{"dots": true}'>
                   
 <?php
            // connect to the database
              $mysqli = mysqli_connect("localhost", "root", "", "food");

            // number of results to show per page
            $per_page = 3;

            // figure out the total pages in the database
            if ($result = $mysqli->query("SELECT * FROM soup_offers ORDER BY id DESC "))
            {
            if ($result->num_rows != 0)
            {
            $total_results = $result->num_rows;
            // ceil() returns the next highest integer value by rounding up value if necessary
            $total_pages = ceil($total_results / $per_page);

            // check if the 'page' variable is set in the URL (ex: viewpg.php?page=1)
            if (isset($_GET['page']) && is_numeric($_GET['page']))
            {
            $show_page = $_GET['page'];

            // make sure the $show_page value is valid
            if ($show_page > 0 && $show_page <= $total_pages)
            {
            $start = ($show_page -1) * $per_page;
            $end = $start + $per_page;
            }
            else
            {
            // error - show first set of results
            $start = 0;
            $end = $per_page;
            }
            }
            else
            {
            // if page isn't set, show first set of results
            $start = 0;
            $end = $per_page;
            }

            // display data in table
            //echo "<table  cellpadding='10'>";
            //echo "<tr> <th>ID</th> <th>Event Name</th> <th>College</th> <th>District</th> <th></th> <th></th></tr>";

            // loop through results of database query, displaying them in the table
            for ($i = $start; $i < $end; $i++)
            {
            // make sure that PHP doesn't try to show results that don't exist
            if ($i == $total_results) { break; }

            // find specific row
            $result->data_seek($i);
            $row = $result->fetch_row();

            // echo out the contents of each row into a table
            //echo "<tr>";
            ?>          



                <!-- Special Offer -->
                <div class="special-offer mb-5 animated" data-animation="fadeIn">
                    <img src="assets/img/photos/<?php echo $row[3] ?>" alt="" class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2"><?php echo $row[1] ?></h2>
                        <h5 class="text-muted mb-5"><?php echo $row[2] ?></h5>
                        <ul class="list-check text-lg mb-0">
                            <li class="<?php echo $row[4] ?>"><?php echo $row[5] ?></li>
                            <li class="<?php echo $row[6] ?>"><?php echo $row[7] ?></li>
                            <li class="<?php echo $row[8] ?>"><?php echo $row[9] ?></li>
                        </ul>
                    </div>
                </div>


 <?php
            
}
}
}
// close database connection
            $mysqli->close();
            ?> 

                </div>
            </div>

        </section>

        <!-- Section -->
        <section class="section section-lg dark bg-dark">

            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="assets/img/photos/bg-croissant.jpg" alt=""></div>
        
            <div class="container text-center">
                <div class="col-lg-8 push-lg-2">
                    <h2 class="mb-3">Check our promo video!</h2>
                    <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                    <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="https://www.youtube.com/embed/6ZfuNTqbHE8"></button>
                </div>
            </div>

        </section>


        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">
            
            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="index.php"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-muted">Latest news</h5>
                        <ul class="list-posts">
                            <li>
                                <a href="blog.html" class="title">How to create effective webdeisign?</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                            <li>
                                <a href="blog.html" class="title">Awesome weekend in Polish mountains!</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                            <li>
                                <a href="blog.html" class="title">How to create effective webdeisign?</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h5 class="text-muted">Subscribe Us!</h5>
                        <!-- MailChimp Form -->
                        <form action="#" id="sign-up-form" class="sign-up-form validate-form mb-3" method="POST">
                            <div class="input-group">
                                <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Tap your e-mail..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <span class="description">Subscribe</span>
                                        <span class="success">
                                            <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                        </span>
                                        <span class="error">Try again...</span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <h5 class="text-muted mb-3">Social Media</h5>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer 2nd Row -->
                <div class="footer-second-row">
                    <span class="text-muted">Copyright Startupmillenium 2018©. Made with love by Startupmillenium.</span>
                </div>
            </div>

            <!-- Back To Top -->
            <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

        </footer>
        <!-- Footer / End -->

    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    
    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="#">
                <img src="assets/img/logo-light.svg" alt="" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>
        <nav class="module module-navigation"></nav>
        <div class="module module-social">
            <h6 class="text-sm mb-3">Follow Us!</h6>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="assets/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-0">Boscaiola Pasta</h6>
                        <span class="text-muted">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$9.00</div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsSize" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panelDetailsSize" class="collapse show">
                        <div class="panel-details-content">
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Small - 100g ($9.99)</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Large - 350g ($21.99)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsAdditions" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panelDetailsAdditions" class="collapse">
                        <div class="panel-details-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsOther" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panelDetailsOther" class="collapse">
                        <textarea cols="30" rows="4" class="form-control" placeholder="Put this any other informations..."></textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-dismiss="modal"><span>Add to Cart</span></button>
        </div>
    </div>
</div>

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>

<!-- JS Plugins -->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="assets/plugins/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/jquery.localscroll/jquery.localScroll.min.js"></script>
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js"></script>
<script src="assets/plugins/twitter-fetcher/js/twitterFetcher_min.js"></script>
<script src="assets/plugins/skrollr/dist/skrollr.min.js"></script>
<script src="assets/plugins/animsition/dist/js/animsition.min.js"></script>

<!-- JS Core -->
<script src="assets/js/core.js"></script>

<!-- JS Stylewsitcher -->
<script src="styleswitcher/styleswitcher.js"></script>

</body>


</html>
