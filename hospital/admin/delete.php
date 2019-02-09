<?php 
$table=$_REQUEST['table'];
$id=$_REQUEST['id'];
function delete($table, $id){
	require_once("../dbconfig.php");
	$query="";
	if ($table=="patient") {
		$query="DELETE FROM $table WHERE patient_id='$id'";
	}elseif ($table=="doctor") {
		$query="DELETE FROM $table WHERE doctor_id='$id'";
	}elseif ($table=="appointments") {
		$query="DELETE FROM $table WHERE rec_no='$id'";
	}elseif ($table="nurses") {
		$query="DELETE FROM $table WHERE nurse_id='$id'";
	}
	
	$results=$db->query($query);

	if ($results==1) {
		if ($table=="patient") {
			header("LOCATION:patients.php");
		}
		if ($table =="doctor" ) {
			header("LOCATION:doctors.php");
		}
		if ($table =="appointments") {
			header("LOCATION:appointments.php");
		}
		if ($table=="nurses") {
			header("LOCATION:nurses.php");
		}
		
	}else{
		die($results);
	}
}

delete($table,$id);
 ?>
