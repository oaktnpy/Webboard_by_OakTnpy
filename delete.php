<?php
    session_start();

    if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            $sql = "DELETE FROM post WHERE id = $id";
            $result = $conn->exec($sql);
            
            if ($result !== false) {
                header("location:index.php");
                die();
            } else {
                echo "เกิดข้อผิดพลาดในการลบ";
            }

            $conn = null;

        } else {
            echo "ไม่ได้รับค่า id";
        }
    } else {
        echo "ไม่มีสิทธิ์ในการลบ";
    }
?>