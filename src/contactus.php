<?php
require_once 'connect.php';
$reply=array();
if(isset($_POST["your-name"]) && isset($_POST["your-email"]) && isset($_POST["your-message"])) {
    $name = $_POST["your-name"];
    $email = $_POST["your-email"];
    $message = $_POST["your-message"];
	$stmt = $conn->prepare("INSERT INTO queries (name,email,message) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $name, $email, $message);
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
