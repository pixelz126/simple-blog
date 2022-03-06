<?php 

include("includes/db.php");
if (isset($conn)) {
    $select = "SELECT * FROM `posts` ORDER BY id DESC";
    $query = mysqli_query($conn, $select);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيكسلز</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Cairo:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/customs.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">


</head>
<body>