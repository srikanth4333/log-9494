<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useraccounts";

 $conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM `employee`";
$result=$conn->query($sql);
if($result->num_rows >0)
{
    echo "<table><tr><th>id</th><th>name</th><th>email</th><th>salary</th><th>place</th></tr>";
    while($row=$result->fetch_assoc()){
       echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["salary"]."</td><td>".$row["place"]."</td></tr><br>";
   // echo $row['name'];
    }
    echo "</table>";
}