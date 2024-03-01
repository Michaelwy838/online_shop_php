<?php
session_start();
if ($_SESSION['status'] != 1) {
    $_SESSION['error'] = "Access Denied";
    header('location: orders.php');
    die();
}
require_once('admin_header.php');


$username = $_POST['username'] ?? null;
$createpassword = $_POST['createpassword'] ?? null;
$confirmpassword = $_POST['confirmpassword'] ?? null;
?>

<div class="mt-5 container">
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
    <div class="container-fluid container-md row justify-content-center align-items-center">

        <div class="col-12 col-md-5 mx-5">
            <div class="lead text-center mb-5 mb-md-1">Create a Staff</div>

            <form class="shadow p-4 rounded" action="create.php" class="my-5" method="POST">

                <label for="" class="form-label">Email:</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control text-primary" placeholder="Ntandy Foods" value="<?php echo $username; ?>">
                </div>
                <label for="" class="form-label">Create Password:</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="createpassword" placeholder="Password" class="form-control text-primary" value="<?php echo $createpassword; ?>">
                </div>
                <label for="" class="form-label">Confirm Password:</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="confirmpassword" placeholder="Password" class="form-control text-primary" value="<?php echo $confirmpassword; ?>">
                </div>
                <input style="background-color: rgb(0, 172, 232);" class=" buon button py-2 mx-auto my-3" type="submit" name="submit" value="Log In">
            </form>
        </div>
    </div>
</div>
<script src="../js/main.js"></script>


</body>

</html>