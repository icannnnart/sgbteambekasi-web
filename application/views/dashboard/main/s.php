<?php

$url = "https://obevcimanyd179569584.thapcam.link/31l6vHb5qCqNjsInoJntFg/Fv2lucGIbhPi2caWYvF5Lg/1725987752231/live/phoFHD/chunklist.m3u8";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "referer: https://t.fdcdn.xyz/",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>

