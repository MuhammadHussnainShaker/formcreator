<?php
include 'connection.php';
date_default_timezone_set('Asia/Karachi');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Forms</title>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body style="width: 85%;margin: 0 auto;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Online Forms</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="userHome.php">Home</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="listForms.php">Form List</a></li>
                        <li><a href="addForm.php">Add Form</a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="min-height: 500px;">