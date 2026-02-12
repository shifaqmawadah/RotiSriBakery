<?php 

class OrderContr extends Dbhandler {
  private $orderID;
  /** @var OrderItemContr[] $orderItems */
  private $orderItems;

  function __construct($orderID) {
    $this->orderID = $orderID;
    $this->updateOrderItems();
  }

  // Update order items related to this order
  protected function updateOrderItems() {
    try {
      $sql = "SELECT OrderItemID FROM OrderItems WHERE ORDERID = '$this->orderID'";
      $result = $this->conn()->query($sql);

      if (!$result) {
        throw new Exception("Error executing query: " . $this->conn()->error);
      }

      // Create multiple OrderItem instances
      $this->orderItems = array();
      while ($row = $result->fetch_assoc()) {
        array_push($this->orderItems, new OrderItemContr($row["OrderItemID"]));
      }
    } catch (Exception $e) {
      echo "Failed to update order items: " . $e->getMessage();
    }
  }

  public function getOrderID() { 
    return $this->orderID; 
  }

  public function getOrderItems() { 
    return $this->orderItems; 
  }
}