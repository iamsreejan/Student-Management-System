<?php include('index.php');
if($_SESSION['email']==''){
        header("location:login.php");
    }?>

    <div ><br><br><br>
        <form action="" method="post">
        <center>                     
                        <input type="submit" name="edit_student" value="Edit Student">
                    
                        <input type="submit" name="add_student" value="Add New Student">
                    
                        <input type="submit" name="delete_student" value="Delete Student">

                        <input type="submit" name="all_students" value="Show All Students">
        </center>   
        </form>
    </div>
    <div id="right_side">
        <br><br>
        <?php    
            if(isset($_POST['all_students'])){
                // $id = 0;
                // function detail($conn,$id){
                //     $query = mysqli_query($conn,"SELECT * FROM students WHERE student_id >'{$id}' AND student_id <= '{$id}' +10");//".$id."AND id > ".$id."
                //     while($row = mysqli_fetch_assoc($query)){
                //         $count = 1;
                        
                //             echo "<center>".'roll number:'.$row['roll_no']." ";
                //             echo 'Username : '.$row['student_username'].' ';
                //             echo 'Name : '.$row['student_name'].' ';
                //             echo 'class : '.$row['student_class'].' ';
                //             echo 'phone number'.$row['student_phone_number'].' ';
                //             echo 'Birthday :'.$row['student_birth'].'<br>'.'</center><hr>';                        
                //             $count++;
                //             if($count==10){
                //             $id = $row['student_id'];
                //             return;
                //         }
                //     }
                // }
                // detail($conn,0);
                // echo '<center><form method = "post"> <input type="submit" value = "Next Page" name = "next_page" > </form></center><br><br>';
                // if(isset($_POST['next_page'])){
                //    echo $id;
                //    detail($conn,$id+10);
                // }
                header("Location:all_student.php");
        
            }
            // if(isset($_POST['search_student'])){
            //     
            // }
            
        if(isset($_POST['edit_student'])){
            ?>
            <center> 
            <form method ="post"> <input type="text" placeholder="Enter Roll No." name="edit_roll"> <br>
            <input type="submit"></form></center>
            <?php
        }
        if(isset($_POST['edit_roll'])){
            $query = mysqli_query($conn,"SELECT * FROM students where roll_no='$_POST[edit_roll]'");
            $count = 0;
            while($row = mysqli_fetch_assoc($query)){
                if($row['roll_no'] == $_POST['edit_roll']){
                    echo "<center><form action='edit_student.php' method='post'>".'roll number:<input type = "text" name = "roll_no" value='.$row['roll_no'].'><br>';
                    echo 'Name: <input type = "text" name="student_name" value= '.$row['student_name'].'><br>';
                    echo 'class : <input type = "text" name="student_class" value = '.$row['student_class'].'><br>';
                    echo 'phone number : <input type = "text" name="student_phone_number" value='.$row['student_phone_number'].'><br>';
                    echo 'Birthday : <input type = "date" name="student_birth" value = '.$row['student_birth'].'><br>';
                    echo '<input type="submit"></form></center>';
                    $count++;
                }                    
        }
        if($count==0){
            echo "wrong roll_no";
        }
    }
        if(isset($_POST['add_student'])){
            ?>
            <center>
            <form action="add_student.php" method ="post">
            Roll Number : <input type="text" name="roll_no"><br>
            Username : <input type="text" name="username"><br>
            Password : <input type="password" name="password"><br>
            Name : <input type="text" name="name"><br>
            Class : <input type="text" name="student_class"><br>
            Phone Number<input type="phone" name="phone"><br>
            Birthday : <input type="date" name="birthday"><br>
            <input type="submit" >
            </form></center>
            <?php
        }
        if(isset($_POST['delete_student'])){
            ?>
            <center> 
            <form method ="post"> <input type="text" placeholder="Enter Roll No." name="delete_roll"> <br>
            <input type="submit"></form></center>
            <?php
        }
        if(isset($_POST["delete_roll"])){
            
            $delete_roll = $_POST["delete_roll"];
            // $sql = "SELECT student_name FROM students where roll_no='$_POST[delete_roll]'";
            // $query = mysqli_query($conn,$sql);echo "yes";
        ?>
        <script>
        if(confirm("delete Roll no <?php echo $delete_roll?> ")){
            document.write("<?php 
            $sql = 'DELETE FROM students where roll_no ="'.$delete_roll.'"';
            if(mysqli_query($conn,$sql)){
                echo "yes";
            }
            else{
                echo "Error deleting record: " . mysqli_error($conn);
            }
            ?>");
            window.location = "admin_dashboard.php";
        }
        else{
            window.location = "admin_dashboard.php";
        }
        </script>
        }
        <?php
            
         
            
        }
        ?>
    </div>
