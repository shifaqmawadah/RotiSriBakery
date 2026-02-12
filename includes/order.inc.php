<?php

require_once "class_autoloader.php";

/**
 * @param Item $item
 * @param OrderItemContr $cartItem
 * @param int $memberID
 */

function generateOrderDetails($item, $cartItem) {
    $itemID = $item->getItemID();
    $quantityInStock = $item->getQuantityInStock();
    $itemName = $item->getName();
    $categoryIdx = $item->getCategory();
    $categoryName = Item::CATEGORY[$categoryIdx];
    $dbh = new Dbhandler();

    $sql = "SELECT I.Image from Items I WHERE I.ItemID = $itemID";
    $result = $dbh->conn()->query($sql) or die($dbh->conn()->error);
    $row = $result->fetch_assoc();
    $image = $row["Image"];

    $dateAdded = $cartItem->getAddedDateTime();
    $price = $cartItem->getPrice();
    $price = "RM" . $price;
    $quantity = $cartItem->getQuantity();
    $quantityDisplay = "x" . $quantity;
    $orderItemID = $cartItem->getOrderItemID();

    return [$itemID, $quantity, $quantityInStock, $image, $itemName, $price, $quantityDisplay, $orderItemID, $dateAdded, $categoryName];
}

function generateItem($item, $cartItem, $memberID) {
    // admin view orders
    [$itemID, $quantity, $quantityInStock, $image, $itemName, $price, $quantityDisplay, $orderItemID, $dateAdded, $categoryName]
        = generateOrderDetails($item, $cartItem);

    $view_order = isset($_GET["view_order"]);
    echo(
        "
    <li>
      <form method='GET' class='collapsible-header collapsible-card bold center'>
        <input type='hidden' name='member_id' value=$memberID>
        <input type='hidden' name='item_id' value=$itemID>
        <input type='hidden' name='qty' value=$quantity>
        <input type='hidden' name='qty_stock' value=$quantityInStock>

        <p class='col s2' style='padding: 0px; margin: 0px;'>
          <img class='shadow-img' src='product_images/$image'
            style='height: 60px; width: 80px;'>
        </p>

        <p class='col s3' style='padding: 0px; margin: 0px;'>$itemName</p>
        <p class='col s2 center' style='padding: 0px; margin: 0px;'>$price</p>
        <p class='col s3 center' style='padding: 0px; margin: 0px;'>$quantityDisplay</p>

        <a class='btn orange darken-4 col s2 light-weight-text center' style='margin-right: 5px; padding: 0px;'
          href='product.php?item_id=$itemID'>
          Inspect
        </a>"
    );

    if (!$view_order) {
        echo(
            "<button class='btn red darken-4 col s2' style='padding: 0px; margin: 0px;'
        name='remove_item' value='$orderItemID'
        onclick=\"return confirm('Are you sure you want remove \"$itemName\"?');\">Remove</button>"
        );
    }
    echo(
        "</form>
    <div class='collapsible-body row collapsible-card bold' style='margin: 0px;'>
      <div class='col s6'>
        <span>Date Added:</span>
        <span class='light-weight-text'>$dateAdded</span>
      </div>
      <div class='col s6'>
        <span>Category:</span>
        <span class='light-weight-text'>$categoryName</span>
      </div>
    </div>
  </li>"
    );
}

function generateBoughtItem($item, $cartItem) {
  [$itemID, $quantity, $quantityInStock, $image, $itemName, $price, $quantityDisplay, $orderItemID, $categoryName, $paymentID]
      = generateOrderDetails($item, $cartItem);

  $view_order = isset($_GET["view_order"]);
  echo(
      "
  <li>
    <form method='GET' class='collapsible-header collapsible-card bold center'>
      <input type='hidden' name='item_id' value=$itemID>
      <input type='hidden' name='qty' value=$quantity>
      <input type='hidden' name='qty_stock' value=$quantityInStock>
      <input type='hidden' name='payment_id' value='$paymentID' id='payment_id_$itemID'>

      <p class='col s2' style='padding: 0px; margin: 0px;'>
        <img class='shadow-img' src='product_images/$image'
          style='height: 60px; width: 80px;'>
      </p>

      <p class='col s3' style='padding: 0px; margin: 0px;'>$itemName</p>
      <p class='col s2 center' style='padding: 0px; margin: 0px;'>$price</p>
      <p class='col s3 center' style='padding: 0px; margin: 0px;'>$quantityDisplay</p>
     
      " . ($view_order ? 
        "<a id='deliver_button_$itemID' class='btn orange darken-4 col s2 light-weight-text center' style='margin-right: 5px; padding: 0px;' href='#' onclick='markDelivered($itemID);'>
        Deliver
        </a>"
        : "<div class='col s4' style='padding: 0px; margin: 0px;'>
          <a class='btn orange darken-4 col s5 light-weight-text' style='padding: 0px; margin-right: 5px;' href='product.php?item_id=$itemID'>
            Inspect
          </a>
          <a class='btn cyan darken-4 col s5' style='padding: 0px;' href='review.php?review_item=$orderItemID'>
            Review
          </a>
        </div>"
      ) . "
    </form>
    <div class='collapsible-body row collapsible-card bold' style='margin: 0px;'>
      <div class='col s6'>
        <span>Category:</span>
        <span class='light-weight-text'>$categoryName</span>
      </div>
    </div>
  </li>

  <script>
    function markDelivered(itemID) {
      // Change button text and color
      document.getElementById('deliver_button_' + itemID).innerHTML = 'Delivered';
      document.getElementById('deliver_button_' + itemID).classList.remove('orange', 'darken-4');
      document.getElementById('deliver_button_' + itemID).classList.add('green', 'darken-4');

      // Make AJAX request to update the delivered status in the database
      var paymentID = document.getElementById('payment_id_' + itemID).value;
      
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'update_delivery_status.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText); // You can handle success message here if needed
        }
      };
      xhr.send('paymentID=' + paymentID + '&status=1');
    }
  </script>
  "
  );
}


function generateOrderSum($totalItems, $sumTotal, $displayShipping, $displaySVoucher, $displayPVoucher) {
    echo(
        "<div class='col s4'>
          <div class='rounded-card-parent'>
            <div class='card rounded-card tint-glass-brown'>
              <div class='card-content white-text'>
                <h5 class='bold center'>Order Details</h5>
                <table class='responsive-table'>
                  <tbody>
                    <tr><th>Total Items:</th><td class='left'>$totalItems</td></tr>"
    );
    echo("<tr><th>Delivery Charges:</th><td>");
    echo("$displayShipping $displaySVoucher</td></tr>");
    echo("<tr><th >Promo Voucher:</th><td >$displayPVoucher</td></tr>");
    echo("<tr><th>Sum Total:</th><td>RM$sumTotal</td></tr>");
    echo("<tr><th>Status:</th><td>Shipped (check email for status)</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>"
    );
}

