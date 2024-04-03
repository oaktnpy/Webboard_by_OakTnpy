<?php
    session_start();

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];

        $sql = "DELETE FROM category WHERE id = $id";
        $conn->exec($sql);

        $conn = null;

        header("Location: category.php");
        die();
    }

    if (isset($_GET['edit_id']) && isset($_GET['new_name'])) {
        $id = $_GET['edit_id'];
        $newName = $_GET['new_name'];

        $sql = "UPDATE category SET name = '$newName' WHERE id = $id";
        $result = $conn->query($sql);
        $result->execute();

        if ($result) {
            header("Location: category.php");
            die();
        }
    }
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

        <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='row mt-4'><div class='col-lg-6 col-md-8 col-sm-10 mx-auto'>";
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            $_SESSION[message]
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                echo "</div></div>";
                unset($_SESSION['message']);
            }
        ?>

        <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
            <div class="container mt-3">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

                            $sql = "SELECT * FROM category";
                            $result = $conn->query($sql);

                            $countID = 1;
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td> $countID </td>";
                                echo "<td> $row[name] <a id='myLink' href='#'></a> </td>";
                                echo "<td>
                                        <a href='#' class='btn btn-warning btn-sm me-1' onclick='editCategory(" . $row['id'] . ", \"" . $row['name'] . "\")'><i class='bi bi-pencil-fill'></i></a>
                                        <a href='category.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm ms-1' onclick='return confirmDelete()'><i class='bi bi-trash'></i></a>
                                    </td>";
                                echo "</tr>";
                                $countID++;
                            }
                        ?>
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bi bi-bookmark-plus"></i> Add New Category</button>
                </div>

                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="category_save.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="col-form-label">Category Name : </label>
                                    <div>
                                        <input type="text" name="cat_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            var confDelete = confirm('Do you really want to delete it ?');
            return confDelete;
        }

        function editCategory(id, currentName) {
            var newName = prompt("Enter new category name:", currentName);
            if (newName && newName !== currentName) {
                var newUrl = 'category.php?edit_id=' + id + '&new_name=' + newName;

                var categoryNameElement = document.getElementById('categoryName' + id);
                
                if (categoryNameElement) {
                    categoryNameElement.textContent = newName;
                }

                fetch(newUrl).then(response => response.text()).then(data => {console.log(data); location.reload();}).catch(error => console.error(error.message));
            }
        }

        window.onload = function() {
            if (window.location.href.indexOf('#') > -1) {
                removeHashFromURL();
            }
        };

        function removeHashFromURL() {
            var newURL = window.location.href.split('#')[0];
            history.replaceState(null, null, newURL);
        }
    </script>
</body>
</html>