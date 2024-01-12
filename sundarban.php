<?php
$phn = $_REQUEST["phone"];


$url = "https://api-gateway.sundarbancourierltd.com/graphql";

$data = array(
    "operationName" => "CreateAccessToken",
    "variables" => array(
        "accessTokenFilter" => array(
            "userName" => $phn
        )
    ),
    "query" => "mutation CreateAccessToken(\$accessTokenFilter: AccessTokenInput!) {\n  createAccessToken(accessTokenFilter: \$accessTokenFilter) {\n    message\n    statusCode\n    result {\n      phone\n      otpCounter\n      __typename\n    }\n    __typename\n  }\n}"
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
    ),
    CURLOPT_RETURNTRANSFER => true,
);

$curl = curl_init();
curl_setopt_array($curl, $options);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($httpCode == 200) {
    // Request successful, handle the response
    $responseData = json_decode($response, true);
    print_r($responseData);
} else {
    // Request failed
    echo "Error: " . $httpCode;
}
?>
