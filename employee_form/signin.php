<?php
include('header.php');
session_start();

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
    <div class="container" align="center">
        <form name="form" action="" method="POST">
                <label> UserName</label><br>
                <input type="text" name="username" id="name" >
                <span class="error" id="nameError"></span><br>
                <label> Password</label><br>
                <input type="password" name="password" id="password"><br>
                <span class="error" id="passError"></span><br>
                <input type="submit" value="signin" id="signin" name="submit">
                <button name="signup"> <a href="signup.php"> signup</a>
                </form>
        </div>
        
    <?php
include('footer.php');
?>
