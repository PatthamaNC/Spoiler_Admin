<?php
      include("authentication.php");
      include("database.php");

      $sql5 = "
      SELECT 
          rs.repoctComVdoID ,
          rs.member_id,
          rs.comment_id,
          rs.reason,
          rs.status,
          member.fname,
          member.status,
          s.message,
          s.member_id,
          COUNT(rs.comment_id) as amount_report
      FROM report_commentvdo AS rs
      LEFT JOIN member ON rs.member_id = member.id
      LEFT JOIN comment_video AS s ON rs.comment_id = s.commentID 
      WHERE rs.status = 'สถานะระงับ' AND member.status = '  ' AND s.member_id IS NOT NULL
      GROUP BY rs.comment_id
      ORDER BY repoctComVdoID  DESC
      ";

      $result5 = $connection->query($sql5);
      $row5 = mysqli_fetch_array($result5);

      $count  = $row5['amount_report'];
      // echo $count;
    
    $sql5 = "
                  SELECT report_commentvdo.repoctComVdoID ,
                  comment_video.message, 
                  member.fname, 
                  comment_video.member_id,
                  comment_video.commentID
                          FROM comment_video, member, report_commentvdo
                          WHERE comment_video.commentID = report_commentvdo.comment_id 
                          AND member.id = comment_video.member_id 
                          AND report_commentvdo.comment_id = comment_id
                          AND member.fname IS NOT NULL
                    ";


                    $results5 = mysqli_query($connection, $sql5);
                    $row2 = mysqli_fetch_array($results5);

      $Member_id = $row2['member_id'];
      $CMD = $row2['commentID'];

      
      if ($count === '3') {
        // ถ้าค่าเท่ากับ 3 ให้ทำการลบ comment
        $sql2 = "DELETE FROM comment_video WHERE commentID IN (SELECT comment_id FROM report_commentvdo WHERE status = 'สถานะระงับ' GROUP BY comment_id HAVING COUNT(comment_id) = 3)";
        $result2 = $connection->query($sql2); 


        $sql4 = "DELETE FROM report_commentvdo WHERE comment_id IN (SELECT comment_id FROM report_commentvdo WHERE status = 'สถานะระงับ' GROUP BY comment_id HAVING COUNT(comment_id) = 3)";
        $result4 = $connection->query($sql4); 

        $sql10 = "UPDATE member SET status = 'สถานะบล็อก' WHERE id = '". $Member_id. "' ";
        $result10 = $connection->query($sql10); 
  }

          
      
?>