<?php

$oldname = $_POST["oldname"];
$url = "http://34.142.233.148/upload.php";

// I guess the file is in the same directory as this script
$file = __DIR__.'\fuck2.png'; 

$headers = [
    'Content-Type: multipart/form-data',
    'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
];

$fields = [
    'upfile' => new CURLFile($file, 'image/png', $oldname.'.png')
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
$result0 = curl_exec($ch);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL,            "http://34.142.233.148/rename.php" );
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch2, CURLOPT_POST,           1 );
curl_setopt($ch2, CURLOPT_POSTFIELDS,     "oldname=".urlencode($oldname)."&newname=lmn" ); 
curl_setopt($ch2, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded')); 

$result = curl_exec($ch2);

echo $result;


$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL,            "http://34.142.233.148/delete.php" );
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch3, CURLOPT_POST,           1 );
curl_setopt($ch3, CURLOPT_POSTFIELDS,     "filename=lmn" ); 
curl_setopt($ch3, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded')); 
$result3 = curl_exec($ch3);
exit;
?>