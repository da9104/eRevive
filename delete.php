<?php 
include_once 'includes/header.php';
//  $id = $_GET["id"];
//  $query = " DELETE FROM `posts` WHERE `id`= $id";
//  $run = mysqli_query($conn, $query) or trigger_error(mysqli_error($conn));
//  header("Location: index.php");

try {
    $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
    $id = $_GET["id"];
    // Delete rows in "sites", according to the value of "category" column
    $sql = "DELETE FROM `posts` WHERE `id`= $id";
    $count = $conn->exec($sql);
  
   // $conn = null;        // Disconnect
    header("Location: records.php");
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }

?>