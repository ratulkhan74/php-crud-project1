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
                    <h3>Update User</h3>
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
                            // Getting all data from database
                            $sql = "SELECT * FROM `crud` WHERE id=$id";
                            $result = mysqli_query($dbc, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $name = $row['full_name'];
                            $email = $row['email'];
                            $phone = $row['phone'];

                            // Updating data into database
                            if (isset($_POST['submit'])) {

                                // Form data
                                $name = $_POST['fullname'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];

                                // Data insert into database
                                $sql = "UPDATE `crud` SET full_name='$name', email='$email',phone='$phone' WHERE id='$id'";

                                $result = mysqli_query($dbc, $sql);
                                if ($result) {
                                    header('location:' . SITEURL . 'index.php');
                                } else {
                                    die(mysqli_error($dbc));
                                }
                            }
                            ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input autocomplete="off" type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $name; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input autocomplete="off" type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input autocomplete="off" type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>