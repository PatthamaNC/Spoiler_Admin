<?php
      include("authentication.php");
      include("database.php");

      // Delete Report ที่ตรวจสอบแล้ว ไม่เป็นไปตามที่ Report เข้ามา 
      if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $reportspoilerID = $_GET['id'];
        
        $sql = "
              DELETE FROM report_spoiler WHERE reportspoilerID  = '" . $reportspoilerID  . "'
              ";

              $result = $connection->query($sql); 
                    if (!$result){
                      echo ("wrong mysql command");
                      exit();
                    }
                    header("location:test.php");
                    exit();
}
          if(isset ($_GET['action']) && $_GET['action'] == 'edit'){
            $reportspoilerID = $_GET['reportspoilerID'];

            $sql = "
            SELECT * FROM report_spoiler WHERE reportspoilerID = '" . $reportspoilerID . "'
          ";
            
          $result = $connection->query($sql); 
          if (!$result){
            echo ("wrong mysql command");
            exit;
          }

          $report_spoiler = $result->fetch_assoc();
          echo '<pre>';
          print_r($report_spoiler);
          exit;
          }

// if(isset($_POST['buttonEditVideoAction'])){
//   $sql = "
//   UPDATE  report_spoiler SET
//   member_id = '" . $_POST['member_id'] . "',
//   spoiler_id= '" . $_POST['spoiler_id'] . "',
//   reason= '" . $_POST['reason'] . "',
//   created_at= '" . $_POST['created_at'] . "',
//   status= '" . $_POST['status'] . "'

//       WHERE reportspoilerID = '" . $_POST['reportspoilerID'] . "'
//         ";

//         $result = $connection->query($sql); 
//         if (!$result){
//           echo ("wrong mysql command");
//           exit();
//         }

//         header("location:test.php");
//         exit();
// }


?>