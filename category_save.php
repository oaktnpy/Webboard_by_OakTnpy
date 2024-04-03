<?php
    session_start();

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["cat_name"]) && !empty($_POST["cat_name"])) {
            $category_name = $_POST["cat_name"];

            $sql = "INSERT INTO category (name) VALUES ('$category_name')";

            if ($conn->query($sql)) {
                $_SESSION['message'] = "Category updated successfully";
                header("Location: category.php");
                exit();
            }
        }
    }
?>
