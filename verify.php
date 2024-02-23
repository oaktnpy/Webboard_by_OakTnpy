<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <div style="text-align: center;">
        <?php
            $Login = $_POST['login'];
            $Password = $_POST['pwd'];

            if ($Login == 'admin' && $Password == 'ad1234') {
                $_SESSION['username']='admin';
                $_SESSION['role']='a';
                $_SESSION['id']=session_id();
                //redirect to index.php
                header("location:index.php");
                die();
            }
            else if ($Login == 'member' && $Password == 'mem1234') {
                $_SESSION['username']='member';
                $_SESSION['role']='m';
                $_SESSION['id']=session_id();
                //redirect to index.php
                header("location:index.php");
                die();
            }
            else {
                //create var session
                $_SESSION['error']='error';
                //redirect to login.php
                header("location:login.php");
                die();
            }
        ?>
    </div>
</body>
</html>