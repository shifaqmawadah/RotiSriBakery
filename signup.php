<!DOCTYPE html>
<html lang="en">
<title>Roti Sri Bakery - Sign Up</title>
<?php include "header.php"; ?>

<form action="includes/signup.inc.php" method="POST" onsubmit="return validateForm()">
  <div class="container">
    <h3 class="underline white-text grid">Sign Up</h3>
    <div class="rounded-card-parent center">
      <div class="card rounded-card">
        <!-- Username Input -->
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text">account_circle</i>
            <input
              name="username" 
              id="username" 
              type="text" 
              class="validate white-text" 
              minlength="5" 
              maxlength="12"
              oninput="checkUsername()"
            >
            <label for="username" class="white-text">Username</label>
            <span id="username-helper" class="helper-text grey-text left-align" data-error="Must contain only letters and be 5-12 characters.">Must contain only letters and be 5-12 characters.</span>
            <span id="sql-error-message" class="helper-text red-text left-align" style="display:none;">Error: SQL-like names are not allowed.</span>
          </div>
        </div>

        <!-- Password Input -->
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text">password</i>
            <input name="pwd" id="pwd" type="password" class="validate white-text" minlength="8" maxlength="20">
            <label for="pwd" class="white-text">Password</label>
            <span class="helper-text grey-text left-align" data-error="Min 8, Max 20 characters" data-success="Min 8, Max 20 characters">Min 8, Max 20 characters</span>
          </div>
        </div>

        <!-- Repeat Password Input -->
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text">password</i>
            <input name="repeat_pwd" id="repeat_pwd" type="password" class="validate white-text" maxlength="20">
            <label for="repeat_pwd" class="white-text">Repeat Password</label>
          </div>
        </div>

        <!-- Email Input -->
        <div class="row">
          <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix white-text">email</i>
            <input name="email" id="email" type="email" class="validate white-text" maxlength="25">
            <label for="email" class="white-text">Email</label>
            <span class="helper-text white-text" data-error="Invalid email" data-success="Valid email"></span>
          </div>
        </div>

        <input class="btn" type="submit" name="submit" value="Sign Up">
        <!-- Error Messages -->
        <div class="errormsg">
          <?php
          try {
              if (isset($_GET["error"])) {
                  switch ($_GET["error"]) {
                      case "empty_input":
                          throw new Exception("Fill in all fields!");
                      case "invalid_uid":
                          throw new Exception("Username contains SQL-like characters. Please choose a different name!");
                      case "passwords_dont_match":
                          throw new Exception("Passwords don't match!");
                      case "username_taken":
                          throw new Exception("Username/Email already taken!");
                      case "none":
                          echo "<script>
                              alert('You have signed up! Please go to the Login page.');
                              setTimeout(function() {
                                  window.location.href = 'signup.php';
                              }, 2000);
                          </script>";
                          exit();
                      default:
                          throw new Exception("An unknown error occurred.");
                  }
              }
          } catch (Exception $e) {
              echo "<script>alert('" . htmlspecialchars($e->getMessage()) . "');</script>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  // JavaScript Input Validation
  function validateForm() {
    const username = document.getElementById('username');
    const usernameRegex = /^[a-zA-Z]{5,12}$/; // Letters only, 5-12 characters
    const sqlKeywords = ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'CREATE', 'ALTER', 'TRUNCATE', 'EXEC', 'GRANT', 'REVOKE', 'COMMIT', 'ROLLBACK', 'UNION', 'WHERE', 'FROM', 'LIKE'];

    // Check for SQL keywords in the username
    const usernameValue = username.value.toUpperCase();
    const sqlErrorMessage = document.getElementById('sql-error-message');
    if (sqlKeywords.some(keyword => usernameValue.includes(keyword))) {
      sqlErrorMessage.style.display = "block"; // Display SQL error message
      return false; // Prevent form submission
    } else {
      sqlErrorMessage.style.display = "none"; // Hide SQL error message
    }

    if (!usernameRegex.test(username.value)) {
      // Username does not match the regex, don't submit the form
      return false;
    }

    const password = document.getElementById('pwd').value;
    const repeatPassword = document.getElementById('repeat_pwd').value;

    if (password !== repeatPassword) {
      alert("Passwords do not match!");
      return false;
    }

    return true;
  }

  function checkUsername() {
    const username = document.getElementById('username');
    const usernameRegex = /^[a-zA-Z]{5,12}$/;

    const sqlErrorMessage = document.getElementById('sql-error-message');
    const usernameValue = username.value.toUpperCase();
    const sqlKeywords = ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'CREATE', 'ALTER', 'TRUNCATE', 'EXEC', 'GRANT', 'REVOKE', 'COMMIT', 'ROLLBACK', 'UNION', 'WHERE', 'FROM', 'LIKE'];

    // If the username contains SQL-like keywords, show the error message
    if (sqlKeywords.some(keyword => usernameValue.includes(keyword))) {
      sqlErrorMessage.style.display = "block";
    } else {
      // If the username is valid, hide the error message
      sqlErrorMessage.style.display = "none";
    }

    // If the username doesn't match the regex, mark it as invalid
    if (!usernameRegex.test(username.value)) {
      username.classList.add("invalid");
    } else {
      username.classList.remove("invalid");
    }
  }
</script>

<?php include "footer.php"; ?>
</html>