<?php
    include 'index.php';
    if($_SESSION['email']==''){
        header("location:login.php");
    }
    echo '<center><a href = "/admin_dashboard.php">DashBoard</a><br><br>';
    $count = 0;
?>     
        <center> 
            <table>
                <tr><strong>
                    <td><center>Serial No. </center></td>
                    <td><center>Roll Number</center></td>
                    <td><center>Username</center></td>
                    <td><center>Name</center></td>
                    <td><center>Class</center></td>
                    <td><center>Phone Number</center></td>
                    <td><center>Birth Day</center></td>
                    </strong>
                </tr>
            
        
        <?php
                $results_per_page = 10;  
                $query = "SELECT * FROM students WHERE student_name LIKE '%$_POST[search_roll]%' OR student_username LIKE '%$_POST[search_roll]%'OR roll_no='$_POST[search_roll]';";
                $result = mysqli_query($conn,$query);
                $number_of_result = mysqli_num_rows($result);  
                $number_of_page = ceil ($number_of_result / $results_per_page);  
                if (!isset ($_GET['page']) ) {  
                    $page = 1;  
                } else {  
                    $page = $_GET['page'];  
                }  
                $page_first_result = ($page-1) * $results_per_page;  
                echo $page_first_result;
                $query = mysqli_query($conn,"SELECT * FROM students  WHERE student_name LIKE '%$_POST[search_roll]%' OR student_username LIKE '%$_POST[search_roll]%' OR roll_no='$_POST[search_roll]' LIMIT " . $page_first_result . ',' . $results_per_page);
                $count = 0;
                while($row = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><center><?php echo ++$count; ?></center></td>
                    <td><center><?php echo $row['roll_no']; ?></center></td>
                    <td><center><?php echo $row['student_username']; ?></center></td>
                    <td><center><?php echo $row['student_name']; ?></center></td>
                    <td><center><?php echo $row['student_class']; ?></center></td>
                    <td><center><?php echo $row['student_phone_number']; ?></center></td>
                    <td><center><?php echo $row['student_birth']; ?></center></td>   
                </tr>
                <?php
                }
                echo '</table><br></center>';
                for($page = 1; $page<= $number_of_page; $page++) {  
                    echo '<a href = "Search_Student.php?page=' . $page . '">' . $page . ' </a>'; 
                }  
                            echo '<br></center><br><br>'; 
        ?>