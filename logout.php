<?php
session_start();

session_destroy();
/*function clearCart() {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
    session_destroy();
}


clearCart();
*/

header('location:index.php');


?>