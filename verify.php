<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("location:index.php");
        die();
    }

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "SELECT * FROM user WHERE login='$login' and password=sha1('$pwd')";
    $result = $conn->query($sql);
    
    if ($result->rowCount()==1) {
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username']=$data['login'];
        $_SESSION['role']=$data['role'];
        $_SESSION['user_id']=$data['id'];        
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    } else {
        $_SESSION['error']='error';
        header("location:login.php");
        die();
    }
    $conn = null;
    
    // if ($Login == 'admin' && $Password == 'ad1234') {
    //     $_SESSION['username']='admin';
    //     $_SESSION['role']='a';
    //     $_SESSION['id']=session_id();
    //     header("location:index.php");
    //     die();
    // } else if ($Login == 'member' && $Password == 'mem1234') {
    //     $_SESSION['username']='member';
    //     $_SESSION['role']='m';
    //     $_SESSION['id']=session_id();
    //     header("location:index.php");
    //     die();
    // } else {
    //     $_SESSION['error']='error';
    //     header("location:login.php");
    //     die();
    // }
?>