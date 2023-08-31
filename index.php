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
            padding-top: 100px;
        }

        .dropdown-toggle{
            font-size: 14px;
            
        }
        .dropdown-toggle:focus,
        .dropdown-toggle:hover,
        .dropdown-toggle{
            border: 1px solid #cfcfcf !important;
        }
        .dropdown-toggle::after {
            vertical-align: middle;
        }

        .dropdown .dropdown-menu li a {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <main class="wrapper">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-6">
                    <h3>Users</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="add-user.php" class="btn btn-info text-light">Add User</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <!-- <th>Password</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = 'SELECT * FROM crud';

                            $result = mysqli_query($dbc, $sql);

                            if ($result) :
                                $rows = mysqli_num_rows($result);
                                if ($rows > 0) :
                                    $sl_no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id = $row['id'];
                                        $fullname = $row['full_name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $password = md5($row['password']);
                            ?>
                                        <tr>
                                            <td><?php echo $sl_no++; ?></td>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <!-- <td><?php /* echo $password; */ ?></td> -->
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                                    <ul class="dropdown-menu p-0">
                                                        <li><a class="dropdown-item bg-primary text-light" href="update.php?u_id=<?php echo $id; ?>">Update</a></li>
                                                        <li><a class="dropdown-item bg-warning text-light" href="change-password.php?u_id=<?php echo $id; ?>">Change Password</a></li>
                                                        <li><a class="dropdown-item bg-danger text-light" href="delete.php?u_id=<?php echo $id; ?>">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                            <?php
                                    endwhile;
                                endif;
                            endif;

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>