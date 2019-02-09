<?php 	
session_start();
function checkIfUserIsRegsitered(){
	
if (!isset($_SESSION['patient_id'])) {
	header("LOCATION:../index.php");
}
}

function checkIfDoctorIsRegsitered(){
	
if (!isset($_SESSION['doctor_id'])) {
	header("LOCATION:../index.php");
}
}

function checkIfIsAdmin(){

if (!isset($_SESSION['admin_id'])) {
	header("LOCATION:../index.php");
}	
}


function checkIfNurseIsRegistered(){

if (!isset($_SESSION['nurse_id'])) {
	header("LOCATION:../index.php");
}	
}



 ?>

