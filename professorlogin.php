<?php
$hostname = "localhost";
$user = "root";
$pass = "root";
$dbname = "usersdb";



//$first_name = "danny";
//$password1 = "pass123";


$first_name = $_POST['firstname'];
$password1 = $_POST['password'];


$con = mysqli_connect($hostname, $user, $pass, $dbname);

$sql = "SELECT password FROM professor WHERE name = ?";

$statement = $con->prepare($sql);
$statement->bind_param("s", $first_name);
$statement->execute();
$result = $statement->get_result();
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        //if($row['password'] == substr($password1, 0, -3))
        if($row['password'] == $password1)
        {
            echo "login successful <br>";
            echo $password1;
        }
        else{
            echo   " Password doesn't match ";
            echo $password1;
            echo $row['password'];
            echo strlen($password1);
            echo strlen($row['password']);
        }
    }
}
else{
    echo "user name does not exist!";
}

?>