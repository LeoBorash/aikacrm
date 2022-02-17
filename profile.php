<?php
session_start();
include "includes/db.php";
include "functions/profile/main.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/edit.css">
    <title>My Profile</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <a href="/" class="btn btn-info mt-2 mb-3 ml-3">Назад</a>
        </div>

        <?php all(); ?>
        <?php V8Gifts(); ?>
        <?php iwatchAlim(); ?>
        

    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
