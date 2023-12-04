<?php
  include("authentication.php");
  include("database.php");

      $sql3 = "
      SELECT 
          rs.reportspoilerID,
          rs.member_id,
          rs.spoiler_id,
          rs.reason,
          rs.created_at,
          rs.status,
          member.fname,
          s.spoiler_name,
          COUNT(rs.spoiler_id) as amount_report
      FROM report_spoiler AS rs
      LEFT JOIN member ON rs.member_id = member.id
      LEFT JOIN spoiler AS s ON rs.spoiler_id = s.spoilerID
      WHERE rs.status = 'สถานะระงับ'
      GROUP BY rs.spoiler_id
      ORDER BY reportspoilerID DESC
      ";
  
      $result3 = $connection->query($sql3);
      $row = mysqli_fetch_array($result3);

      $count  = $row['amount_report'];
      // echo $count;
      // exit;
      // echo $count;

      if ($count === '3') {
        // ถ้าค่าเท่ากับ 3 ให้ทำการลบ spoiler
        $sql2 = "DELETE FROM spoiler WHERE spoilerID IN (SELECT spoiler_id FROM report_spoiler WHERE status = 'สถานะระงับ' GROUP BY spoiler_id HAVING COUNT(spoiler_id) = 3)";
        $result2 = $connection->query($sql2); 


        $sql4 = "DELETE FROM report_spoiler WHERE spoiler_id IN (SELECT spoiler_id FROM report_spoiler WHERE status = 'สถานะระงับ' GROUP BY spoiler_id HAVING COUNT(spoiler_id) = 3)";
        $result4 = $connection->query($sql4); 
  }


?>
      