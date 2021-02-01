<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "usersdb";

$firstname = $_POST['name'];
$spassword = $_POST['password'];
$professor = $_POST['professor'];
$resetquestion = $_POST['question'];
$resetanswer = $_POST['answer'];
$professor_id;
$resetquestion_id;

//$firstname = "alex";
//$spassword = "alexa32";
//$professor = "rui yun";
//$resetquestion = "What elementary school did you attend?";
//$resetanswer = "don bosco";


$con = new mysqli($host, $user, $pass, $db);

$sql1 = "SELECT professor_id FROM professor WHERE name = ?";
$statement1 = $con->prepare($sql1);
$statement1->bind_param("s", $professor);
$statement1->execute();
$result1 = $statement1->get_result();
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_assoc($result1)){
        $professor_id = $row1['professor_id'];
    }
}

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

echo "question id = " . $resetquestion_id . "<br> professor id = " . $professor_id;

$sql3 = "INSERT INTO student (name, password, professor_id, resetquestion, resetanswer)
        VALUES (?, ?, ?, ?, ?)";
$statement3 = $con->prepare($sql3);
$statement3->bind_param("ssiis",$firstname, $spassword, $professor_id, $resetquestion_id, $resetanswer);
$statement3->execute();




?>

