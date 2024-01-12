<?php
$phn = $_REQUEST["phone"];
// API endpoint URL
$url = "https://api.bdkepler.com/api_middleware-0.0.1-RELEASE/registration-generate-otp";

// JSON data to be sent in the request
$data = array(
    "deviceId" => "7dtdhid45c0f0901",
    "deviceInfo" => array(
        "deviceInfoSignature" => "D0923F3GDHJXJDTIHFDTIGGHURHFATI7605A3FA",
        "deviceId" => "7d8b0agi0g0f0901",
        "firebaseDeviceToken" => "",
        "manufacturer" => "MI",
        "modelName" => "NOTE 10",
        "osFirmWireBuild" => "",
        "osName" => "Android",
        "osVersion" => "10",
        "rootDevice" => 0
    ),
    "operator" => "Gp",
    "walletNumber" => $phn  // Replace with the actual wallet number
);

// Convert data to JSON format
$jsonData = json_encode($data);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Display the API response
echo $response;

?>
