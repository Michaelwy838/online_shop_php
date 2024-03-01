<?php
require_once('partials/header.php');

if (isset($_GET['status'])) {
    $_SESSION['success'] = "Thank You For Shopping From Ntandy Foods, Your Order is Being worked on";
}
?>
<div class="container-fluid p-0 m-0">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="container-fluid bg-success text-light p-0 m-0">
            <p class="text-center py-3 m-0">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                // header('location: http://localhost/ntandy_foods')
                ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <p class="numbertext">The Real Taste of Snacks</p>
            <img src="images/shop.jpeg" style="width:100%">
            <div class="text"> SNACKING TIME <br>In All Leading Shops Country Wide</div>
        </div>

        <div class="mySlides fade">
            <p class="numbertext">The Real Taste of Snacks</p>
            <img src="images/pink.jpg" style="width:100%">
            <div class="text">CRUNCHY DADDIES<br>These Daddies are the best Countrywide </div>
        </div>

        <div class="mySlides fade">
            <p class="numbertext">The Real Taste of Snacks</p>
            <img src="images/break.jpg" style="width:100%">
            <div class="text">TASTE IT<br>Indeed the real taste of snacks</div>
        </div>
        <div class="dots" style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot active"></span>
        </div>
    </div>
    <br>


    <div class="container">
        <div class="row justify-content-center my-4 h4">
            Featured Products
        </div>
        <div class="row g-2 justify-content-center">
            <div class="col-md-6">
                <div class="card px-0 mx-0 overflow-hidden">
                    <div class="head border-bottom justify-content-center text-light py-2">
                        <h5 class="text-center">Potato Crisps</h5>
                    </div>
                    <div class="card-body px-0">
                        <div class="card-img-center border-bottom px-0 pb-3">
                            <a href="potato.php">
                                <img class="img-fluid mx-auto d-block" src="images/daddies.jpg" alt="" srcset="">
                            </a>
                        </div>

                    </div>
                    <div class="cardlinks card-text text-center p-0">
                        <a class="add d-block text-light py-2 m-0" href="shop.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Start Shopping</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card px-0 mx-0 overflow-hidden">
                    <div class="head border-bottom justify-content-center text-light py-2">
                        <h5 class="text-center">Gonja Crisps</h5>
                    </div>
                    <div class="card-body px-0">
                        <div class="card-img-center border-bottom px-0 pb-3">
                            <a href="gonja.php">
                                <img class="img-fluid mx-auto d-block" src="images/daddies.jpg" alt="" srcset="">
                            </a>
                        </div>

                    </div>
                    <div class="cardlinks card-text text-center p-0">
                        <a class="add d-block text-light py-2 m-0" href="shop.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Start Shopping</a>
                    </div>
                </div>
                </di </div>
            </div>
            <div class="container row row-g-2 mx-auto mt-5">
                <div class="relative col-lg-3 mb-4">
                    <div class="d-none d-md-block mb-2 emp">
                    </div>
                    <span><i class="fa fa-clock-o" aria-hidden="true" style="color: green; font-size: 30px;"></i></span>
                    <h4>On Time Deliveries</h4>
                    Get your order delivered to your doorstep in the shortest time from Ntandy Foods.
                </div>
                <div class="relative col-lg-3 mb-4">
                    <div class="d-none d-md-block mb-2 emp">
                    </div>
                    <span><i class="fa fa-gift" aria-hidden="true" style="color: green; font-size: 30px;"></i></span>
                    <h4>Best Prices & Offers</h4>
                    Best and unbeatable prices plus offers.
                </div>

                <div class="relative col-lg-3 mb-4">
                    <div class="d-none d-md-block mb-2 emp">
                    </div>
                    <span><i class="fa-solid fa-truck-fast" style="color: green; font-size: 30px;"></i></span>
                    <h4>Delivery</h4>
                    Have your Ntandy snacks delivered to your doorstep at no extra cost.
                </div>

                <div class="relative col-lg-3 mb-4">
                    <div class="d-none d-md-block mb-2 emp">
                    </div>
                    <span><i class="fa fa-archive" aria-hidden="true" style="color: green; font-size: 30px;"></i></span>
                    <h4>wide variety</h4>
                    Choose from a wide catalogue of products.
                </div>
            </div>

        </div>
    </div>
</div>
<?php
require_once('partials/footer.php');
?>