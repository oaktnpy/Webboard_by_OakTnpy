<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1 style="text-align: center;">LOGIN to WebBoard</h1>
    </header>
    <hr>
    <div style="text-align: center;">
        <?php
            $Login = $_POST['login'];
            $Password = $_POST['pwd'];

            if($Login == 'admin' && $Password == 'ad1234') {
                echo "WELCOME, ADMIN." . "<BR>";
            }
            else if($Login == 'member' && $Password == 'mem1234') {
                echo "WELCOME, MEMBER." . "<BR>";
            }
            else {
                echo "Username or Password is Incorrect." . "<BR>";
            }

            echo "<a href='index.php'> Back to Home Page";
        ?>
    </div>
</body>
</html>