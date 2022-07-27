<?php 
 include("config.php");
 error_reporting(0);
$id = $_POST['id']; 
$ar_name = $_POST["ar_name"];
$en_name = $_POST["en_name"];
$b_place = $_POST["birth_place"];
$b_date  = $_POST["birth_date"];
$address = $_POST["address"];
$phone   = $_POST["phone"];
$email   = $_POST["email"];
$univercity = $_POST["univercity"];
$faculity = $_POST["faculity"];
$degree   = $_POST["degree"];
$specialty = $_POST["specialty"];
$grad_date = $_POST["grad_date"];

$stmt = $con->prepare("UPDATE trainer SET ar_name=? , en_name = ? , birth_place = ? , birth_date = ? , address = ? , phone = ? , email = ? , univercity = ? , faculity = ? , degree = ? , specialty = ? , grad_date = ? WHERE ID = ? ");
$stmt->execute(array($ar_name,$en_name,$b_place,$b_date,$address,$phone,$email,$univercity,$faculity,$degree,$specialty,$grad_date,$id));
echo "تم التعديل بنجاح";

?>