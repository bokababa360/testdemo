<?php
$phn1 = $_REQUEST["phone"];
$phn = ltrim($phn1, '0');  //to remove 0 from 11 digit number
$url = "https://ehealth2all.com/api/v1/user/checkMobile";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//$data = "checkValue=%2B880%201773977612&language=en&=";
$ps = array(
  "checkValue"=>"+880 ".$phn,"language"=>"en"
);

$data = http_build_query($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

