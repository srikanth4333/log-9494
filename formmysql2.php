<?php
require_once('configuration.php');
?>

<!DOCTYPE html>
    <html>
        <body>
            <div>
                <?php
                if(isset($_POST['submit']))
                {
                    //getting values from user by post method
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $salary=$_POST['salary'];
                    $place=$_POST['place'];
                    //inserting parameters and values to table by insert command
                    //we insert a question mark (?) where we take values from user to substitute
                    $sql="INSERT INTO employee (name , email, salary, place)VALUES(?,?,?,?)";
                    //prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly
                    $stmtinsert=$db->prepare($sql);

                    $result=$stmtinsert->execute([$name,$email,$salary,$place]);
                    //checking the values are submitted to database successfully or not
                    if($result)
                    {
                        echo "saved details";
                        header("location:listing2.php");
                    }
                    else
                    {
                        echo "errors occured while saving";
                    }
                }
                ?>
                </div>
            <div class="container">
                <form name="form" action="" method="POST" onsubmit="return validate()">
                    <label>Name:</label>                                    
                    <input type="text" name="name" id='name'> <br>
                    <span class="error" id="nameError"></span><br>
                    <label>email:</label>
                    <input type="text" name="email" id='email'> <br>
                    <span class="error" id="emailerror"></span><br>
                    <label>Salary:</label>
                    <input type="text" name="salary" id='salary'> <br>
                    <span class="error" id="salaryerror"></span><br>
                    <label>place:</label>
                    <input type="text" name="place" id='place'> <br>
                    <span class="error" id="placeError"></span><br>
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </body>
    </html>
    <script src="validationdatabase.js">

        </script>

    