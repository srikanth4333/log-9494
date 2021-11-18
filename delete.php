<?php
include('connection.php');
$id=$_REQUEST['delid'];
if(isset($_REQUEST['delid'])){
    //query to select which row sholud be deleted
    $sql="DELETE FROM contacts where user_id=$id";
    // saving the result of the data
    $result=mysqli_query($conn,$sql);
    if($result){
       
        header('location:contactslisting.php');
        echo "<script> alert('record deleted successfully') </script>";
    }else{
        echo "not deleted";
    }
}
?>