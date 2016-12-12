<?php
// nearestdonors();

define('HOST', 'localhost');
define('USER','root');
define('PASS','felix1993');
define('DB', 'blooddb');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect');
if($_SERVER['REQUEST_METHOD']=='GET')
{
 	$bloodgroup= 'AB-';
 	$sql = "SELECT * FROM BLOOD_DONORS where(donor_blood_type='$bloodgroup')"; 
 	// where (donor_blood_type ='$bloodgroup')"
 	$r = mysqli_query($con,$sql);
 	$kenya="+254";
 	$result["information"]= array();
 	while ($row = mysqli_fetch_array($r))
 	{
 	        $data =array();
 	        $data["donor_id"]=$row["donor_id"];
		 	$data["donor_id_no"]=$row["donor_id_no"];
		    $data["donor_blood_type"]=$row["donor_blood_type"];
		    $data["donor_first_contact"]=$kenya.$row["donor_first_contact"];
		    $data["donor_optional_contact"]=$kenya.$row["donor_optional_contact"];
		    $data["last_donation date"]=$row["last_donation date"];
		    $data["donor_eligibility"]=$row["donor_eligibility"];
		    $data["latitude"]=$row["latitude"];
            $data["longitude"]=$row["longitude"];
		        array_push($result["information"], $data);

 	}
 	echo json_encode($result);
 
     mysqli_close($con);
 }

?>
