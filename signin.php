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
                header("location:formmysql2.php");
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
        <body>
            <?php
            ?>
            <form name="form" action="" method="POST">
                <label> UserName</label>
                <input type="text" name="name" id="name">
                <span class="error" id="nameError"></span><br>
                <label> Password</label>
                <input type="text" name="password" id="password">
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signin" name="submit">
        </form>
        </body>
        </html>