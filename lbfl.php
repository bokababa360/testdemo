<?php
$phn = $_REQUEST["phone"];

$url = "https://webapp.lankabangla.com/credit-card-application/upload.php?action=login";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"applicant_email"=>"JOSDF".$phn."JEXBC@GMAIL.COM", "applicant_mobile"=>$phn, "proceed"=>"Proceed"
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

