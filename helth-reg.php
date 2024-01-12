<?php
$phn1 = $_REQUEST["phone"];
$phn = ltrim($phn1, '0');  //to remove 0 from 11 digit number
$ps = array(

);

$data = http_build_query($ps);
$url = "https://ehealth2all.com/api/v1/user/userSignup";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//$data = "fullname=Fuckboy&country_code=%2B880&mobile=1773977612&password=%40%40%40%402233&device_type=android&device_id=12345&language=en";
$ps = array("fullname"=>"Fuckboy","country_code"=>"+880","mobile"=>$phn,"password"=>"@@@@2233","device_type"=>"android","device_id"=>"12345","language"=>"en"
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

