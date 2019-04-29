<?php
$url = 'http://172.29.1.3/api/person/read.php';
$data = array('api_key' => '12c65aa1362m10d14', 'key2' => 'value2');

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

echo $result;