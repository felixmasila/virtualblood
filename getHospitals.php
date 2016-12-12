<?php
define('HOST', 'localhost');
define('USER','root');
define('PASS','felix1993');
define('DB', 'blooddb');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('unable to connect');
if($_SERVER['REQUEST_METHOD']=='GET'){
 
 $sql = "SELECT * FROM hospitals";
 
 $r = mysqli_query($con,$sql);
 
 //$row = mysqli_fetch_array($r);
 
 $result["details"] = array();
 while ($row = mysqli_fetch_array($r))
 {
    $data = array();
    $data["ID"]=$row["ID"];
    $data["Name"]=$row["Name"];
    $data["level"]=$row["level"];
    $data["latitude"]=$row["latitude"];
    $data["longitude"]=$row["longitude"];
        array_push($result["details"], $data);
  }
 // array_push($result,array(
 // "placename"=>$res['placename'],
 // "latitude"=>$res['latitude'],
 // "longitude"=>$res['longitude'],
 // "address"=>$res['address'],
 // "email"=>$res['email']
 // )
 // );
 
 echo json_encode($result);
 
 mysqli_close($con);
 
 }
