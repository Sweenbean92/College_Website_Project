<!DOCTYPE html>

<?php session_start() ?>
<html>

    <head>
        <title>Home Page</title>

        <link href="https://fonts.google.com/specimen/Raleway/tester?query=raleway" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css">

        </style>
    </head>

    <body>

        <header id="bg-blue">
            <img id="headerImg" src="picture/BKB_logo.png">

            <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Bike King Borders</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gallary.php">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="trails.php">Bike Trails</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Page</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                  </li>   
                  
                  <?php
                  if(isset($_SESSION["userdb"]) or isset($_SESSION["staffdb"])) {
                    echo '
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>';
                  }

                  if(isset($_SESSION["staffdb"])) {
                    echo '
                  <li class="nav-item">
                    <a class="nav-link" href="staff.php">Staff</a>
                  </li>';
                  }

                  ?>
                </ul>
              </div>
            </div>
          </nav>
        </header>