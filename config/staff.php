<?php
session_start();

if ($_SESSION['status'] != 1) {
    $_SESSION['error'] = "Access Denied";
    header('location: orders.php');
    die();
}
require_once('admin_header.php');
require_once('db.php');


$sql = "SELECT * FROM staff";
$result = mysqli_query($conn, $sql);
$staff = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container-fluid justify-content-center align-items-center">
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
    <div class="container-fluid container-md bg-white">
        <div class="container h4 my-3">
            <p class="text-center">
                Users
            </p>
        </div>
        <table id="users">
            <tr>
                <th>User Name</th>
                <th>User Status</th>
                <th>User Action</th>
            </tr>
            <?php for ($i = 0; $i < count($staff); $i++) : ?>
                <tr>
                    <td class=""><?php echo $staff[$i]['username'] ?></td>
                    <td class=""><?php echo $staff[$i]['status'] ?></td>
                    <td>
                        <form class="" action="del_user.php" method="POST">
                            <input type="hidden" name="uid" value="<?php echo $staff[$i]['id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $i; ?>">
                            <button name="submit<?php echo $i; ?>" class="bg-danger dl mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>

</div>
<script src="../js/main.js"></script>
</body>

</html>