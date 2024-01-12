<?php
$phn = $_GET['phone'];
$url = "http://103.4.145.86:8096/api/app/v1/otp/send";
$data = array(
    "msisdn" => "88".$phn
);

$data_string = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));

$result = curl_exec($ch);

curl_close($ch);

// $result contains the response from the server
echo $result;
?>
