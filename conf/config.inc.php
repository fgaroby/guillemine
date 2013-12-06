<?php
$dns = 'mysql:host=HOST;dbname=DBNAME';
$login = 'LOGIN';
$pass = 'PASSWORD';


$cnx = new PDO( $dns, $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );