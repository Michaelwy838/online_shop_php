<?php
session_start();
require_once('admin_header.php');

if (isset($_SESSION['id'])) {
    header('location: orders.php');
    die();
}

?>

<div class="mt-5 container">

    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-md-5 mx-5">
            <div class="lead text-center mb-5 mb-md-1">Log In To Get Access</div>
            <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error bg-danger text-light mb-2 py-2 mx-0">
                        <p class="text-center">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
            <form class="shadow p-4 rounded" action="signin.php" class="my-5" method="POST">

                <label for="" class="form-label">UserName:</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control text-primary" placeholder="Ntandy Foods" value="">
                </div>
                <label for="" class="form-label">Password:</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" placeholder="Password" class="form-control text-primary">
                </div>
                <input style="background-color: rgb(0, 172, 232);" class=" buon button py-2 mx-auto my-3" type="submit" name="submit" value="Log In">
            </form>
        </div>
    </div>
</div>
<script src="../js/main.js"></script>

</body>

</html>