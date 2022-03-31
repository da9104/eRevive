<?php 
include_once 'includes/header.php';

try {
    $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
    $id = $_GET["id"];
    // Delete rows in "sites", according to the value of "category" column
    $sql = "DELETE FROM `posts` WHERE `id`= $id";
    $count = $conn->exec($sql); 
    $conn = null;        // Disconnect
    header("Location: records.php");
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
?>