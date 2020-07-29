<?php include('index.php');
if($_SESSION['email']==''){
        header("location:login.php");
    }
    session_start();
    $conn = mysqli_connect("localhost","root","","Student Management System");
             
    $query = "UPDATE students set student_name='$_POST[student_name]',student_class = '$_POST[student_class]', student_phone_number='$_POST[student_phone_number]',student_birth='$_POST[student_birth]' where roll_no=$_POST[roll_no]";
    $run = mysqli_query($conn,$query);
    header("Location:admin_dashboard.php");

    ?>