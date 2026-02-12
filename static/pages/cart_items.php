<?php
// Start output buffering to ensure no output is sent to the browser prematurely
ob_start();


require_once "includes/order.inc.php";
require_once "includes/class_autoloader.php";


// Redirect immediately if the item is removed
if (isset($_GET["remove_item"])) {
    $orderItemID = intval($_GET["remove_item"]); // Sanitize input
    $conn = new Dbhandler();
    $sql = "DELETE FROM OrderItems WHERE OrderItemID = $orderItemID";
    $conn->conn()->query($sql) or die($conn->conn()->error);


    // Redirect after deleting an item
    header("Location: cart.php?member_id=" . intval($_GET['member_id'])); // Sanitize input
    exit(); // Make sure no further code is executed after the header
}


if (isset($_GET["member_id"])) {
    $memberID = intval($_GET["member_id"]); // Sanitize input
    $member = Member::CreateMemberFromID($memberID);
    $cart = $member->getCart();
    $cartID = $cart->getOrderID();
    $cartItems = $cart->getOrderItems();
    $cartItemCount = count($cartItems);
}
?>


<h4 class="page-title">Cart</h4>
<div class="row">
    <div class="col s8">
        <ul class="collapsible popout" id="cart">
            <!-- Generate all rows of items -->
            <?php
            if (isset($cartItems)) {
                if ($cartItemCount <= 0) {
                    echo("<h5 class='grey-text page-title'>Your shopping cart is empty.</h5><h6 class='grey-text page-title'>
                    <a href='product_catalogue.php?query='>Shop Now!</a></h6>");
                } else {
                    echo("
                    <div class='title-card' style='height: 55px; margin-bottom: 10px'>
                        <p class='col s4 center' style='padding: 0px; margin: 0px;'>Product</p>
                        <p class='col s2 center' style='padding: 0px; margin: 0px;'>Unit Price</p>
                        <p class='col s2 center' style='padding: 0px; margin: 0px;'>Quantity</p>
                        <p class='col s4 center' style='padding: 0px; margin: 0px;'>Actions</p>
                    </div>");
                }


                $sumTotal = 0;
                $totalItems = 0;  // Initialize total items counter
                foreach ($cartItems as $orderItem) {
                    $item = new Item($orderItem->getItemID());
                    generateItem($item, $orderItem, $memberID);


                    $quantity = $orderItem->getQuantity();
                    $price = $orderItem->getPrice();
                    $sumTotal += $price * $quantity;


                    // Accumulate the quantity to totalItems correctly
                    $totalItems += $quantity;  // Ensure this adds the quantity for each item in the cart
                }
            }
            ?>
        </ul>
    </div>


    <div class="col s4">
        <div class="rounded-card-parent">
            <div class="card rounded-card">
                <h5 class="bold center">Cart Details</h5>
                <form action="payment.php" method="GET">
                    <table class="responsive-table">
                        <tbody>
                            <?php
                            // Calculate shipping and promo voucher
                            if ($sumTotal >= 50) {
                                $displayShipping = 0;
                                $displaySVoucher = " <span class='yellow-text'>(Shipping voucher applied)</span>";
                            } else {
                                $displayShipping = 10;
                                $displaySVoucher = "";
                            }


                            $displayShipping = $displayShipping === 0 ? "<span class='underline'>RM $displayShipping</span>" : "RM$displayShipping";


                            if ($sumTotal >= 100) {
                                $shippingTotal = $sumTotal - 10;
                                $displayPVoucher = "<span class='underline'>-RM100</span> <span class='yellow-text'>(Promo voucher applied)</span>";
                            } else {
                                $shippingTotal = $sumTotal < 50 ? $sumTotal + 10 : $sumTotal;
                                $displayPVoucher = "None (min spend not reached)";
                            }


                            $sumTotal = number_format($shippingTotal, 2);


                            // Display the correct total quantity of items
                            echo("<tr><th>Total Items:</th><td>$totalItems</td></tr>");
                            echo("<tr><th>Delivery Charges:</th><td>$displayShipping $displaySVoucher</td></tr>");
                            echo("<tr><th>Promo Voucher:</th><td>$displayPVoucher</td></tr>");
                            echo("<tr><th>Sum Total:</th><td>RM$sumTotal</td></tr>");
                            ?>
                        </tbody>
                    </table>
                    <?php if (!isset($_GET["view_order"]) && $cartItemCount > 0) { ?>
                    <button class="btn amber darken-3" style="margin-top: 20px; margin-left: 200px">
                        Checkout
                    </button>
                    <input type="hidden" name="order_id" value="<?php echo($cartID); ?>">
                    <input type="hidden" name="view_order" value="1">
                    <input type="hidden" name="member_id" value="<?php echo($memberID); ?>">
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.collapsible').collapsible();
    });
</script>


<?php
// End output buffering and flush the output
ob_end_flush();
?>


