<?php
require_once('partials/header.php');
require_once('config/db.php');
$sql = "SELECT * from products";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="container-fluid bg-success text-light py-0">
        <p class="text-center py-2">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </p>
    </div>
<?php endif; ?>
<div class="container-fluid my-0 mx-0 p-0">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error bg-danger text-light mb-0 py-2 mx-0">
            <p class="text-center">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </p>
        </div>
    <?php endif ?>
</div>
<div class="container">

    <div style="overflow: hidden;" class="carousel slide" data-bs-ride="carousel">
        <div class="cor carousel-inner">
            <div class="carousel-item active rounded">
                <div class="details ps-3">
                    <h1 class="text-light">Ntandy Foods Online Shop</h1>
                    <div class="lead text-light my-md-5">Unbeatable Offers And Prices Country wide</div>
                </div>
                <img src="images/shp1.jpg" class=" img-fluid d-block w-100">
            </div>
            <div class="carousel-item rounded">
                <div class="details ps-3">
                    <h1 class="text-light">In All SuperMarkets</h1>
                    <div class="lead text-light my-md-5">Get Your Ntandy's Snack At a Hands Reach In all the Leading Shops Around You </div>
                </div>
                <img src="images/shp2.jpg" class="img-fluid d-block w-100">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="h4 ms-3 pt-3">Popular Products</div>
</div>
<!-- <div class="container row g-2 justify-content-center mx-auto">
    <div class="cor col-12 col-lg-6">
        <div class="pop ps-3 mt-3">
            <h2>Potato Crisps</h2>
            <p>Comes in different flavours. <br> Made from organic materials.</p>
        </div>
        <a class="shop btn text-light bg-dark ms-3 px-3 py-1 mb-4" href="http://localhost/ntandy_foods/ntandy_foods_user/potato.php">Shop Now</a>
        <img src="../images/yell.jpg" class="d-block w-100 rounded">
    </div>
    <div class="cor col-12 col-lg-6">
        <div class="pop ps-3 mt-3">
            <h2>Gonja Crisps</h2>
            <p>Comes in different flavours. <br> Made from organic materials.</p>
        </div>
        <a class="shop btn text-light bg-dark ms-3 px-3 py-1 mb-4" href="http://localhost/ntandy_foods/ntandy_foods_user/gonja.php">Shop Now</a>
        <img src="../images/yes.jpg" class="d-block w-100 rounded">
    </div>
</div> -->
<div class="container mx-auto justify-content-center">
    <div class="row">
        <div class="col-12 my-2 ps-4">
            <h2>Products</h2><small class="text-muted m-0">All your favourites</small>
        </div>
    </div>
</div>
<div class="container mb-3 mx-auto justify-content-center">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <div class="row mx-auto g-2">
                <?php for ($i = 0; $i < count($products); $i++) : ?>
                    <div class="col-md-6">
                        <div class="card px-0 mx-0 overflow-hidden">
                            <div class="head border-bottom justify-content-center text-light py-2">
                                <h5 class="text-center"><?php echo $products[$i]['name']; ?></h5>
                            </div>
                            <div class="card-body px-0">
                                <div class="card-img-center border-bottom px-0 pb-3">
                                    <a href="<?php echo $products[$i]['name'] . '.php' ?>">
                                        <img class="img-fluid mx-auto d-block" src="images/daddies.jpg" alt="" srcset="">
                                    </a>
                                </div>
                                <div class="cardlinks card-text">
                                    <form action="config/orderlogic.php" class="mt-3 d-block mx-auto px-3" method="POST">
                                        <?php if (isset($_SESSION['error'])) : ?>
                                            <div class="error bg-danger">
                                                <p class="text-center">
                                                    <?php
                                                    echo $_SESSION['error'];
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endif ?>
                                        <div class="input-group">
                                            <select name="size" id="" class="form-control text-muted">
                                                <option value="">Select</option>
                                                <option value="40g">40g</option>
                                                <option value="80g">80g</option>
                                                <option value="140g">140g</option>
                                                <option value="500g">500g</option>
                                            </select>
                                            <input type="hidden" name="product" value="<?php echo $products[$i]['name']; ?>">
                                            <input type="hidden" name="pid" value="<?php echo $i; ?>">
                                            <input type="number" name="quantity" value="" min=1 class="form-control" placeholder="Qty">
                                            <button name="submit<?php echo $i; ?>" value="submit" class="add border-0 text-light px-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                <?php if (isset($_SESSION['error'])) {

                    unset($_SESSION['error']);
                }
                ?>
            </div>
        </div>
        <div class="vv col-lg-4 mt-5">
            <div id="controls" class="carousel slide" data-bs-ride="carousel text-light">
                <div class="carousel-inner">
                    <div class="ff carousel-item active">
                        <div class="card" style="position: relative;">
                            <div class="card-body">
                                <div style="position: absolute; bottom: 20px;">
                                    <h4 class=" text-light ps-2">All Kinds Of Snacks</h4>
                                    <p class=" text-light ps-2">Come and Pick Your Snack Today From Ntandy Foods</p>
                                </div>
                                <div class="card-img-center">
                                    <img src="images/chips.jpeg" alt="" srcset="" style=" width: 100%; color: rgba(0, 0, 0, 0.1);
                                    display: block; margin-left: auto; margin-right: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ff carousel-item">
                        <div class="card" style="position: relative;">
                            <div class="card-body">
                                <div style="position: absolute; bottom: 20px;">
                                    <h4 class="ps-2">All Kinds Of people Like it</h4>
                                    <p class="ps-2">Everyone enjoys snacking with Ntandy Foods</p>
                                </div>
                                <div class="card-img-center">
                                    <img src="images/break.jpg" alt="" srcset="" style=" width: 100%; color: rgba(0, 0, 0, 0.1);
                                    display: block; margin-left: auto; margin-right: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#controls" data-bs-slide="prev">
                    <span><i class="fa fa-angle-left" aria-hidden="true" style="background-color: transparent; color: black; padding: 10px 12px; border-radius: 50%; border: 2px solid black;"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#controls" data-bs-slide="next">
                    <span><i class="fa fa-angle-right" aria-hidden="true" style="background-color: transparent; color: black; padding: 10px 12px; border-radius: 50%; border: 2px solid black;"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<?php
require_once('partials/footer.php');
?>