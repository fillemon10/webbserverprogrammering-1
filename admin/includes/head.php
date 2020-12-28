<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.0-alpha.min.css" />
    <link rel="stylesheet" href="../assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="../assets/css/animate.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <title><?php echo $titles ?> | Admin Cinemania</title>
    <meta name="description" content="" />
</head>
<?php
if (!isset($_SESSION['user']['username'])) {
    header("location:" . BASE_URL . "login.php");
}
if (!in_array($_SESSION['user']['role'], ["Admin", "Author", "Moderator"])) {
    header("location:" . BASE_URL . "index.php");
}