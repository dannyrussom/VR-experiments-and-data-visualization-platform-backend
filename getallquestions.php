<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "usersdb";

$con = new mysqli($host, $user, $pass, $db);

$sql = "SELECT * from question";

$result = $con->query($sql);
while($row = mysqli_fetch_assoc($result)){

    echo $row['resetquestion'] . "/";
}

$con->close();

?>