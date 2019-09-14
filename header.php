<?php
include 'dbconnection.php';
?>
<html>
<head>
    <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Web Home</a>
      <div class="navbar-header" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a  class="navbar-brand" hhref="page-home.php">Home</a><br>
          </li>
          <li class="nav-item active">
            <a class="navbar-brand" href="page-about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="page-contact.php">Contact</a>
          </li>
          


          <li class="nav-item dropdown">
            <a class="navbar-brand" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
              <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
              <a class="dropdown-item" href="blog-post.html">Blog Post</a>
            </div>
          </li>
           <?php if(empty($_SESSION['success'])) { ?>
           <li>
            <a class="navbar-brand" href="login.php?page=login">Login</a>
        </li>
        <li>
            <a class="navbar-brand" href="registration.php?page=login">Sign Up</a>
        </li>
        <?php
         }
          else {
           ?>
        <li>
            <a href="logout.php?page=logout">Logout</a>
        </li>
        <?php
         } ?>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>




