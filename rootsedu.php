<?php
$phn = $_REQUEST["phone"];
$url = "https://rootsedulive.com/api/auth/register";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"name"=>"Karim Molla","phone"=>"88".$phn,"email"=>"karimmolla@gmail.com","password"=>"iDSnWh6rzp9KNAY","confirmPassword"=>"iDSnWh6rzp9KNAY"
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
eco($resp);

?>

