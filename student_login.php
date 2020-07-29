<?php include('index.php');
    <center> 
    <h3>Student Login</h3>
    <form action=""method="post">
        Email:  <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password"required><br><br>
        <input type="submit" name="submit">
    </form>
    <?php
    
    $email = "";
    $name = "";
    if(isset($_POST["submit"])){
        $query = mysqli_query($conn,"SELECT * FROM students where student_username='$_POST[email]'");
        while($row = mysqli_fetch_assoc($query)){
            if($row["student_username"] == $_POST["email"]){
                if($row["password"]==$_POST["password"]){
                    $_SESSION["email"] = $row["student_username"];
                    $_SESSION["name"] = $row["student_name"];
                    header("Location:student_dashboard.php");
                    echo "logged In";
                }
                else{
                    echo "wrong password";
                }
            }
            else{
                echo "wrong email";
            }
        }
    }
    ?>
    </center>
