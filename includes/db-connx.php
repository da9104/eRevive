<?php
// $servername = '127.0.0.1';
// $username = 'root';
// $password = '';
// $db = 'register';
// $conn = mysqli_connect($servername, $username, $password, $db);
$conn = new PDO('mysql:dbname=register;host=localhost', 'root');

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//     header("Location:includes/error.php"); //custom error page
//    }
//    else{
// //    echo "Connected to database successfully.";
//    }

session_start();
/**
 * @param void | null
 * @return array | mixed
 * @desc THis function creates a new PDO connection and returns the       handler.
**/
  function DbHandler ()
  {
      $dbHost = 'localhost';
      $dbName = 'register';
      $dbUser = 'root';
      $dbPass = '';
      //Create a DSN for the database resource...
      $Dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
      //Create an options configuration for the PDO connection...
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try {
        $conn = new PDO($Dsn, $dbUser, $dbPass, $options);
       // $conn = new PDO('mysql:dbname=register;host=localhost', 'root');
        return $conn;
      } catch (Exception $e) {
        var_dump('Couldn\'t Establish A Database Connection. Due to the following reason: ' . $e->getMessage());
      }
  }

?>


