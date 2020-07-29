<?php include('index.php');?>
  <center>
  Your Details:<br> 
  <?php
  $sql = "SELECT * FROM students where student_username='".$_SESSION['email']."'";
  $query = mysqli_query($conn,$sql);
  if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
    //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    ?>
    Roll No:<?php echo $row["roll_no"];?><br>
    Student UserName:<?php echo $row["student_username"];?><br>
    Student Name :<?php echo $row["student_name"];?><br>
    Student Class:<?php echo $row["student_class"];?><br>
    Phone Number:<?php echo $row["student_phone_number"];?><br>
    Birth Date:<?php echo $row["student_birth"];?><br>
    <?php
    }
} ?><form action="edit_by_student.php"method="post">
        <input type="submit" name="edit_student" value="Edit Student"></form>
<?php
        if(isset($_POST['edit_student'])){
            echo "yes";
        }
    ?>
  </center>