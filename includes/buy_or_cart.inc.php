<?php 

function buyOrCart($conn, $quantityInStock, $cartQty, $itemID, $price, $cart){
    // Add into cart if qty in stock is larger than requested quantity
    if ($quantityInStock >= $cartQty) {
        if (isset($_SESSION["Member"])) {
            $orderID = $cart->getOrderID();

            // Check if the item already exists in the order
            $sql = "SELECT OI.OrderItemID, OI.Quantity FROM OrderItems OI 
                    WHERE OI.OrderID = $orderID AND OI.ItemID = $itemID";
            $result = $conn->conn()->query($sql) or die($conn->conn()->error);
            $row = $result->fetch_assoc();
            
            // If the item exists in the order, update the quantity
            if ($row) {
                $newQuantity = $row["Quantity"] + $cartQty;
                // Ensure the new quantity doesn't exceed stock
                if ($newQuantity <= $quantityInStock) {
                    $sql = "UPDATE OrderItems SET Quantity = $newQuantity WHERE OrderItemID = {$row['OrderItemID']}";
                    $conn->conn()->query($sql) or die($conn->conn()->error);
                } else {
                    echo "<script>alert('Not enough stock available!');</script>";
                }
            } else {
                // If the item does not exist, add it to the order
                $sql = "INSERT INTO OrderItems (OrderID, ItemID, Price, Quantity, AddedDatetime)
                        VALUES ($orderID, $itemID, $price, $cartQty, CURRENT_TIME)";
                $conn->conn()->query($sql) or die($conn->conn()->error);
            }
        } else {
            echo ("<script>alert('Login to add to cart.');</script>");
            echo ("<script>window.location.href='login.php';</script>");
        }
    } else {
        echo "<script>alert('Insufficient stock available.');</script>";
    }
}
?>
