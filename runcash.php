<?php
$phn = $_REQUEST["phone"];
$url = "https://api.runcash.co/runcash/register/app/sendSms";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: okhttp/4.9.0",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"appsFlyerId"=>"1692938311415-1726537934558822510","pkg_name"=>"com.mengjiala.runcash","referrer"=>"utm_source=google-play&utm_medium=organic","app_version"=>"1.0.3","phone"=>$phn,"channel"=>"1","sign"=>"95fd15f15b37cfac41635e2b1fd2897b","imei"=>"","appversion"=>"1.0.3","type"=>"2","version"=>"1.0.3","timestamp"=>"1692938376659"
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

