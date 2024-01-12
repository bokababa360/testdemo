<?php
$phn = $_REQUEST["phone"];
$url = "https://www.thebodyshop.com.bd/smspro/customer/register/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept: */*",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/x-www-form-urlencoded",
   "X-Requested-With: XMLHttpRequest",
   "Content-Length: 20",
   "Origin: https://www.thebodyshop.com.bd",
   "Connection: keep-alive",
   "Referer: https://www.thebodyshop.com.bd/customer/account/create/",
   "Cookie: PHPSESSID=618b8c5j322jk7baapmc9qcar3; form_key=LZYNcHXd5UlFFG8n; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; sucuri_cloudproxy_uuid_2466b4a74=dde89a17a4ad442b2804462ab6ca3a78; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=3e9e1873c533c072ec586d74c8062e38; section_data_ids=%7B%7D",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-origin",
   "TE: trailers",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"mobile"=>"88".$phn
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

