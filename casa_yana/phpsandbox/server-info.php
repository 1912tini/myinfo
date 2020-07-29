<?php
#$_SERVER SUOERGLOBAL

// Create Server Array
$server =[
   'Host Server Name' => $_SERVER['SERVER_NAME'],
   'Host Header' => $_SERVER['HTTP_HOST'],
   'Server Software' => $_SERVER['SERVER_SOFTWARE'],
   'Document Root' => $_SERVER['DOCUMENT_ROOT'],
   'Current Page' => $_SERVER['PHP_SELF'],
   'Absolute Path' => $_SERVER['SCRIPT_FILENAME']
];
   print_r($server);

   //Create Client Array

   $client =[
     'Client System info' => $_SERVER['HTTP_USER_AGENT'],
     'Client IP' => $_SERVER['ROMOTE_ADDR'],
     'Remote Port' => $_SERVER['REMOTE_PORT']
   ];
   print_r($client);
?>