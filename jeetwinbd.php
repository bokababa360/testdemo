<?php
$phn1 = $_REQUEST["phone"];
$phn = ltrim($phn1, '0');  //to remove 0 from 11 digit number
$url = "https://www.jeetwinbd.com/service/member/mobile/check";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/json",
   "Content-Length: 47",
   "Referer: https://www.jeet-winbd.com/en-BD",
   "ocms-currency: BDT",
   "Origin: https://www.jeet-winbd.com",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-origin",
   "Cookie: lang=en; langCode=en-BD; connect.sid=s%3AQyGgmpUtvh1mS1ahx_PxjQF8iz9NpOHI.Ett0eKJPhgCLbdZP3z0QlW5q4whoJG8kSZ9LPCtNRzI",

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"phoneNumber"=>$phn,"purpose"=>"signup"
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

