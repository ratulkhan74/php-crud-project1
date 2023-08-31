<?php

include 'db.php';


if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $sql = "DELETE FROM `crud` WHERE id=$id";
    $result = mysqli_query($dbc, $sql);
    if ($result) {
        header('location:' . SITEURL . 'index.php');
    } else {
        die(mysqli_error($dbc));
    }
}
