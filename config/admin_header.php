<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://kit.fontawesome.com/77a10864d0.js" crossorigin="anonymous"></script>
    <title>Ntandy Foods | Online Shop</title>
</head>

<body>
    <div class="logodiv container-fluid d-flex justify-content-between align-items-center">
        <?php if (isset($_SESSION['status'])) : ?>
            <div>
                <div id="mySidenav" class="sidenav d-inline d-md-none">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <ul class="dashboard">

                        <?php if ($_SESSION['status'] == 1) : ?>
                            <li class=""><a href="createuser.php">Create User</a></li>
                            <li class=""><a href="staff.php">Users</a></li>
                        <?php endif ?>
                        <li><a class="" href="orders.php">Orders</a></li>
                        <li><a class="logout" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <div class="d-inline d-md-none">
                    <span style="font-size: 30px; cursor: pointer;" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
                </div>
            <?php endif ?>
            <img class="logo my-2 my-md-3 ms-0 mx-auto ms-md-3" src="../images/logo.png" alt="ntandyfoods_logo" srcset=""></a>
            </div>

    </div>
    <div class="user container-fluid bg-dark text-light py-3 d-none d-md-block">
        <ul class="dashboard d-flex align-items-center py-0 my-0">
            <?php if (isset($_SESSION['status'])) : ?>
                <?php if ($_SESSION['status'] == 1) : ?>
                    <li class=""><a href="createuser.php">Create User</a></li>
                    <li class=""><a href="staff.php">Users</a></li>
                <?php endif ?>
                <li><a class="" href="orders.php">Orders</a></li>
                <li><a class="logout" href="logout.php">Log Out</a></li>
            <?php endif ?>
        </ul>
    </div>