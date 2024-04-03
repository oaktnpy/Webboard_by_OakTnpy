<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['post_id']) && isset($_POST['category']) && isset($_POST['topic']) && isset($_POST['content'])) {
            
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            
            $post_id = $_POST['post_id'];
            $category = $_POST['category'];
            $topic = $_POST['topic'];
            $content = $_POST['content'];
            
            $sql = "UPDATE post SET cat_id = ?, title = ?, content = ? WHERE id = ?";
            $result = $conn->prepare($sql);
            $result->execute([$category, $topic, $content, $post_id]);
            
            $conn = null;

            header("location: editpost.php?id=$post_id&success=1");
            exit();
        } else {
            header("location: index.php");
            exit();
        }
    } else {
        header("location: index.php");
        exit();
    }
?>
