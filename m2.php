<?php
  // $serverName = "localhost\\sqlexpress"; //serverName\instanceName
  // $connectionInfo = array( "Database"=>"webscrapper_db", "UID"=>"", "PWD"=>"");
 // $conn = sqlsrv_connect( $serverName, $connectionInfo);
 //$res = sqlsrv_query( $conn, $sql);

$conn = mysqli_connect('localhost','root','','web_scrapper_db');

$P = $_POST['result'];

//$V = count($P);
for($i=0; $i<=count($P); $i++){
    $sql = "insert into merchant_list(coupon_dunia_merchant_name) values('$P[$i]')";
    $res = mysqli_query($conn,$sql);
}


if($res==true){
    return true;
}else{
    return false;
}
//return $P;


?>