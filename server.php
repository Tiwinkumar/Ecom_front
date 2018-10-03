<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Soup' ";
  $result = mysqli_query($conn, $sql);
  $comments = '               <div id="Soup" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuSoupContent" data-toggle="collapse" aria-expanded="true">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-soup.jpeg" alt=""></div>
                                <h2 class="title">Soup</h2>
                            </div>
                            <div id="menuSoupContent" class="menu-category-content collapse show">'; 
  while ($row = mysqli_fetch_array($result)) {
    $comments .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $comments .= '</div>

                        </div>';
                        $conn->close();
            
?>
<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Pizza' ";
  $result = mysqli_query($conn, $sql);
  $pizza= '               <div id="Pizza" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuPizzaContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-pizza.jpg" alt=""></div>
                                <h2 class="title">Pizza</h2>
                            </div>
                            <div id="menuPizzaContent" class="menu-category-content collapse">'; 
  while ($row = mysqli_fetch_array($result)) {
    $pizza .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $pizza.= '</div>

                        </div>';
                        $conn->close();
            
?>

<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Burger' ";
  $result = mysqli_query($conn, $sql);
  $burger= '               <div id="Burgers" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-burgejpg" alt=""></div>
                                <h2 class="title">Burgers</h2>
                            </div>
                            <div id="menuBurgersContent" class="menu-category-content collapse">'; 
  while ($row = mysqli_fetch_array($result)) {
    $burger .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $burger.= '</div>

                        </div>';
                        $conn->close();
            
?>

<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Non-veg' ";
  $result = mysqli_query($conn, $sql);
  $nv= '               <div id="Non-veg" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menunvContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-sushi.jpg" alt=""></div>
                                <h2 class="title">Non-Veg</h2>
                            </div>
                            <div id="menunvContent" class="menu-category-content collapse">'; 
  while ($row = mysqli_fetch_array($result)) {
    $nv .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $nv.= '</div>

                        </div>';
                        $conn->close();
            
?>

<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Pasta' ";
  $result = mysqli_query($conn, $sql);
  $pasta= '               <div id="Pasta" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menupastaContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-pasta.jpg" alt=""></div>
                                <h2 class="title">Pasta</h2>
                            </div>
                            <div id="menupastaContent" class="menu-category-content collapse">'; 
  while ($row = mysqli_fetch_array($result)) {
    $pasta .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $pasta.= '</div>

                        </div>';
                        $conn->close();
            
?>

<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'food');
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  
  // Retrieve comments from database
  $sql = "SELECT * FROM add_soup WHERE item_category='Desserts' ";
  $result = mysqli_query($conn, $sql);
  $desserts= '              <div id="Desserts" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuDessertsContent" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image"><img src="assets/img/photos/menu-title-desserts.jpg" alt=""></div>
                                <h2 class="title">Desserts</h2>
                            </div>
                            <div id="menuDessertsContent" class="menu-category-content collapse">'; 
  while ($row = mysqli_fetch_array($result)) {
    $desserts .= '
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h6 class="mb-0 nam" id="nam">'. $row[1] .'</h6>
                                            <span class="text-muted text-sm cate" id="cate">'. $row[3] .'</span>
                                        </div>
                                        <div class="col-sm-6 text-sm-right">
                                        <p class="mb-0 nam" id="nam" style="visibility:hidden;">'. $row[1] .'</p>
                                            <span class="text-muted text-sm cate" id="cate" style="visibility:hidden;">'. $row[3] .'</span>
                                            <span class="text-md mr-4 item_rate">'. $row[4] .'</span>
                                            <button class="btn btn-outline-secondary btn-sm addtocart" data-target="#productModal" data-toggle="modal" data-id="' . $row[0] . '"><span>Add to cart</span></button>
                                        </div>
                                    </div>
                                </div>';
  }
  $desserts.= '</div>

                        </div>';
                        $conn->close();
            
?>