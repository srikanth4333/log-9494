<?php
require('connection2.php');
$id=$_GET['editid'];
$sql="select * from employee where id=$id";
$result = mysqli_query($conn2, $sql);
$row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
    <html>
        <body style="center">
            <div class="container">
                <form name="form" action="" method="POST" onsubmit="return validate()"enctype="multipart/form-data" >
                    <label>Name:</label>                                    
                    <input type="text" name="name" id='name' value="<?php echo $row['name']; ?>"> <br>
                    <span class="error" id="nameError"></span><br>
                    <label>email:</label>
                    <input type="text" name="email" id='email'value="<?php echo $row['email']; ?>" > <br>
                    <span class="error" id="emailerror"></span><br>
                    <label>Salary:</label>
                    <input type="text" name="salary" id='salary'value="<?php echo $row['salary']; ?>"> <br>
                    <span class="error" id="salaryerror"></span><br>
                    <label>place:</label>
                    <input type="text" name="place" id='place'value="<?php echo $row['place']; ?>"> <br>
                    <span class="error" id="placeError"></span><br>
                    <div class="image">
                    <label for="image">Upload Image :</label>
                    <input type="file" id="image" name="image" accept="jpj/png/*" value="<img id='output_image' src='<?php echo $row['image']; ?>'>"><br><br>
                </div>
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </body>
    </html>
    <script src="validationdatabase.js">

        </script>
        <?php
        if(isset($_POST['submit'])){
    
            $name=$_POST['name'];
            $email=$_POST['email'];
            $salary=$_POST['salary'];
            $place=$_POST['place'];
            $file_name=time()."_".$_FILES['image']['name'];
            $tmp_name=$_FILES['image']['tmp_name'];
            $target_file="images/".$file_name;
            $move=move_uploaded_file($tmp_name,$target_file);
        
    $sql="UPDATE employee 
          SET name='$name',email='$email',salary='$salary',place='$place',image='$target_file' where id=$id";
          
    if( mysqli_query($conn2, $sql)===true){
        // echo "updated successfully";
        header('location:listing3.php');
    }else{
        echo "failed";
    }
}

    