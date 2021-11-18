<?php
include('header.php');
session_start();
?>
<?php

//     $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "useraccounts";

// $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['username'];
        $pass=$_POST['password'];
        if(!empty($name)&&!empty($pass)&&!is_numeric($name))
        {
            //read from data base
           $query="select * from users where username='$name'and password='$pass' limit 1";
         $result=  mysqli_query($conn,$query);
                   
         if($result)
         {
           if($result && mysqli_num_rows($result) >0)
            {
             $user_data= mysqli_fetch_assoc($result);
                  if($user_data['password']==$pass)
                 {
                         $_SESSION['usr_name'] = $user_data['username'];
                         $_SESSION['usr_id'] = $user_data['id'];
                         //print_r($_SESSION);

                         header("location:contactslisting.php");
                         die;
                 }
    
            }
                 else
                {
                     echo "wrong password or username";
                }
         }                    
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
            
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .container
            {
                 align-items: center;
                justify-content: center;

            }
             
        </style>
    </head>
        <body>
            <?php
            ?>
            <form name="form" action="" method="POST">
            <div class="container" align="center">
                <label> UserName</label>
                <input type="text" name="username" id="name">
                <span class="error" id="nameError"></span><br>
                <label> Password</label>
                <input type="password" name="password" id="password">
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signin" id="signin" name="submit">
                <button name="signup"> <a href="signup.php"> signup</a>
            </div>
        </form>
        </body>
        </html>
        <script>
                $(document).ready(function(){
                $(document).on('click','#signin',function(){
                var username=$("#name").val();
                var password=$("#password").val();
                login(username,password);
             });
                function login(username,password){
                $.ajax({
                url:'.php',
                method:'POST',
                data:{username:username,password:password},
                success:function(data){
                if(data==1){
                window.location.href="indexcontacts.php";
                }
                else{
                $("#loginerror").html("enter valid username or password");
                }
             }
         });

     }
 });
</script>