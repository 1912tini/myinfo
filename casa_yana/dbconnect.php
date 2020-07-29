<?php

$dbhost = 'localhost';
$dbname = 'dbyana';
$dbuser = 'dbyana';
$dbpass = 'dbyana';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Failed to connect to MySQL: " . mysqli_error()); 
$connect->query("SET NAMES 'utf8'");

?>
    <?php
    /*$sql="SELECT * FROM users";
    if ($resultado = $connect->query($sql)) {  
        //echo var_dump($resultado);
        while ($row = $resultado->fetch_assoc()) {
            echo "Estos son los datos ".$row['usname'];
        } 
    }*/
    ?>