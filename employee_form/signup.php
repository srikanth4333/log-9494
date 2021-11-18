<?php
include('header.php');
?>
<?php
session_start();           
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        $pass=$_POST['password'];
        if(!empty($name)&&!empty($pass)&&!is_numeric($name)){
            //inserting values to table
           $query="insert into users(username,password) values('$name','$pass')";
           mysqli_query($conn,$query);
                   // $conn->query($sql);
                header("location:signin.php");
               die;
        }
        else{
            echo "please enter valid information";
        }
    }
?>   
    <div class="container" align="center">
            <form name="form" action="" method="POST">
                <label> UserName</label><br>
                <input type="text" name="name" id="name">
                <span class="error" id="nameError"></span><br>
                <label> Password</label><br>
                <input type="password" name="password" id="password"><br>
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signup">
            </form>
    </div>
<?php
include('footer.php');
?>
