<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roti Sri Bakery - Edit Products</title>
  <?php
    require "header.php";
    include "static/pages/side_nav.html";
    include "static/pages/admin_nav.php";
    include "includes/admin.inc.php";
    $dbh = new Dbhandler();
    $util = new CommonUtil();
  ?>
</head>
<body>
  <div class="rounded-card-parent container" style="margin-top: 150px">
    <div class="card rounded-card">
      <a class="btn blue darken-2" href='admin_manage_products.php' style="margin-bottom: 10px;">< BACK TO MANAGE PRODUCTS</a>
      <span class="card-title orange-text bold center" style="padding-left: 100px;">Edit Product - <?php echo $name; ?></span>
      <form id="productForm" action="" method="POST" style="padding-left: 10px;">
        <div class="row">
          <input type="hidden" name="item_id" id="item_id" value="<?php echo $itemID;?>">
        </div>
        <div class="row">
          <div class="col s6" style="padding-right: 40px;">
            <div class="row">
              <div class="input-field white-text">
                <i class="material-icons prefix">inventory_2</i>
                <input name="name" id="name" type="text" class="validate white-text"
                  value="<?php echo $name;?>">
                <label for="name" class="white-text">Product Name</label>
                <span class="error-message" id="name-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field white-text">
                <i class="material-icons prefix">branding_watermark</i>
                <input name="brand" id="brand" type="text" class="validate white-text" maxlength="20"
                  value="<?php echo $brand;?>">
                <label for="brand" class="white-text">Brand</label>
                <span class="error-message" id="brand-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field white-text col s12">
                <i class="material-icons prefix">description</i>
                <textarea name="description" id="description" class="materialize-textarea white-text" minlength="5"><?php echo $description;?></textarea>
                <label for="description" class="white-text">Description</label>
                <span class="error-message" id="description-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
          </div>
          <div class="col s6" style="padding-right: 40px;">
            <div class="row">
              <div class="input-field white-text">
                <i class="material-icons prefix white-text">category</i>
                <select name="category" id="category">
                  <option value="" disabled selected>Choose your option</option>
                  <option value=0>Bun</option>
                  <option value=1>Cakes</option>
                </select>
                <label class="white-text">Category</label>
                <span class="error-message" id="category-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field white-text">
                <i class="material-icons prefix">attach_money</i>
                <input name="sellingprice" id="sellingprice" type="number" step=".01" class="validate white-text" maxlength="30"
                  value="<?php echo $sellingprice;?>">
                <label for="sellingprice" class="white-text">Selling Price</label>
                <span class="error-message" id="sellingprice-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field white-text">
                <i class="material-icons prefix white-text">production_quantity_limits</i>
                <input name="quantityinstock" id="quantityinstock" type="number" class="validate white-text" maxlength="30"
                  value="<?php echo $quantityinstock;?>">
                <label for="quantityinstock" class="white-text">Quantity In Stock</label>
                <span class="error-message" id="quantityinstock-error" style="color: red; font-size: 12px;"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="file-field col s6">
            <div class="btn">
              <span>File</span>
              <input type="file" id="product_image" accept="image/*">
            </div>
            <div class="file-path-wrapper">
              <input name="image" id="product_image" class="file-path validate white-text" type="text" onchange="update_image(this)"
                value="<?php echo $image;?>">
            </div>
          </div>
          <img class="shadow-img" id="image" src="product_images/<?php echo $image;?>" style="width: 300px;">
        </div>
        <div class="errormsg">
        <?php
try {
  if (isset($_GET["error"])) {
      // Handle specific error cases using exceptions
      if ($_GET["error"] == "none") {
          echo "<p class='green-text bold'>Successfully edited product.</p>";
      } else {
          throw new Exception("An unknown error occurred.");
      }
  }
} catch (Exception $e) {
  // Display the exception message
  echo "<p class='red-text bold'>" . $e->getMessage() . "</p>";
}


?>
        </div>
        <button type="submit" id="update" name="update" class="btn">Update Product</button>
      </form>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    $('select').formSelect();
  });

  function update_image(path) {
    var image = document.getElementById("image");
    image.src = "product_images/" + path.value;
  }

  document.getElementById('productForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(function(error) {
      error.textContent = '';
    });

    // Validate fields
    const fields = [
      { id: 'name', message: 'Product name cannot be empty.' },
      { id: 'brand', message: 'Brand cannot be empty.' },
      { id: 'description', message: 'Description cannot be empty.' },
      { id: 'category', message: 'Category must be selected.' },
      { id: 'sellingprice', message: 'Selling price cannot be empty.' },
      { id: 'quantityinstock', message: 'Quantity in stock cannot be empty.' }
    ];
    

    fields.forEach(function(field) {
      const element = document.getElementById(field.id);
      if (!element.value.trim()) {
        isValid = false;
        document.getElementById(field.id + '-error').textContent = field.message;
      }
    });

    // Prevent form submission if validation fails
    if (!isValid) {
      event.preventDefault();
    }
  });
</script>

<?php include "footer.php"; ?>
</html>







