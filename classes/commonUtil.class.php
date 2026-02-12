<?php
class CommonUtil extends Dbhandler {
    public function productExists($image) {
        try {
            $sql = "SELECT * FROM Items where Image = ?;";
            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("s", $image);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) return $row;
            else return false;
        } catch (Exception $e) {
            die("<p>*Error: " . $e->getMessage() . "</p>");
        } finally {
            $stmt->close();
        }
    }

    public function uidExists($loginName) {
        try {
            $sql = "SELECT * FROM Members WHERE Username = ? OR Email = ?";
            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("ss", $loginName, $loginName);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) return $row;
            else return false;
        } catch (Exception $e) {
            die("<p>*Error: " . $e->getMessage() . "</p>");
        } finally {
            $stmt->close();
        }
    }

    public function setUser($username, $pwd, $email, $privilegeLevel = 0, $attempt = 3) {
        try {
            if ($this->emptyInput($username, $pwd, $pwd, $email)) {
                throw new Exception("All fields must be filled.");
            }

            if ($this->invalidUid($username)) {
                throw new Exception("Invalid username format.");
            }

            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Members(Username, Password, Email, PrivilegeLevel, Attempt, RegisteredDate) 
                    VALUES (?, ?, ?, ?, ?, CURRENT_TIME);";

            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("sssii", $username, $hashedPwd, $email, $privilegeLevel, $attempt);
            $stmt->execute();

            // Get member ID
            $sql = "SELECT MemberID FROM Members where Username = ?;";
            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $memberID = $row["MemberID"];

            // Create cart
            $sql = "INSERT INTO Orders(MemberID) VALUES (?);";
            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("i", $memberID);
            $stmt->execute();

        } catch (Exception $e) {
            die("<p>*Error: " . $e->getMessage() . "</p>");
        } finally {
            $stmt->close();
            $this->conn()->close();
        }
    }

    public function setProduct($name, $brand, $description, $category, $sellingprice, $quantityinstock, $image) {
        try {
            if ($this->EmptyInputCreateProduct($name, $brand, $description, $category, $sellingprice, $quantityinstock, $image)) {
                throw new Exception("All fields must be filled for creating a product.");
            }

            $sql = "INSERT INTO Items(Name, Brand, Description, Category, SellingPrice, QuantityInStock, Image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->conn()->stmt_init();
            if (!$stmt->prepare($sql)) {
                throw new Exception("Statement preparation failed.");
            }
            $stmt->bind_param("sssiiis", $name, $brand, $description, $category, $sellingprice, $quantityinstock, $image);
            $stmt->execute();

        } catch (Exception $e) {
            die("<p>*Error: " . $e->getMessage() . "</p>");
        } finally {
            $stmt->close();
        }
    }

    public function EmptyInputCreateProduct($name, $brand, $description, $category, $sellingprice, $quantityinstock, $image) {
        return empty($name) || empty($brand) || empty($description) || ($category === "") || empty($sellingprice) || empty($quantityinstock) || empty($image);
    }

    public function emptyInput($username, $pwd, $repeatPwd, $email) {
        return empty($username) || empty($pwd) || empty($repeatPwd) || empty($email);
    }

    public function invalidUid($username) {
        return !preg_match("/^[a-zA-Z0-9]*$/", $username);
    }

    public function pwdNotMatch($pwd, $repeatPwd) {
        return $pwd !== $repeatPwd;
    }

    public function EmptyInputCreateUser($username, $pwd, $repeatPwd, $privilegeLevel, $email) {
        return empty($username) || empty($pwd) || empty($repeatPwd) || ($privilegeLevel === "") || empty($email);
    }

    public function EmptyInputSelect($value) {
        return empty($value);
    }
}
?>
