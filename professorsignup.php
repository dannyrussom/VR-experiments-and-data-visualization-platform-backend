<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "usersdb";

$firstname = $_POST['name'];
$spassword = $_POST['password'];
$resetquestion = $_POST['question'];
$resetanswer = $_POST['answer'];
$resetquestion_id;

//$firstname = "alex";
//$spassword = "alexa32";
//$resetquestion = "What elementary school did you attend?";
//$resetanswer = "don bosco";


$con = new mysqli($host, $user, $pass, $db);


$sql2 = "SELECT resetquestion_id FROM question WHERE resetquestion = ?";
$statement2 = $con->prepare($sql2);
$statement2->bind_param("s", $resetquestion);
$statement2->execute();
$result2 = $statement2->get_result();
if(mysqli_num_rows($result2)>0){
    while($row1 = mysqli_fetch_assoc($result2)){
        $resetquestion_id = $row1['resetquestion_id'];
    }
}

echo "question id = " . $resetquestion_id;

$sql3 = "INSERT INTO professor (name, password, resetquestion, resetanswer)
        VALUES (?, ?, ?, ?)";
$statement3 = $con->prepare($sql3);
$statement3->bind_param("ssis",$firstname, $spassword, $resetquestion_id, $resetanswer);
$statement3->execute();




?>
