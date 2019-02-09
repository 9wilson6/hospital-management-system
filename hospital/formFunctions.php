<?php 
// require_once("dbconfig.php");
 session_start();
function doctorLogin(){
  

   global $db;
   global $password;
   global $username;
   global $error;
    $query="SELECT * FROM doctor WHERE password='$password' AND email='$username'";
$results=$db->query($query);
// die($results);
if (mysqli_num_rows($results)>0) {
   foreach ($results as $result) {
   
      $_SESSION['doctor_id']=$result['doctor_id'];
      $_SESSION['doctor_name']=$result['name'];
     header("LOCATION:doctor/home.php");
   }

}else{
    #error message
    #
    #
      $error="Invalid credentials!!";
   }
}///////////////////////////////////////////////////////////////////////////////////////////////////////
function adminLogin(){
 

   global $db;
   global $password;
   global $username;
   global $error;
    $query="SELECT * FROM admin WHERE password='$password' AND username='$username'";
$results=$db->query($query);
// die($results);
if (mysqli_num_rows($results)>0) {
   foreach ($results as $result) {
    // session_start();
      $_SESSION['admin_id']=$result['admin_id'];
      $_SESSION['admin_name']=$result['username'];
     header("LOCATION:admin/home.php");
   }

}else{
    #error message
    #
    #
      $error="Invalid credentials!!";
   }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
function nurseLogin(){


   global $db;
   global $password;
   global $username;
   global $error;
    $query="SELECT * FROM nurses WHERE password='$password' AND email='$username'";
$results=$db->query($query);
 // die($results);
if (mysqli_num_rows($results)>0) {
   foreach ($results as $result) {
    // session_start();
      $_SESSION['nurse_id']=$result['nurse_id'];
      $_SESSION['nurse_name']=$result['name'];
     header("LOCATION:nurse/home.php");
   }

}else{
    #error message
    #
    #
      $error="Invalid credentials!!";
   }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////
function patientLogin(){



   global $db;
   global $password;
   global $username;
   global $error;
    $query="SELECT * FROM patient WHERE password='$password' AND email='$username'";
$results=$db->query($query);
// die($results);
if (mysqli_num_rows($results)>0) {
   foreach ($results as $result) {
    // session_start();
      $_SESSION['patient_id']=$result['patient_id'];
      $_SESSION['patient_name']=$result['name'];
     header("LOCATION:patient/home.php");
   }

}else{
    #error message
    #
    #
      $error="Invalid credentials!!";
   }
}
 ?>



