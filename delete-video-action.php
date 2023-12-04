<?php
      include("authentication.php");
      include("database.php");

      if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $videoactionID = $_GET['videoactionID'];
        // echo $videoactionID ;
        // exit;

      $sql = "
      DELETE FROM videoaction WHERE videoactionID = '" . $videoactionID . "'
      ";

      $result = $connection->query($sql); 
      if (!$result){
        echo ("wrong mysql command");
        exit();
      }
      header("location:index.php");
      exit();
}
?>