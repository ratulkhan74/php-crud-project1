<?php include 'db.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD PROJECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .wrapper {
            padding-top: 70px;
        }

        input.form-control:focus {
            box-shadow: none;
            border: 1px solid #cfcfcf;
        }
    </style>
</head>

<body>
    <main class="wrapper">
        <div class="container">
            <div class="row mb-4 align-items-center justify-content-center">
                <div class="col-3">
                    <h3>Change Password</h3>
                </div>
                <div class="col-3 text-end">
                    <a href="index.php" class="btn btn-info text-light">Back</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <?php

                            $id = $_GET['u_id'];
                            if (isset($_POST['submit'])) {
                                // Form data
                                $new_password = md5($_POST['new_password']);
                                $confirm_password = md5($_POST['confirm_password']);
                                if ($new_password === $confirm_password) {

                                    // Data insert into database
                                    $sql = "UPDATE `crud` SET password='$new_password' WHERE id='$id'";
                                    $result = mysqli_query($dbc, $sql);
                                    if ($result) {
                                        header('location:' . SITEURL . 'index.php');
                                    } else {
                                        die(mysqli_error($dbc));
                                    }
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input autocomplete="off" type="password" class="form-control" id="password" name="new_password">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input autocomplete="off" type="password" class="form-control" id="password" name="confirm_password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>