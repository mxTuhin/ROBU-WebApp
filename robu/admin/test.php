<?php
$sms="Tuhin";
$smsT="Hello%20$sms%20Thank%20You%20For%20Getting%20Registered%20With%20ROBU.%20Proceed%20to%20The%20Following%20Link%20To%20Complete%20Registration%20Process.%20robulab.cf/admin/";
$curl = curl_init();
$nm="01678710456";
$nmb='88'.$nm.'';
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.aamarhost.com/smsapi/non-masking?api_key=$2y$10$8sm003CFLF2rfwIu9bJNEOfFqJJXRGdS9Ia27RRIQSmsDlgcdYAsq&smsType=text&mobileNo=$nmb&smsContent=$smsT",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>



<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.aamarhost.com/api/balance?api_key=$2y$10$8sm003CFLF2rfwIu9bJNEOfFqJJXRGdS9Ia27RRIQSmsDlgcdYAsq",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} ?>