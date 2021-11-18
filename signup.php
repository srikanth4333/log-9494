<?php
include('header.php');
session_start();
?>
<?php
    
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "useraccounts";

$conn = mysqli_connect($servername, $username, $password, $dbname);
                
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['name'];
        $pass=$_POST['password'];
        if(!empty($name)&&!empty($pass)&&!is_numeric($name))
        {
            //inserting values to table
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
    <head>
        <style>
            input
            {
                margin: auto;
                display: flex;
                align: center;
                justify-content: center;
            }
            .container
            {
                 align: center;
                justify-content: center;

            }
             
        </style>
    </head>
        <body>
           <div calss="container">
            <form name="form" action="" method="POST">
                <label> UserName</label>
                <input type="text" name="name" id="name">
                <span class="error" id="nameError"></span><br>
                <label> Password</label>
                <input type="text" name="password" id="password">
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signup">
            </form>
        </div>
        </form>
        </body>
        </html>

        