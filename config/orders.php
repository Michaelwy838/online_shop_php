<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
    die();
}
require('db.php');

$sql = "SELECT * from userdetails";
$result = mysqli_query($conn,  $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql1 = "SELECT * from orders";
$result1 = mysqli_query($conn,  $sql1);
$orders = mysqli_fetch_all($result1, MYSQLI_ASSOC);

require_once('admin_header.php');
?>

<div class="orders text-start text-lg-center ps-4 ps-lg-0 mx-0 display-6 py-4 align-items-center">
    Orders
</div>
<div class="ored container-fluid px-0 mx-0">

</div>
<div class="px-2 px-md-0 mb-4">
    <div class=" container-fluid container-md top row mx-auto justify-content-center p-1 p-lg-3 rounded align-items-center">
        <div class="col-12">
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
            <?php elseif (isset($_SESSION['error'])) : ?>
                <div class="container-fluid bg-danger text-light p-0">
                    <p class="text-center py-3">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        // header('location: http://localhost/ntandy_foods')
                        ?>
                    </p>
                </div>
            <?php endif; ?>
            <div class="order text-center lead pb-2">
                Pending Orders
            </div>
            <div class=" accordion my-3 mx-0 mx-lg-5" id="accordionExample">

                <?php for ($i = 0; $i < count($users); $i++) : ?>
                    <?php if ($users[$i]['status'] == 0) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                    Time: <?php echo $users[$i]['time']; ?> <br>
                                    <?php echo strtoupper($users[$i]['name']); ?> - <?php echo $users[$i]['phonenumber']; ?> - <?php echo '(' . $users[$i]['district'] . ')'; ?> - <?php echo '(' . $users[$i]['address'] . ')'; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body mx-lg-5">
                                    <div class="row g-2 justify-content-center align-items-center">
                                        <div class="col-12">
                                            <div class="order text-center lead pb-2 d-flex">
                                                <div class="pending me-3"></div>
                                                <div class="text-danger me-2 fw-bold">Pending </div>
                                                <div>
                                                    <?php echo $users[$i]['name'] . "'s order"; ?>
                                                </div>
                                            </div>
                                            <div class="py-2 ps-2 d-flex justify-content-around align-items-center bg-dark text-light">
                                                <div class="r">Product</div>
                                                <div class="s text-center">Quantity</div>
                                                <div class="s text-center">Subtotal</div>
                                            </div>
                                            <?php $total = 0; ?>
                                            <?php for ($x = 0; $x < count($orders); $x++) : ?>
                                                <?php
                                                if ($orders[$x]['size'] == '40g') {
                                                    $price = 1000;
                                                } elseif ($orders[$x]['size'] == '80g') {
                                                    $price = 2000;
                                                } elseif ($orders[$x]['size'] == '140g') {
                                                    $price = 3000;
                                                } elseif ($orders[$x]['size'] == '500g') {
                                                    $price = 10000;
                                                }
                                                $subtotal = $orders[$x]['quantity'] * $price;
                                                ?>
                                                <?php if ($orders[$x]['uid'] == $users[$i]['uid']) : ?>
                                                    <div class="py-2 py-md-2 d-flex justify-content-around align-items-center border-top">
                                                        <div class="r text-start"><?php echo $orders[$x]['product'] . '(' . $orders[$x]['size'] . ')' ?></div>
                                                        <div class="s text-center"><?php echo $orders[$x]['quantity']; ?></div>
                                                        <div class="s text-center"><?php echo $subtotal; ?></div>
                                                        <?php $total += $subtotal; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <div class="py-1 mt-2 py-md-2 justify-content-end border-top border-primary">
                                                <p class="h5 text-end">Total <?php echo "Shs " . $total; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="complete.php" method="POST">
                                    <input type="hidden" name="uid" value="<?php echo $users[$i]['uid']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $i; ?>">
                                    <input type="hidden" name="name" value="<?php echo $users[$i]['name']; ?>">
                                    <button name="submit<?php echo $i; ?>" class="bun mb-2">Complete Order</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <div class="col-12 mx-lg-5 border-md-end">
            <div class="order text-center lead pb-2">
                Completed Orders
            </div>
            <div class="accordion my-3 px-0 mx-lg-5" id="accordionExample">

                <?php for ($i = 0; $i < count($users); $i++) : ?>
                    <?php if ($users[$i]['status'] == 1) : ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                    Time: <?php echo $users[$i]['time']; ?> <br>
                                    <?php echo strtoupper($users[$i]['name']); ?> - <?php echo $users[$i]['phonenumber']; ?> - <?php echo '(' . $users[$i]['district'] . ')'; ?> - <?php echo '(' . $users[$i]['address'] . ')'; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body mx-lg-5">
                                    <div class="row g-2 justify-content-center align-items-center">
                                        <div class="col-12">
                                            <div class="order text-center lead pb-2 d-flex">
                                                <div class="completed me-3"></div>
                                                <div class="text-success me-2 fw-bold">Completed </div>
                                                <div>
                                                    <?php echo $users[$i]['name'] . "'s order"; ?>
                                                </div>
                                            </div>
                                            <div class="py-2 ps-2 d-flex justify-content-around align-items-center bg-dark text-light">
                                                <div class="r">Product</div>
                                                <div class="s text-center">Quantity</div>
                                                <div class="s text-center">Subtotal</div>
                                            </div>
                                            <?php $total = 0; ?>
                                            <?php for ($x = 0; $x < count($orders); $x++) : ?>
                                                <?php
                                                if ($orders[$x]['size'] == '40g') {
                                                    $price = 1000;
                                                } elseif ($orders[$x]['size'] == '80g') {
                                                    $price = 2000;
                                                } elseif ($orders[$x]['size'] == '140g') {
                                                    $price = 3000;
                                                } elseif ($orders[$x]['size'] == '500g') {
                                                    $price = 10000;
                                                }
                                                $subtotal = $orders[$x]['quantity'] * $price;
                                                ?>
                                                <?php if ($orders[$x]['uid'] == $users[$i]['uid']) : ?>
                                                    <div class="py-2 py-md-2 d-flex justify-content-around align-items-center border-top">
                                                        <div class="r text-start"><?php echo $orders[$x]['product'] . '(' . $orders[$x]['size'] . ')' ?></div>
                                                        <div class="s text-center"><?php echo $orders[$x]['quantity']; ?></div>
                                                        <div class="s text-center"><?php echo $subtotal; ?></div>
                                                        <?php $total += $subtotal; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <div class="py-1 mt-2 py-md-2 justify-content-end border-top border-primary">
                                                <p class="h5 text-end">Total <?php echo "Shs " . $total; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($_SESSION['status'] == 1) : ?>
                                    <form action="del_order.php" method="POST">
                                        <input type="hidden" name="uid" value="<?php echo $users[$i]['uid']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $i; ?>">
                                        <button name="submit<?php echo $i; ?>" class="bg-danger dl mb-2">Delete</button>
                                    </form>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/main.js"></script>
</body>

</html>