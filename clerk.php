<?php
// Include Dbhandler class from the classes directory
include('classes/Dbhandler.class.php');  // Adjust path based on the location of the classes directory

// Instantiate the Dbhandler class
$db = new Dbhandler();  // This will automatically connect to the database

// Now you can use $db->conn to execute queries or use executeQuery method
$sql = "SELECT product_id, sku, name, description, unit_price, qty_on_hand AS stock_quantity, min_qty AS minimum_stock FROM products";
$result = $db->executeQuery($sql);

// Include the header
include('header.php');
?>

<!-- Styling for the container and table -->
<style>
    .container {
        background-color: #000;  /* Black background */
        color: #fff;  /* White text */
        padding: 20px;
        border-radius: 10px;
        margin: 20px auto;
        width: 80%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #fff;
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #333;  /* Dark background for headers */
    }

    tr:nth-child(even) {
        background-color: #444;  /* Light gray rows for better readability */
    }

    tr:hover {
        background-color: #555;  /* Highlight row on hover */
    }

    .btn {
        background-color: #f44336;  /* Red for Delete */
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-edit {
        background-color: #4CAF50;  /* Green for Edit */
    }

    .btn:hover {
        opacity: 0.7;
    }
</style>

<h2>Product Inventory</h2>

<!-- Container for the table -->
<div class="container">
    <!-- Product Table -->
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>SKU</th>
                <th>Name</th>
                <th>Description</th>
                <th>Unit Price (RM)</th>
                <th>Stock Quantity</th>
                <th>Minimum Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display the product records from the database
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['sku'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['unit_price'] . "</td>";
                    echo "<td>" . $row['stock_quantity'] . "</td>";
                    echo "<td>" . $row['minimum_stock'] . "</td>";
                    // Edit and Delete buttons with links
                    echo "<td>
                            <a href='clerk_manage_inventory.php?action=edit&id=" . $row['product_id'] . "' class='btn btn-edit'>Edit</a> | 
                            <a href='clerk_manage_inventory.php?action=delete&id=" . $row['product_id'] . "' class='btn'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Error retrieving products.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Include the footer
include('footer.php');
?>
