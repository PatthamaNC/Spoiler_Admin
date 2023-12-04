<?php
  include("authentication.php");
  include("database.php");
    
        $sql1 = "
        SELECT 
        rs.reportvideoID,
        rs.member_id,
        rs.video_id,
        rs.reason,
        rs.status,
        member.fname,
        s.name,
        s.details,
        COUNT(rs.video_id) as amount_report
      FROM report_video AS rs
      LEFT JOIN member ON rs.member_id = member.id
      LEFT JOIN videos AS s ON rs.video_id = s.videosID
      WHERE rs.status = 'สถานะระงับ '
      ORDER BY reportvideoID DESC
      ";

      $result1 = $connection->query($sql1);
      $row = mysqli_fetch_array($result1);

      $count  = $row['amount_report'];
      // echo $count;
      // exit;

      
      if ($count === '3') {
        // ถ้าค่าเท่ากับ 3 ให้ทำการลบ voideo
        $sql2 = "DELETE FROM videos WHERE videosID IN (SELECT video_id FROM report_video WHERE status = 'สถานะระงับ' GROUP BY video_id HAVING COUNT(video_id) = 3)";
        $result2 = $connection->query($sql2); 


        $sql3 = "DELETE FROM report_video WHERE video_id IN (SELECT video_id FROM report_video WHERE status = 'สถานะระงับ' GROUP BY video_id HAVING COUNT(video_id) = 3)";
        $result3 = $connection->query($sql3); 
  }
 
    // $sql = "
    //   DELETE FROM videos WHERE videosID  = '" . $videosID  . "'
    //   ";
    //   $result = $connection->query($sql);

    //   $sql1 = "
    //   DELETE FROM report_video WHERE video_id  = '" . $videosID  . "'
    //   ";
    //   $result1 = $connection->query($sql1);

    //     if (!$result){
    //       echo ("wrong mysql command");
    //       exit();
    //     }

    //       header("location:list-report-videos.php");
    //     exit();
      
  
?>