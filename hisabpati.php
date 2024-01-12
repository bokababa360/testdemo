<?php

$phn = $_REQUEST["phone"];
$url = "https://api.hishabpati.com/api/v1/merchant/register/otp/v2";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Content-Type: application/json",
   "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaXJzdF9uYW1lIjoiS2FyaW0iLCJsYXN0X25hbWUiOiJNaWEiLCJwaG9uZV9udW1iZXIiOiIwMTc1NTY4NTg0NCIsImJ1c2luZXNzX25hbWUiOiJrYXJpbSBTdG9yZSIsImNvZGUiOiI0MDcyNDgiLCJleHBpcnlfdGltZSI6MTY4ODkzMjk0MzYzMiwiaWF0IjoxNjg4OTMyNjQzLCJleHAiOjE2ODg5MzU2NDN9.FXaeXfskn1G4XgvFWL9GlBwfLAioHTXZ2FHg9h12PJE
Connection: keep-alive",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
 "business_name"=>"Karim Super shop","first_name"=>"Karim","last_name"=>"Molla","phone_number"=> $phn
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

