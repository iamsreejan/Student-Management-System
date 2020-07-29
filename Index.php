<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src = "//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Student Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <style>
        tr td{
            border:2px solid black;
            padding :10px;
        }
      </style>
      
      <?php
             session_start();
             $conn = mysqli_connect("localhost","root","","Student Management System");
             if(mysqli_error($conn)){
                die("mysqli_error".mysqli_connect_error($conn));
            }
            if(!isset($_SESSION["email"])){
                echo '<li class="nav-item">
                <a class="nav-link" href="student_login.php"> Student Login</a></li>
                <a class="nav-link" href="admin_login.php"> Admin Login</a></li><ul>';
            }
            else{
                echo '<li class="nav-item">
                <a class="nav-link" href="logout.php"> Log Out</a></li>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> Email : '.$_SESSION['email'].'</a></li><ul>
              </li>';
              ?>
              <form class="form-inline my-2 my-lg-0"method = "post" action = "Search_Student.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_roll">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              <?php
            }
            ?>   
    
   
  </div>
</nav>
</body>
</html>