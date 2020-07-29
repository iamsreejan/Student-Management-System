<?php
            // if(isset($_POST["submit"])){
                $conn = mysqli_connect("sql302.epizy.com","epiz_26313658","hyRZjf9Fotc","epiz_26313658_StudentManagementSystem");
               $query = mysqli_query($conn,"SELECT * FROM students");
               $roll=0; 
               while($row = mysqli_fetch_assoc($query)){
                    if($row["roll_no"] == $_POST["roll_no"]){
                        ?>
                       <script>
                       alert("Student Already exist");
                       window.location = "admin_dashboard.php";
                       </script>
                       <?php
                        $roll++;
                        break;
                    }
                }
                if($roll == 0){
                    $stmt = "INSERT INTO students(roll_no,student_username,password,student_name,student_class,student_phone_number,student_birth) VALUES(?,?,?,?,?,?,?)";
                   $query = mysqli_prepare($conn,$stmt);
                   mysqli_stmt_bind_param($query,'isssiis',$roll_no,$student_username,$password,$student_name,$student_class,$student_phone_number,$student_birth);
                   $roll_no = $_POST['roll_no'];
                   $student_username = $_POST['username'];
                   $password = $_POST['password'];
                   $student_name = $_POST['name'];
                   $student_class = $_POST['student_class'];
                   $student_phone_number = $_POST['phone'];
                   $student_birth = $_POST['birthday'];
                   if(mysqli_stmt_execute($query))
                   {
                       echo 'success';
                       ?>
                       <script>
                       alert("Student Added Successfully");
                       window.location = "admin_dashboard.php";
                       </script>
                       <?php
                   }
                   else{
                    echo 'no success';
                    ?>
                       <script>
                       alert("Student Not Added Successfully");
                       window.location = "admin_dashboard.php";
                       </script>
                       <?php
                   }                   
                }
                
                
            // }
        
        ?>