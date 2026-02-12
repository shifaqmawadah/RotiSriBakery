<?php
// Include the Dbhandler class for database interaction
include('classes/Dbhandler.class.php');

// Create an instance of the Dbhandler class
$db = new Dbhandler();

// Handle the action (Edit or Delete)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'edit') {
        // Fetch the product details for editing
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $result = $db->executeQuery($sql);
        $product = $result->fetch_assoc();

        if (!$product) {
            echo "<script>alert('Product not found!');</script>";
            exit;
        }
    } elseif ($action == 'delete') {
        // Handle product deletion
        if (isset($_POST['confirm_delete'])) {
            $deleteSql = "DELETE FROM products WHERE product_id = $id";
            $db->executeQuery($deleteSql);
            echo "<script>alert('Product deleted successfully!'); window.location.href='clerk.php';</script>";
            exit;
        }
    }
}

// Include header
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product Inventory</title>
    <style>
        /* Container with a black background for the entire content */
        .container {
            background-color: #000;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            width: 60%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form container for edit/delete operations */
        .form-container {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Form input fields */
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #333;
            color: white;
        }

        /* Labels */
        label {
            font-weight: bold;
        }

        /* Buttons for form submission */
        button, .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }

        /* Hover effect for buttons */
        button:hover, .btn:hover {
            opacity: 0.8;
        }

        .btn {
            background-color: #f44336; /* Red for "Go Back" button */
            text-decoration: none;
            margin-left: 10px;
        }

        /* Style the back button */
        a.btn {
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<!-- Black Container for All Content -->
<div class="container">
    <h2>Manage Product Inventory</h2>

    <!-- Display Edit or Delete Interface -->
    <?php if ($action == 'edit') { ?>
        <!-- Edit Product Form Inside the Black Container -->
        <div class="form-container">
            <form action="clerk_manage_inventory.php?action=edit&id=<?php echo $id; ?>" method="POST">
                <div>
                    <label for="sku">SKU:</label>
                    <input type="text" id="sku" name="sku" value="<?php echo $product['sku']; ?>" required>
                </div>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea>
                </div>
                <div>
                    <label for="unit_price">Unit Price (RM):</label>
                    <input type="number" step="0.01" id="unit_price" name="unit_price" value="<?php echo $product['unit_price']; ?>" required>
                </div>
                <div>
                    <label for="stock_quantity">Stock Quantity:</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" value="<?php echo $product['qty_on_hand']; ?>" required>
                </div>
                <div>
                    <label for="minimum_stock">Minimum Stock:</label>
                    <input type="number" id="minimum_stock" name="minimum_stock" value="<?php echo $product['min_qty']; ?>" required>
                </div>
                <button type="submit" name="update_product">Update Product</button>
            </form>
        </div>

        <?php
        // Handle the update functionality
        if (isset($_POST['update_product'])) {
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $unit_price = $_POST['unit_price'];
            $stock_quantity = $_POST['stock_quantity'];
            $minimum_stock = $_POST['minimum_stock'];

            // Update the product details in the database
            $updateSql = "UPDATE products SET sku = '$sku', name = '$name', description = '$description', 
                          unit_price = $unit_price, qty_on_hand = $stock_quantity, min_qty = $minimum_stock 
                          WHERE product_id = $id";
            if ($db->executeQuery($updateSql)) {
                echo "<script>alert('Product updated successfully!'); window.location.href='clerk.php';</script>";
            } else {
                echo "<script>alert('Error updating product!');</script>";
            }
        }

    } elseif ($action == 'delete') { ?>
        <!-- Delete Confirmation Form Inside the Black Container -->
        <div class="form-container">
            <h3>Are you sure you want to delete this product?</h3>
            <form action="clerk_manage_inventory.php?action=delete&id=<?php echo $id; ?>" method="POST">
                <button type="submit" name="confirm_delete">Yes, Delete Product</button>
                <a href="clerk.php" class="btn">No, Go Back</a>
            </form>
        </div>
    <?php } ?>
</div>

</body>
</html>

<?php
// Include footer
include('footer.php');
?>
