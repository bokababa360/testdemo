<?php

$phn = $_REQUEST["phone"];
$url = "https://api.shopoth.com/shop/api/v1/users/signup?warehouse_id=8";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
 "full_name" => "Karim Mia",
"phone" => $phn,
"email" => "",
"subscribe" => "true",
"gender" => "1", 
"date_of_birth" => "2023-03-29",
"password" => "LZpXakajVLvDBL3"
);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
die($resp);

?>

