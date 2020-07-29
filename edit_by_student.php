
    <?php
    include('index.php');
    $conn = mysqli_connect("localhost","root","","Student Management System");
             
        $query = mysqli_query($conn,"SELECT * FROM students where student_username='$_SESSION[email]'");
        $count = 0;
        while($row = mysqli_fetch_assoc($query)){
                echo "<center><form action='student_edit.php' method='post'>".'roll number:<input type = "text" name = "roll_no" value='.$row['roll_no'].'><br>';
                echo 'Name: <input type = "text" name="student_name" value= '.$row['student_name'].'><br>';
                echo 'class : <input type = "text" name="student_class" value = '.$row['student_class'].'><br>';
                echo 'phone number : <input type = "text" name="student_phone_number" value='.$row['student_phone_number'].'><br>';
                echo 'Birthday : <input type = "date" name="student_birth" value = '.$row['student_birth'].'><br>';
                echo '<input type="submit"></form></center>';
    }
        ?>
    </center>
