<?php
require_once('partials/header.php');
if (empty($_SESSION['myorder'])) {
    $_SESSION['error'] = 'Access Denied Because Your Cart Is empty';
    header('location: mycart.php');
}
$total = 0;
?>
<div class="container-fluid px-0 mx-0 justify_content_center">
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
    <div class="check text-start text-lg-center ps-4 ps-lg-0 mx-0 display-6 py-4 align-items-center">
        Checkout
    </div>
    <div class="empty container-fluid px-0 mx-0">

    </div>
    <div class="p-2 p-md-0">
    <div class="top container-fluid container-md row g-2 px-2 mx-auto justify-content-center p-1 p-lg-3 rounded align-items-center">
        <div class="col-12 col-lg-6 border-md-end">
            <div class="order text-center lead pb-2">
                Order Summary
            </div>
            <div class="ps-3 py-2 d-flex justify-content-around align-items-center bg-dark text-light">
                <div class="r">Product</div>
                <div class="zc">Subtotal</div>
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
                <div class="ps-3 py-2 py-md-2 d-flex justify-content-around border-top align-items-center">
                    <div class="r"><?php echo $_SESSION['myorder'][$i]['product'] . '(' . $_SESSION['myorder'][$i]['size'] . ') - ' . $_SESSION['myorder'][$i]['quantity']; ?></div>
                    <div class="zc"><?php echo $subtotal = $price * $_SESSION['myorder'][$i]['quantity']; ?></div>
                </div>
                <?php $total += $subtotal ?>
            <?php endfor; ?>
            <div class="ps-3 py-1 mt-2 py-md-2 d-flex justify-content-around align-items-center  border-top border-primary">
                <div class="r h5 ">Total</div>
                <div class="zc h5"><?php echo "Shs " . $_SESSION['total'] = $total ?></div>
            </div>
        </div>
        <div class="col-12 col-lg-6 px-4 px-md-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="h4">
                        Payment Methods
                    </div>
                    <div class="accordion my-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Airtel Money Pay
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    MoMo Pay
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Cash On Delivery
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6">
                    <div class="h4">
                        Address
                    </div>
                    <div>

                        <form action="config/checkoutlogic.php" class="my-2" method="POST">
                            <label for="" class="form-label">Name:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input value="" type="text" name="name" class="form-control text-primary" placeholder="Ntandy Foods">
                            </div>
                            <label for="" class="form-label">Phone number:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" value="" name="phonenumber" class="form-control text-primary" placeholder="+256 7628 75946">
                            </div>
                            <label for="" class="form-label">District:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" value="" name="district" class="form-control text-primary" placeholder="Kampala">
                            </div>
                            <label for="" class="form-label">Physical Address:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" value="" name="address" class="form-control text-primary" placeholder="At Ntandy Foods Along Hoima Road">
                            </div>
                            <button name="submit" class="buon p-2 my-3">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php
require_once('partials/footer.php');

?>