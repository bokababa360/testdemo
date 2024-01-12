<?php

$phn = $_REQUEST["phone"];
$url = "https://identity.tllms.com/api/request_otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: okhttp/7.4",
	
   "Content-Type: application/json"

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$ps = array(
    
"app_client_id" => "12d13938-60f3-4a3e-ab56-ddadb86913a2",
"feature" => "",
"phone" => "+88-0" .$phn,
"type" => "call"


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