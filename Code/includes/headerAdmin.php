<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");


// session_destroy(); 

// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Wolf-Music</title>

  <link rel="stylesheet" href="assets/css/style.css">
  <!-- <link rel="stylesheet" href="assets/css/admin.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</head>

<body>

  <div id="mainContainer">

    <div id="topContainer">

      <?php include("includes/navBarContainerAdmin.php"); ?>

      <div id="mainViewContainer">

        <div id="mainContent" style="padding: 0;" style="padding-bottom: 0;">