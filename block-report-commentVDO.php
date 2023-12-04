<?php
      include("authentication.php");
      include("database.php");

      
      if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $repoctComVdoID = $_GET['id'];
        $sql = "
            SELECT 
                  rs.repoctComVdoID ,
                  rs.member_id,
                  rs.comment_id,
                  rs.reason,
                  rs.created_at,
                  rs.status,
                  member.fname,
                  s.message,
                  s.member_id,
                  COUNT(rs.comment_id) as amount_report
            FROM report_comment AS rs
            LEFT JOIN member ON rs.member_id = member.id
            LEFT JOIN comment_video AS s ON rs.comment_id = s.commentID 
            WHERE rs.repoctComVdoID = '$repoctComVdoID'      
    ";
    $sql6 = "
    DELETE FROM videos WHERE member_id  = $Member_id  
";
    
    echo $sql;
    exit;

    $result= mysqli_query($connection, $sql);

    $row= mysqli_fetch_array($result);
    $MB = $row['comment_id'];
    // $repoercommentID2 = $row["repoercommentID"];
    // $spoilerID = $row['spoilerID'];

    $sql5 = "
                  SELECT report_comment.reportcommentID,
                  comment_spoiler.message, 
                  member.fname, 
                  comment_spoiler.member_id,
                  comment_spoiler.commentID
                          FROM comment_spoiler, member, report_comment
                          WHERE comment_spoiler.commentID = report_comment.comment_id 
                          AND member.id = comment_spoiler.member_id 
                          AND report_comment.comment_id = '$MB'
                          AND member.fname IS NOT NULL
                    ";

    // $sql7 = "
    //       SELECT  spoiler.spoilerID,
    //               member.id
    //               FROM spoiler, member
    //               WHERE spoiler.id = member.spoilerID
    //               AND member.id = spoiler.member_id =''

    // ";


                    $results5 = mysqli_query($connection, $sql5);
                    $row2 = mysqli_fetch_array($results5);

      $Member_id = $row2['member_id'];
      $CMD = $row2['commentID'];


      $report_comments = $result->fetch_all(MYSQLI_ASSOC);
              
       $sql4 = "
              DELETE FROM comment_spoiler WHERE commentID  = '$CMD' 
              ";
          
      
          $result4 = mysqli_query($connection, $sql4);
          if($result4){
            $sql2 = "
              DELETE FROM comment_video WHERE repoctComVdoID  = $repoctComVdoID  
              ";
              $result2 = $connection->query($sql2); 
              if ($result2){
                $sql1 = "
                  DELETE FROM member WHERE id  = $Member_id  
                  ";
                  $result1 = $connection->query($sql1); 
                if ($result1){

                  header('Location:list-report-commentVDO.php');
                  exit();
               
              }
          }
          
        }
          
      }
      ?>