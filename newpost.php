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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>newpost</title>
</head>
<body>
<div class="container">
        <header>
            <h1 style="text-align: center;" class="mt-3">CREATE TOPIC</h1>
        </header>

        <?php include "nav.php" ?>

        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">Create new Topic</div>
                    <div class="card-body">
                        <form action="newpost_save.php" method="POST">
                            <div class="row">
                                <label class="col-lg-3 col-form-label">Category : </label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                        <?php
                                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                            $sql = "SELECT * FROM category";
                                            foreach($conn->query($sql) as $row) {
                                                echo "<option value=$row[id]>$row[name]</option>";
                                            }
                                            $conn = null;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Topic : </label>
                                <div class="col-lg-9">
                                    <input type="text" name="topic" class="form-control" require>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Content : </label>
                                <div class="col-lg-9">
                                    <textarea name="comment" row="8" class="form-control" require></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-info btn-sm text-white me-1">
                                        <i class="bi bi-caret-right-square"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm ms-1">
                                        <i class="bi bi-x-square"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
    <br>
</body>
</html>