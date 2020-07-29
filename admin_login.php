<?php ini_set('display_errors',1);
error_reporting(-1); 
include('index.php'); 
?>

    <center> 
    <h3>Admin Login</h3>
    <form action=""method="post">
        Email:  <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password"required><br><br>
        <input type="submit" name="submit">
    </form>
    <?php
    $email = "";
    $name = "";
    if(isset($_POST["submit"])){
        $query = mysqli_query($conn,"SELECT * FROM login where email='$_POST[email]'");
        while($row = mysqli_fetch_assoc($query)){
            if($row["email"] == $_POST["email"]){
                if($row["password"]==$_POST["password"]){
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["name"] = $row["name"];
                    header("Location:admin_dashboard.php");
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
</body>
</html>