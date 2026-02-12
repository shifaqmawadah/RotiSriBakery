<?php
// Start output buffering at the very beginning of the file
ob_start();

// Other includes
include "header.php"; 

// Handle removing an item from the cart
if (isset($_GET["remove_item"])) {
    $orderItemID = intval($_GET["remove_item"]); // Sanitize input
    $conn = new Dbhandler();
    $sql = "DELETE FROM OrderItems WHERE OrderItemID = $orderItemID";
    $conn->conn()->query($sql) or die($conn->conn()->error);

    // Redirect after deleting an item
    header("Location: cart.php?member_id=" . intval($_GET['member_id'])); // Sanitize input
    exit(); // Make sure no further code is executed
}

?>

<div class="wide-container">
  <?php include "includes/order.inc.php" ?>
  <?php include "static/pages/cart_items.php" ?>
  <?php include "static/pages/order_items.php" ?>
</div>

<?php include "footer.php"; ?>

<?php
// End output buffering and flush the output
ob_end_flush();
?>
