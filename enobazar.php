<?php

$phn = $_REQUEST["phone"];


$url = "https://app.eonbazar.com/api/auth/register";
$data = array(
    "mobile" => $phn,
    "name" => "Karim Mia",
    "password" => "karim2023",
    "email" => "dghdj'.$phn.'dsgj@gmail.com"
);

$data_string = json_encode($data);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));

$result = curl_exec($ch);

curl_close($ch);

echo $result;

?>
