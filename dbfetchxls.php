<?php 
$conn = new mysqli('localhost', 'root', '','web_scrapper_db'); 
mysqli_select_db($conn, 'crud'); 
$sql = "SELECT * FROM merchant_list"; 
$setRec = mysqli_query($conn, $sql); 
$columnHeader = ''; 
$columnHeader = "merchant_id" . "\t" . "coupon_dunia_merchant_name" . "\t" . "coupon_dunia_merchant_link" . "\t"; 
$setData = ''; 
while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=Merchant_Detail.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
?>