<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard LnwLnw</title>
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">WELCOME TO HOMEPAGE</h1>

        <?php include "nav.php" ?>
            
        <div class="mt-4 d-flex justify-content-between">
        <div>
        <label>Category</label>
        <div class="btn-group">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                    if (isset($_GET['category']) && $_GET['category'] != 'all') {
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql = "SELECT name FROM category WHERE id = " . $_GET['category'];
                        $result = $conn->query($sql);
                        $row = $result->fetch();
                        echo $row['name'];
                    } else {
                        echo '-- ALL --';
                    }
                ?>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">ALL</a></li>
                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    $sql = "SELECT * FROM category";
                    foreach ($conn->query($sql) as $row) {
                        $selected_category = (isset($_GET['category']) && $_GET['category'] == $row['id']) ? 'active' : '';
                        echo "<li><a class='dropdown-item $selected_category' href='index.php?category=$row[id]'>$row[name]</a></li>";
                    }
                    $conn = null;
                ?>
            </ul>
        </div>
    </div>
            <?php if (isset($_SESSION['id'])) { ?>
            <div>
                <a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Create new Topic</a>
            </div>
            <?php } ?>
        </div>
 
        <table class="table table-striped mt-4">
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                $category_condition = (isset($_GET['category']) && $_GET['category'] != 'all') ? 'WHERE t3.id = ' . $_GET['category'] : '';
                $sql = "SELECT t3.name, t1.title, t1.id, t2.login, t1.post_date FROM post as t1
                    INNER JOIN user as t2 ON (t1.user_id = t2.id)
                    INNER JOIN category as t3 ON (t1.cat_id = t3.id)
                    $category_condition
                    ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td class='d-flex justify-content-between'><div>[ $row[0] ] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a><br>$row[3] - $row[4]</div>";
                    
                    if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                        echo "<div class='me-2 align-self-center'><a href='delete.php?id=$row[2]' class='btn btn-danger btn-sm' onclick='return confirmDelete()'><i class='bi bi-trash'></i></a></div>";
                    }
                    
                    echo "</td></tr>";
                }
                $conn = null;
            ?>
        </table>

        <script>
            function confirmDelete() {
                var confDelete = confirm('Do you really want to delete it ?');
                return confDelete;
            }
        </script>
    </div>
</body>
</html>