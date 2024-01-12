<?php
$phn = $_REQUEST["phone"];


$url = "https://api.bongo-solutions.com/auth/api/v2/login/send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
   "operator"=> "all","msisdn"=> "88" . $phn,"token"=> "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJleHAiOjE2ODYyMjM3NTUuMH0.mojSMMX1DHztRWgv7r4JnR1f2NDUReuS0TAkH7xA_CbV4E6Aoj31SN3ncWTdz8xQgkyr5ioIJ_eEI4fALXuamQ","token_type"=> "CUSTOM_TOKEN_V1"
);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>

