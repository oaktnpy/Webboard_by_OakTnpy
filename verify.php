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
            echo "Login with <br>"
            ."Login = $_POST[login] <br>"
            ."Password = $_POST[pwd] <br>";
        ?>
    </div>
</body>
</html>