<?php
    session_start();
    include("connection.php");
    include("function.php");
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['name'];
        $pass=$_POST['password'];
        if(!empty($name)&&!empty($pass)&&!is_numeric($name))
        {
           $query="insert into users(username,password) values('$name','$pass')";
           mysqli_query($conn,$query);
                   // $conn->query($sql);
                header("location:signin.php");
               die;
        }
        else
        {
            echo "please enter valid information";
        }
    }
?>
<!DOCTYPE html>
    <html>
        <body>
           
            <form name="form" action="" method="POST">
                <label> UserName</label>
                <input type="text" name="name" id="name">
                <span class="error" id="nameError"></span><br>
                <label> Password</label>
                <input type="text" name="password" id="password">
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signup">
        </form>
        </body>
        </html>