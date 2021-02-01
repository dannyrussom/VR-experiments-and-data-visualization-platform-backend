<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "usersdb";

$con = new mysqli($host, $user, $pass, $db);

$sql = "SELECT * from professor";

$result = $con->query($sql);
while($row = mysqli_fetch_assoc($result)){

echo $row['name'] . "/";
}

$con->close();

?>