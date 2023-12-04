<?php
      include("authentication.php");
      include("database.php");

            $sql55 = "
            SELECT 
            rs.reportcommentID ,
            rs.member_id,
            rs.comment_id,
            rs.reason,
            rs.created_at,
            rs.status,
            member.fname,
            member.status,
            s.message,
            s.member_id,
            COUNT(rs.comment_id) as amount_report
        FROM report_comment AS rs
        LEFT JOIN member ON rs.member_id = member.id
        LEFT JOIN comment_spoiler AS s ON rs.comment_id = s.commentID 
        WHERE rs.status = 'สถานะระงับ'   AND s.member_id IS NOT NULL
        GROUP BY rs.comment_id
        ORDER BY reportcommentID  DESC";

        
      $result55 = $connection->query($sql55);
      $row55 = mysqli_fetch_array($result55);

      $count  = $row55['amount_report'];
      echo $count;

    $sql5 = "
                  SELECT report_comment.reportcommentID,
                  comment_spoiler.message, 
                  member.fname, 
                  comment_spoiler.member_id,
                  comment_spoiler.commentID
                          FROM comment_spoiler, member, report_comment
                          WHERE comment_spoiler.commentID = report_comment.comment_id 
                          AND member.id = comment_spoiler.member_id 
                          AND report_comment.comment_id = comment_id
                          AND member.fname IS NOT NULL";


                    $results5 = mysqli_query($connection, $sql5);
                    $row2 = mysqli_fetch_array($results5);

      $Member_id = $row2['member_id'];
      $CMD = $row2['commentID'];


      if ($count === '3') {
        // ถ้าค่าเท่ากับ 3 ให้ทำการลบ comment
        $sql2 = "DELETE FROM comment_spoiler WHERE commentID IN (SELECT comment_id FROM report_comment WHERE status = 'สถานะระงับ' GROUP BY comment_id HAVING COUNT(comment_id) = 3)";
        $result2 = $connection->query($sql2); 


        $sql4 = "DELETE FROM report_comment WHERE comment_id IN (SELECT comment_id FROM report_comment WHERE status = 'สถานะระงับ' GROUP BY comment_id HAVING COUNT(comment_id) = 3)";
        $result4 = $connection->query($sql4); 

        $sql10 = "UPDATE member SET status = 'สถานะบล็อก' WHERE id = '". $Member_id. "' ";
        $result10 = $connection->query($sql10); 
       }
              
          

      ?>