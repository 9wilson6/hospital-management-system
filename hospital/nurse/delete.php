<?php 
$table=$_REQUEST['table'];
$id=$_REQUEST['id'];
function delete($table, $id){
	require_once("../dbconfig.php");
	$query="";
	if ($table=="patient") {
		$query="DELETE FROM $table WHERE patient_id='$id'";
	}elseif ($table=="appointments") {
		$query="DELETE FROM $table WHERE rec_no='$id'";
	}
	
	$results=$db->query($query);

	if ($results==1) {
		if ($table=="patient") {
			header("LOCATION:patients.php");
		}
		
		if ($table =="appointments") {
			header("LOCATION:appointments.php");
		}
		
		
	}else{
		die($results);
	}
}

delete($table,$id);
 ?>
