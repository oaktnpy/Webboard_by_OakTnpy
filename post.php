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
    <div style="text-align: center;">
        Want to see Topic Number <?php echo $_GET['id'] . "<BR>" ?>

        <?php
            $n = $_GET['id'];

            if(($n % 2) == 0) {
                echo "Topic number is an even number <BR>";
            } else {
                echo "Topic nummber is an odd number <BR>";
            }
        ?>
    </div>
    <br>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr>
            <td style="background-color:#6CD2FE;">Comment to Topic</td>
        </tr>
        <tr>
            <td align="center">
                <textarea cols="80" rows="15"></textarea> <br>
                <input type="submit" value="Send Comment">
            </td>
        </tr>
    </table>
    <br>
    <div style="text-align: center;">
        <a href="index.html">Back to Index</a>
    </div>
</body>
</html>