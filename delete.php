<?php
include("config.php");
include('session.php');
include('sqloperations.php');
try{
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = new sqloperations();
	$responce=$sql->delete($id);
	echo ($responce='success') ? "<script>alert('deleted succesfully!'); location.href='dashboardfinal.php';</script>" : "<script>alert('failed to delete!'); location.href='dashboardfinal.php';</script>";
}
}
catch (Exception $ex) 
{
   echo $ex->getMessage();
}
?>