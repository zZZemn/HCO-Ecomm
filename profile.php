<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    //-----------------------------
    $cartPro = "SELECT * FROM cart
            WHERE id = {$_SESSION["user_id"]}";
    $cartResult = $mysqli->query($cartPro);
    $userCart = $cartResult->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Poppins:ital,wght@0,400;1,500&family=Roboto:wght@300;400&family=Source+Code+Pro:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <nav>
        <div class="logo"><img src="Other-Images/logo-black.png" alt="logo"></div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li>
                <li><a class="profile" href="profile.php"><ion-icon name="person-circle-outline"></ion-icon></a></li>
            </ul>
    </nav>
    
    <?php if (isset($user)): ?>
        <table border="1px">
            <tr class="first">
            <td class="name" colspan="3"><p class="name">Hello, <?= htmlspecialchars($user["name"]) ?></p></td>
            <td class="logout"><p class=log-out><a href="logout.php">Log Out</a></p></td>
            </tr>
            
            <tr class="cart">
                <td colspan="4">Your Cart</td>  
            </tr>

            <tr class="items">
                <td width="50%">Products</td>
                <td width="20%">Price</td>
                <td width="10%">Quantity</td>
                <td width="20%">Total</td>
            </tr>

            <tr class="items">
                <td width="50%"><?= htmlspecialchars($userCart["product"]) ?></td>
                <td width="20%"><?= htmlspecialchars($userCart["price"]) ?></td>
                <td width="10%"><?= htmlspecialchars($userCart["quantity"]) ?></td>
                <td width="20%"><?= htmlspecialchars($userCart["total"]) ?></td>
            </tr>
        </table>

    <?php else: ?>
        <div class="noacc">
            <h1>No account selected</h1>
            <p class="ls"><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
            <p>uwuwuwuiwuwuiwui</p>
            <a href="login-admin.php">Admin Login</a>
        </div>
    <?php endif; ?>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    