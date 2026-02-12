<?php
  spl_autoload_register('myAutoLoader');

  function myAutoLoader($className) {
    // Ensure no output occurs at this stage
    ob_start(); // Start output buffering to capture any unintended output

    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'includes') !== false){
      $path = "../classes/"; // Adjust path based on location
    }
    else {
      $path = "classes/";
    }
    
    $extension = ".class.php";

    // Check if file exists before including
    if (file_exists($path . $className . $extension)) {
      require_once $path . $className . $extension;
    } else {
      // Handle the error if the class file does not exist
      error_log("Class file $path$className$extension not found.");
    }

    // Ensure to clean up any buffer (in case something was output)
    ob_end_clean();
  }
?>
