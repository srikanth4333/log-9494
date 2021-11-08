<?php
require('connection2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee form</title>
    
    <script src="https://kit.fontawesome.com/840f47181e.js" crossorigin="anonymous"></script>
</head>
<body>
<script>
        function confirmdelete(){
            return confirm('Are you sure you want to delete Employee?');
        }
    </script> 
  <table width="70%" border="1">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>salary</th>
        <th>place</th>
        <th>Image</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        //connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "useraccounts";

        $conn2 = mysqli_connect($servername, $username, $password, $dbname);
                $sql="Select * from employee";
                $result = mysqli_query($conn2, $sql);
                $result_num_rows=mysqli_num_rows($result);

        while($row = mysqli_fetch_assoc($result)) { ?>
            <tr><td><?php echo $row['id']; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["salary"]; ?></td>
            <td><?php echo $row["place"]; ?></td>
            <td><img src="<?php echo $row['image'] ?>" height="20px" width='20px'></td>
            <td>
               <div class='btn-group'>
                  <button class='btn btn-primary' value="edit"><a href="update.php?editid=<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a>  </button>
                  <button class='btn btn-primary' value="delete" onclick="return confirmdelete()"><a href="delete.php?delid=<?php echo $row['id']; ?>"><i class='far fa-trash-alt'></i></a></button>
               </div>
            </td>
            </tr>
            <?php 
        
        } 
        ?>
    </tbody>
    </table><br>
    
</body>
</html>
