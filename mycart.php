<?php
require_once('partials/header.php');
$total = 0;
?>

<div class="container-fluid px-0 mx-0 justify_content_center">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="container-fluid bg-success text-light p-0">
            <p class="text-center py-3">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                // header('location: http://localhost/ntandy_foods')
                ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="cart-item text-start text-lg-center ps-4 ps-lg-0 mx-0 display-6 py-4 align-items-center">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error bg-danger text-light mb-0 py-2">
                <p class="text-center">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        My Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <div class="blank container-fluid px-0 mx-0">

    </div>
    <div class="p-2 p-md-0">
        <div class="container-fluid container-md top row mx-auto justify-content-center rounded align-items-center">
            <div class="col-12 col-lg-8 border-none border-md-end">

                <?php if (empty($_SESSION['myorder'])) : ?>
                    <div class="order text-center lead pb-2">
                        Your Cart Is Empty
                        <div class="py-3">
                            <a class="link px-3 py-2" href="shop.php">Start Shopping</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="py-4">
                        <a class="link px-3 ms-md-0 py-2" href="shop.php">Continue Shopping</a>
                    </div>
                    <div class="order text-center lead pb-2">
                        Your Ntandys' Order Is
                    </div>
                    <div class="py-2 ps-md-2 py-md-2 d-flex bg-dark text-light justify-content-center align-items-center">
                        <div class="w ps-md-1">Product</div>
                        <div class="c">Size</div>
                        <div class="w">Quantity</div>
                        <div class="w">Subtotal</div>
                        <div class="c">Delete</div>

                    </div>
                    <?php for ($i = 0; $i < count($_SESSION['myorder']); $i++) : ?>
                        <?php
                        if ($_SESSION['myorder'][$i]['size'] == '40g') {
                            $price = 1000;
                        } elseif ($_SESSION['myorder'][$i]['size'] == '80g') {
                            $price = 2000;
                        } elseif ($_SESSION['myorder'][$i]['size'] == '140g') {
                            $price = 3000;
                        } elseif ($_SESSION['myorder'][$i]['size'] == '500g') {
                            $price = 10000;
                        }
                        ?>
                        <div class="py-1 ps-md-2 py-md-2 d-flex justify-content-center align-items-center border-bottom">
                            <div class="w"><?php echo $_SESSION['myorder'][$i]['product'] ?></div>
                            <div class="c"><?php echo $_SESSION['myorder'][$i]['size'] ?></div>
                            <div class="w">
                                <form action="config/update.php" class="x text-center" method="POST">
                                    <div class="input-group">
                                        <input type="number" name="quantity" value="<?php echo $_SESSION['myorder'][$i]['quantity'] ?>" min=1 class="form-control">
                                    </div>
                                    <input type="hidden" name="size" value="<?php echo $_SESSION['myorder'][$i]['size'] ?>">
                                    <input type="hidden" name="product" value="<?php echo $_SESSION['myorder'][$i]['product']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['myorder'][$i]['id'] ?>">
                                    <button name="submit" type="submit" class="btn border-none p-0"><i class="fa-solid fa-pen bg-primary p-2 text-light text-center mt-1"></i></button>
                                </form>
                            </div>
                            <div class="w"><?php echo $subtotal = $_SESSION['myorder'][$i]['quantity'] * $price; ?></div>
                            <div class="c">
                                <form action="config/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['myorder'][$i]['id'] ?>">
                                    <button name="submit" type="submit" min=1 class="btn p-0 px-md-3 py-md-1 bg-danger text-light form-control"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php $total += $subtotal; ?>
                    <?php endfor; ?>

                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-4">
                <?php if (empty($_SESSION['myorder'])) : ?>
                    <div class="py-2 text-center lead  border-bottom">
                        Cart Total - <span class="h5">shs 0</span>
                    </div>
                <?php else : ?>
                    <div class="py-2 text-center lead  border-bottom">
                        Cart Total - <span class="h5"><?php echo 'Shs ' .  $total; ?></span>
                    </div>
                    <div class="py-3 text-end">
                        <a class="checkout px-3 py-2" href="checkout.php">Proceed To CheckOut</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once('partials/footer.php');

?>