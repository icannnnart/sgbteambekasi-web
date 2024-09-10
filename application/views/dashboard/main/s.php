<?php

$url = "https://obevcimanyd179569584.thapcam.link/31l6vHb5qCqNjsInoJntFg/Fv2lucGIbhPi2caWYvF5Lg/1725987752231/live/phoFHD/chunklist.m3u8";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: */*",
   "accept-language: en-US,en;q=0.9",
   "dnt: 1",
   "origin: https://t.fdcdn.xyz",
   "priority: u=1, i",
   "referer: https://t.fdcdn.xyz/",
   "sec-fetch-dest: empty",
   "sec-fetch-mode: cors",
   "sec-fetch-site: cross-site",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>

