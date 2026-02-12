<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="./static/materialize/js/materialize.min.js" defer></script>
  <script type="text/javascript" src="static/js/pagination.js"></script>
  <link rel="stylesheet" href="./static/css/base.css">
  <link rel="icon" type="image/png" style="border-radius: 50%;" href="./static/RotiLogo.png">
</head>

<?php
  ob_start();

  require_once "includes/class_autoloader.php";
  session_start();

  // Set a timeout duration in seconds (e.g., 1800 seconds = 30 minutes)
  $timeoutDuration = 900;

// Check if the last activity timestamp exists in the session
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeoutDuration) {
    // Session has timed out, destroy it and redirect the user
    session_unset();
    session_destroy();
    echo "<script>alert('Session timed out. Please log in again.'); window.location.href='login.php';</script>";
    exit();
}

// Update the last activity timestamp
$_SESSION['LAST_ACTIVITY'] = time();

  try {
      if (isset($_SESSION["Member"])) {
          $member = $_SESSION["Member"];
          if (!is_object($member)) {
              throw new Exception("Session data is invalid. Please log in again.");
          }
          $member = Member::CreateMemberFromID($member->getMemberID());
          $_SESSION["Member"] = $member;
          $memberID = $member->getMemberID();
          $username = $member->getUsername();
          $email = $member->getEmail();
          $privilegeLevel = $member->getPrivilegeLevel();
          $cart = $member->getCart();
          $orderItemCount = count($cart->getOrderItems());
          $orders = $member->getOrders();
      }
  } catch (Exception $e) {
      session_unset();
      session_destroy();
      echo "<script>alert('" . $e->getMessage() . "'); window.location.href='login.php';</script>";
      exit();
  }
?>

<div class="nav-wrapper" style="height: 100px">
<nav style="height: 100px;">
<div class="nav-wrapper" style="background-color:rgb(196, 174, 142); box-shadow: 0px 0px 2px white;">
      <a href="#" id="logo-link">
        <img src="./static/RotiLogoo.svg" alt="logo" id="logo" class="brand-logo glow-image" height="100"/>
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Hide search bar for clerk.php and clerk_manage_inventory.php -->
        <?php if (basename($_SERVER['PHP_SELF']) != 'admin.php' && basename($_SERVER['PHP_SELF']) != 'clerk.php' && basename($_SERVER['PHP_SELF']) != 'clerk_manage_inventory.php'): ?>
          <li class="black" id="search-bar">
            <form action="product_catalogue.php">
              <div class="white-text row" style="padding-left: 20px;">
                <input type="text" name="query" placeholder="Browse products..."
                  class="input-field white-text col s10 autocomplete" id="autocomplete-input"
                  value="<?php if (isset($_GET["query"])) echo($_GET["query"]); ?>"
                  style="font-size: 14px; z-index: 5050;"/>
                <button type="submit" class='btn black underline' style="margin-bottom: 50px; padding-bottom: 50px">
                  <i class='material-icons'>search</i>
                </button>
              </div>
            </form>
          </li>
        <?php endif; ?>
        <?php
          if (isset($_SESSION["Member"])) {
            // Only show cart button if not on admin or clerk page
            if (basename($_SERVER['PHP_SELF']) != 'admin.php' && basename($_SERVER['PHP_SELF']) != 'clerk.php' && basename($_SERVER['PHP_SELF']) != 'clerk_manage_inventory.php'){
              echo "
              <li>
                <a class='cart' href='cart.php?member_id=$memberID'>
                  Cart<span class='new badge unglow' id='cart_badge'>$orderItemCount</span>
                </a>
              </li>";
            }
            echo "
            <li><a class='manage_profile' href='manage_profile.php?email=$email'>Manage Profile</a></li>
            <li><a href='includes/logout.inc.php'>Logout</a></li>";
          } else {
            echo "
            <li><a class='login' href='login.php'>Login</a></li>
            <li><a class='signup' href='signup.php'>Sign Up</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>
</div>

<script>
  // Redirect logo click based on current page
  document.getElementById("logo-link").onclick = function(event) {
    var path = window.location.pathname;
    // Redirect to clerk.php if on clerk or clerk_manage_inventory, else to index.php
    if (path.includes("clerk.php") || path.includes("clerk_manage_inventory.php")) {
      window.location.href = "clerk.php";
    } else {
      window.location.href = "index.php";
    }
  };

  // Auto-generate recommended search results based on letter given
  $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        'Roti Kaya Mamasab': 'product_images/Roti Kaya.png',
        'Roti Sosej Fairy': 'product_images/Roti Sosej.png',
        'Croissant Secret Recipe': 'product_images/Croissant.png',
        'Bagel Fairy': 'product_images/Bagel.png',
        'Pretzel Secret Recipe': 'product_images/Pretzel.png',
        'Cinnamon Rolls Mamasab': 'product_images/Cinnamon Rolls.png',
        'Chocolate Indulgence': 'product_images/chocolate-indulgence-side-2.png',
        'Onde Onde': 'product_images/ckbYpH7d3Fe7yZw2YK0q6HJtIhD3CBVWdciWgvXb.png',
        'Brownie Standard': 'product_images/brownie standard.png',
        'Pecan Butterscotch': 'product_images/Pecan-butterscotch-330x229.png',
        'Mini Barbie Doll Cake': 'product_images/3D-barbie doll-12-400x400.png',
        'Chocolate Ice Cream': 'product_images/IceCream-Chocolate-0.5kgnew-400x400.png',
        'Roti Sang Kaya': 'product_images/6309640110303461940.jpg'
      },
      limit: 5,
      onAutocomplete: function(val) {},
      minLength: 1
    });
  });

  // Underline current page
  var path = window.location.pathname;
  var page = path.split("/").pop().split(".")[0];

  var links = document.getElementsByClassName(page);
  if (links[0] != null) links[0].classList.add("page_underline");

  // Style search bar if it exists
  var searchBar = document.getElementById("search-bar");
  if (searchBar) searchBar.classList.add("search");
</script>

</html>

<?php
// End output buffering and flush the output
ob_end_flush();
?>