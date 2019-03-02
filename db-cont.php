<?php

$server='localhost';
$user='root';
$password='';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
);


try {
    $cont = new PDO("mysql:host=$server;dbname=ieee", $user, $password , $option);
}
catch(PDOException $e)
    {
    echo "Error -->  " . $e->getMessage();
    }

?>
