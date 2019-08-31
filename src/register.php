<?php
require_once 'connect.php';
$reply=array();
if(isset($_POST["leader"]) && isset($_POST["lmail"]) && isset($_POST["college"])&& isset($_POST["mobile"])) {
    $leader = $_POST["leader"];
    $lmail = $_POST["lmail"];
    $college = $_POST["college"];
    $mobile=$_POST["mobile"];
    $tech=$_POST["tech"];
    $nontech=$_POST["nontech"];
    $m1=$_POST["m1"];
    $m2=$_POST["m2"];
    $m3=$_POST["m3"];
    $m1mail=$_POST["m1mail"];
    $m2mail=$_POST["m2mail"];
    $m3mail=$_POST["m3mail"];
    $stmt = $conn->prepare("INSERT INTO registrations (leader,college,mobile,lmail,m1,m1mail,m2,m2mail,m3,m3mail,tech,nontech) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssssssss", $leader, $college, $mobile, $lmail, $m1, $m1mail, $m2, $m2mail, $m3, $m3mail, $tech,  $nontech);
    if($stmt->execute()==true){
        $reply["success"]=1;
    }
    else{
        $reply["success"]=0;
    }
	$reply["error"]=$conn->error;
	$stmt->close();
	$conn->close();
	echo json_encode($reply);
}
else{
	$reply["success"]="0";
	$reply["error"]="Parameters missing.";
	echo json_encode($reply);
}
?>
