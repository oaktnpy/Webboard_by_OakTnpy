<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard LnwLnw</title>

    <script>
        function validatePassword() {
            var passwordInputs = document.getElementsByName("pwd");
            var password = passwordInputs[0].value;
            var confirmPassword = passwordInputs[1].value;

            if (password !== confirmPassword) {
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <header>
            <h1 style="text-align: center;" class="mt-3">REGISTER MEMBERS</h1>
        </header>

        <?php include "nav.php" ?>

        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                    session_start();
                    
                    if (isset($_SESSION['add_login'])) {
                        if ($_SESSION['add_login']=="error") {
                            echo "<div class='alert alert-danger'> Duplicate account name or Datebase problem </div>";
                        } else {
                            echo "<div class='alert alert-success'> Account added successfully </div>";
                        }
                        unset($_SESSION['add_login']);
                    }
                ?>
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Register</div>
                    <div class="card-body">
                        <form action="register_save.php" method="POST" onsubmit="validatePassword()">
                            <div class="row">
                                <label class="col-lg-3 col-form-label">Username: </label>
                                <div class="col-lg-9">
                                    <input type="text" name="login" class="form-control" require>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Password: </label>
                                <div class="col-lg-9">
                                    <input type="password" name="pwd" class="form-control" require>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Confirm Password: </label>
                                <div class="col-lg-9">
                                    <input type="password" name="pwd" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Name-Surename: </label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control" require>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Gender: </label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="m" class="form-check-input" require>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="f" class="form-check-input" require>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="o" class="form-check-input" require>
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">Email: </label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" class="form-control" require>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-save"></i> Register
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