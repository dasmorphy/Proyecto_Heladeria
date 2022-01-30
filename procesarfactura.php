<?php

$ch = curl_init();
$array = [];
$data = http_build_query($array);
curl_setopt($ch, CURLOPT_URL, 'https://localhost:7073/api/factura');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);

foreach ($decoded as $index => $value){
    echo "$index: $value";
}

curl_close($ch);


?>