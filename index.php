<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard-OakTnpy</title>
</head>
<body>
    <header>
        <h1 style="text-align: center;">Welcome to HomePage</h1>
    </header>
    <hr>
    <form action="">
        Category: <select name="category" style="width: 80px; text-align: center;">
            <option value="all">----- All -----</option>
            <option value="general">-- General --</option>
            <option value="study">-- Study --</option>
        </select>
        <a href="login.html" style="float: right;">Sign In</a>
    </form>
    <ul>
        <?php
            $i = 1;

            while($i <= 10) {
                echo "<li><a href='post.php?id=$i'>" . "Topic $i" ."</a></li>";
                $i++;
            }
        ?>
    </ul>
    <hr>
    <footer>
        <p style="text-align: center;">Create by <a href="#">OakTnpy</a></p>
    </footer>
</body>
</html>