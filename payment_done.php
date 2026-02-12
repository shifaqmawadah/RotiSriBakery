<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roti Sri Bakery - Thank You</title>
<?php
include "header.php"; 

// Include the database connection file
include "db_connection.php"; 

// Retrieve the memberID from the GET parameter
$memberID = filter_input(INPUT_GET, 'member_id', FILTER_VALIDATE_INT);
// Check if memberID is provided and valid
if (!$memberID) {
    echo "<div class='container center-align' style='margin-top: 100px;'>No valid member ID found.</div>";
    exit;
}

// Query to fetch payment and member details
$query = "SELECT 
    p.OrderID, 
    p.PaymentDate, 
    m.Username 
FROM 
    payment p 
INNER JOIN 
    members m 
ON 
    p.MemberID = m.MemberID 
WHERE 
    p.MemberID = ? 
ORDER BY 
    p.PaymentDate DESC 
LIMIT 1;
"; // Adjust query to get the most recent payment if necessary


// Prepare the statement
$stmt = $conn->prepare($query);

// Bind the memberID parameter
$stmt->bind_param("i", $memberID);  // "i" means the parameter is an integer

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the payment record
$paymentInfo = $result->fetch_assoc();
if (!$paymentInfo) {
  echo "Debugging: Member ID = " . htmlspecialchars($memberID) . "<br>";
  echo "Query did not return any results.";
  exit;
}
?>

</head>
<body>

  <div class="container center-align" style="margin-top: 100px;">
    
    <div class="rounded-card-parent" style="margin-right: 200px; margin-left: 200px;">
      <div class="rounded-card card-content">

        <h4 class="page-title green-text">We received your payment.</h4>

        <h6></h6>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ddd;">Description</th>
                <th style="text-align: left; padding: 8px; border-bottom: 1px solid #ddd;">Details</th>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Customer Name</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                    <strong><?php echo htmlspecialchars($paymentInfo['Username']); ?></strong>
                </td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Order ID</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                    <strong>#<?php echo htmlspecialchars($paymentInfo['OrderID']); ?></strong>
                </td>
            </tr>
            <tr>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">Payment Date</td>
                <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                    <strong><?php echo htmlspecialchars($paymentInfo['PaymentDate']); ?></strong>
                </td>
            </tr>
        </table>
        <p>Your ordered items will be delivered accordingly. Please come again.</p>

        <div class="card-action" style='margin-top: 50px'>
          <a class="white-text btn" href="index.php">Return to Home Page</a>
          <a style='margin-left: 20px' class="white-text btn" href='cart.php?member_id=<?php echo htmlspecialchars($memberID); ?>'>Back to Cart</a>

          <hr>

          <form method="POST" action="download_receipt.php">
              <input type="hidden" name="username" value="<?php echo htmlspecialchars($paymentInfo['Username']); ?>">
              <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($paymentInfo['OrderID']); ?>">
              <input type="hidden" name="payment_date" value="<?php echo htmlspecialchars($paymentInfo['PaymentDate']); ?>">
              <button type="submit" >Download Receipt</button>
          </form>



        </div>
      </div>
    </div>

  </div>

  <?php
  // Close database connection
  $stmt->close();
  $conn->close();
  ?>

</body>
<?php include "footer.php"; ?>
</html>
     
