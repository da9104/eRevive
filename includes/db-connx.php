<?php
ob_start();
$conn = new PDO('mysql:dbname=id18631437_register;host=localhost', 'id18631437_root', '@Qksksk323100');
function DbHandler ()
  {
      $dbHost = 'localhost';
      $dbName = 'id18631437_register'; // local machine: register
      $dbUser = 'id18631437_root'; // local machine: root
      $dbPass = '@Qksksk323100'; //local machine: '';
      //Create a DSN for the database resource...
      $Dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
      //Create an options configuration for the PDO connection...
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      try {
        $conn = new PDO($Dsn, $dbUser, $dbPass, $options);
        return $conn;
      } catch (Exception $e) {
        var_dump('Couldn\'t Establish A Database Connection. Due to the following reason: ' . $e->getMessage());
      }
  }


