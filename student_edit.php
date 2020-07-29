<?php
include('index.php');

    $query = "UPDATE students set student_name='$_POST[student_name]',student_class = '$_POST[student_class]', student_phone_number='$_POST[student_phone_number]',student_birth='$_POST[student_birth]' where roll_no=$_POST[roll_no]";
    $run = mysqli_query($conn,$query);
    header("Location:student_dashboard.php");

    ?>