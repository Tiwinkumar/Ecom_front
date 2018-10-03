<?php 
session_start();
$conn=mysqli_connect("localhost","root","","food")or die("Can't Connect...");
    
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

<body data-spy="scroll" data-target="#side-navigation" data-offset="70">

<!-- Body Wrapper -->

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

            
            $mul = $row[4] * $row[5] ;
            $subtot= $subtot + $mul;
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
            <a href="index.html">
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

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="bg-image bg-parallax"><img src="assets/img/photos/bg-desk.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">FAQ</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Side Navigation -->
                        <nav id="side-navigation" class="stick-to-content pt-4" data-local-scroll>
                            <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Pick a content:</h5>
                            <ul class="nav nav-vertical">
                                <li class="nav-item">
                                    <a href="#faq1" class="nav-link">General</a>
                                    <ul>
                                        <li class="nav-item"><a href="#faq1_1" class="nav-link">How does it work?</a></li>
                                        <li class="nav-item"><a href="#faq1_2" class="nav-link">How long does it take?</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#faq2" class="nav-link">Delivery</a>
                                    <ul>
                                        <li class="nav-item"><a href="#faq2_1" class="nav-link">How does it work?</a></li>
                                        <li class="nav-item"><a href="#faq2_2" class="nav-link">How long does it take?</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#faq3" class="nav-link">Payments</a>
                                    <ul>
                                        <li class="nav-item"><a href="#faq3_1" class="nav-link">How does it work?</a></li>
                                        <li class="nav-item"><a href="#faq3_2" class="nav-link">How long does it take?</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-8 push-md-1">
                        <div id="faq1">
                            <h3><i class="ti ti-file mr-4 text-primary"></i>General info</h3>
                            <hr>
                            <div id="faq1_1" class="pb-5">
                                <h4>How does it work?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                            <div id="faq1_2" class="pb-5">
                                <h4>How long does it take?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                        </div>
                        <div id="faq2">
                            <h3><i class="ti ti-package mr-4 text-primary"></i>Delivery</h3>
                            <hr>
                            <div id="faq2_1" class="pb-5">
                                <h4>How does it work?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                            <div id="faq2_2" class="pb-5">
                                <h4>How long does it take?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                        </div>
                        <div id="faq3">
                            <h3><i class="ti ti-wallet mr-4 text-primary"></i>Payments</h3>
                            <hr>
                            <div id="faq3_1" class="pb-5">
                                <h4>How does it work?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                            <div id="faq3_2" class="pb-5">
                                <h4>How long does it take?</h4>
                                <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                                <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">
            
            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="index.html"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
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
