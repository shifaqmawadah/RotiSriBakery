<?php 
$orderItemID = $_GET["review_item"];

function checkRating($orderItemID, $conn) {
  try {
    $sql = "SELECT Rating FROM OrderItems WHERE OrderItemID = $orderItemID";
    $result = $conn->conn()->query($sql);
    $row = $result->fetch_assoc();
    return $row["Rating"] ?? 0;
  } catch (Exception $e) {
    error_log("Error fetching rating: " . $e->getMessage());
    return 0;
  }
}

function checkReviewExists($conn, $orderItemID) {
  try {
    $sql = "SELECT Feedback FROM OrderItems WHERE OrderItemID = $orderItemID";
    $result = $conn->conn()->query($sql);
    $row = $result->fetch_assoc();
    return $row["Feedback"] ?? "Share your experience and help others make better choices!";
  } catch (Exception $e) {
    error_log("Error checking review existence: " . $e->getMessage());
    return "Share your experience and help others make better choices!";
  }
}

function EmptyInputReview($rating, $review) {
  return empty($rating) || empty($review);
}

if (isset($_GET["redirect"])) {
  header("refresh:2.5;url=cart.php?member_id=$memberID");
}

if (isset($_POST["submit"])) {
  $review = $_POST["review"];
  $rating = $_POST["rating_star"];

  try {
    $conn = new Dbhandler();

    if (EmptyInputReview($rating, $review)) {
      throw new Exception("Fill in all fields!");
    }

    $sql = "UPDATE OrderItems 
            SET Feedback = ?, Rating = ?, RatingDateTime = CURRENT_TIME
            WHERE OrderItemID = ?";
    $stmt = $conn->conn()->prepare($sql);

    if (!$stmt) {
      throw new Exception("Failed to prepare SQL statement.");
    }

    $stmt->bind_param("sii", $review, $rating, $orderItemID);

    if (!$stmt->execute()) {
      throw new Exception("Error executing SQL query: " . $stmt->error);
    }

    echo "<script>
            alert('Review submitted successfully!');
            window.location.href = 'review.php?error=none&review_item=$orderItemID&redirect=1';
          </script>";
    exit();
  } catch (Exception $e) {
    error_log("Review submission error: " . $e->getMessage());
    echo "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location.href = 'review.php?error=submit_error&review_item=$orderItemID';
          </script>";
    exit();
  }
}
?>

