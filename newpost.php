<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newpost</title>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Welcome to HomePage</h1>
    </header>
    <hr>
    <form action="">
        <table>
            <tr>
                <td>Users:</td>
                <td><?php echo$_SESSION['username'] ?></td>
            </tr>
            <tr>
                Category: <select name="category">
                    <option value="general">-- General --</option>
                    <option value="study">-- Study --</option>
                </select>
            </tr>
            <tr>
                <td>Topic:</td>
                <td>
                    <input type="text" name="text" size="20">
                </td>
            </tr>
            <tr>
                <td>Content:</td>
                <td><textarea name='story'  row="10" cols="30"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save a message"></td>
            </tr>
        </table>
    </form>
</body>
</html>