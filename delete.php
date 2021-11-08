<?php
include('connection2.php');
$id=$_REQUEST['delid'];
if(isset($_REQUEST['delid'])){
    //query to select which row sholud be deleted
    $sql="DELETE FROM employee where id=$id";
    // saving the result of the data
    $result=mysqli_query($conn2,$sql);
    if($result){
       
        header('location:listing3.php');
        echo "<script> alert('record deleted successfully') </script>";
    }else{
        echo "not deleted";
    }
}
?>