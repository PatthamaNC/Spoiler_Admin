<?php
    
    include("database.php");
    include("Test-block-comVDO.php");

    // if (isset($_POST['action']) && $_POST['action'] == 'report-detail') {
    //     $commentID  = $_POST['commentID '];

    //     $sqlReportDetail = "
    //     SELECT 
    //         rs.reportcommentID ,
    //         rs.member_id,
    //         rs.comment_id,
    //         rs.reason,
    //         rs.created_at,
    //         rs.status,
    //         member.fname,
    //         s.message
    //     FROM report_comment AS rs
    //     LEFT JOIN member ON rs.member_id = member.id
    //     LEFT JOIN comment_spoiler AS s ON rs.comment_id = s.commentID 
    //     WHERE rs.comment_id = '".$commentID ."'
    //     ORDER BY reportcommentID  DESC
    //     ";

    //     $resultReportDetail = $connection->query($sqlReportDetail);

    //     $reponse = [
    //         'status' => 'error',
    //         'message' => ''
    //     ];
    //     if (!$resultReportDetail){
    //         $response['message'] = 'wrong sql command';
    //         header("Content-Type: application/json; charset=utf-8");
    //         echo json_encode($response);
    //         exit;
    //     }


    //     $reportDetail = $resultReportDetail->fetch_all(MYSQLI_ASSOC);

    //     $reportDetailMessage = "";
    //     $reportDetailMessage .= "<table style=\"width: 100%\">";

    //     foreach($reportDetail AS $idx => $item) {
    //         $reportDetailMessage .= "<tr>";
    //         $reportDetailMessage .= "<td>".$item['fname']."</td>";
    //         $reportDetailMessage .= "<td>".$item['reason']."</td>";
    //         $reportDetailMessage .= "</tr>";
    //     }

    //     $reportDetailMessage .= "</table>";
    //     $response['status'] = 'success';
    //     $response['message'] = $reportDetailMessage;
    //     header("Content-Type: application/json; charset=utf-8");
    //     echo json_encode($response);
    //     exit;
    // }

    $sql = "
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

    $result = $connection->query($sql);

    if (!$result){
      echo "wrong mysql command" ;
      exit;
    }


    $report_commentvdos = $result->fetch_all(MYSQLI_ASSOC);
    // echo '<pre>';
    // print_r($report_comments);
    // exit;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>TheMoviesSpoiler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="icon" type="image/x-icon" href="logo03.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">

    <!-- themes side-menu -->
    <link class="main-stylesheet" href="pages/css/themes/simple.css" rel="stylesheet" type="text/css" />
    <!--end themes side-menu -->

    <!-- data table -->
    <link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
   <!-- end datatable -->

   <!-- <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" /> -->


   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
    *{
      font-family: 'Noto Sans Thai', sans-serif;
    }
    </style>
  </head>
  <body class="fixed-header ">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <!-- <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22"> -->
        <div class="sidebar-header-controls">
          <!-- <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button> -->
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->

        <?php include("side-menu.php"); ?>

    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">

    <?php include("header.php"); ?>

      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <p>The Movies Spoiler</p>
                  </li>
                  <li><a style="font-family: 'Noto Sans Thai', sans-serif;" href="#" class="active">ข้อมูลรายงานความคิดเห็นวิดีโอภาพยนตร์สปอยล์</a>
                  </li>
                </ul>
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
                      <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div style="font-family: 'Noto Sans Thai', sans-serif; font-size: 15px;" class="panel-title">ข้อมูลรายงานความคิดเห็นวิดีโอภาพยนตร์สปอยล์</div>
                <div class="pull-right">
                  <div class="col-xs-8">
                    <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" id="search-table" class="form-control pull-right" placeholder="ค้นหา">
                  </div>
                  
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-search table-responsive-block" id="videoHorrorTable">
                  <thead>
                    <tr>
                      <th style="font-family: 'Noto Sans Thai', sans-serif;">ID</th>
                      <!--<th>ID สมาชิก</th>-->
                      <th style="font-family: 'Noto Sans Thai', sans-serif;">ความคิดเห็นที่ถูกรายงาน</th>
                      <th style="font-family: 'Noto Sans Thai', sans-serif;">เหตุผลการรายงาน</th>
                      <th style="font-family: 'Noto Sans Thai', sans-serif;">ผู้ถูกรายรายงาน</th>
                      <!-- <th style="font-family: 'Noto Sans Thai', sans-serif;">สถานะ</th> -->
                      
                      <th style="font-family: 'Noto Sans Thai', sans-serif;">จำนวนการรายงาน</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($report_commentvdos AS $index => $report_commentvdo){
                    $MB = $report_commentvdo['comment_id'];
                    $sql2 = "
                    SELECT 
                    report_commentvdo.repoctComVdoID,
                        comment_video.message,
                          member.fname,
                          comment_video.member_id
                          FROM comment_video, member, report_commentvdo
                          WHERE comment_video.commentID = report_commentvdo.comment_id 
                          AND member.id = comment_video.member_id 
                          AND report_commentvdo.comment_id = '$MB'
                          AND member.fname IS NOT NULL
                    ";
                    $results2 = mysqli_query($connection, $sql2);
                    $row2 = mysqli_fetch_array($results2);
                    ?>
                  
                    <tr>
                      <td class="v-align-middle semi-bold">
                        <p> <?php echo $report_commentvdo['repoctComVdoID']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $report_commentvdo['message']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $report_commentvdo['reason']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $row2 ['fname']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $report_commentvdo['amount_report']; ?></p>
                      </td>
                      <!-- <td class="v-align-middle">
                        <p><?php echo $report_commentvdo['status']; ?></p>
                      </td> -->
                      <td class="v-align-middle">

    
                        
                        <!-- <button class="btn btn-danger btn-cons m-b-10 btn-rounded block-report-spoiler" 
                                href="block-report-commentVDO.php?action=delete&id=<?php echo $report_commentvdo['repoctComVdoID']; ?> " 
                                type="button"><i class="fa fa-ban"></i>
                          <span class="bold">ระงับ</span>
                        </button> -->
                        <!-- <button class="btn btn-danger btn-cons m-b-10 btn-rounded block-report-spoiler" 
                                href="Test-block-comVDO.php?action=edit&id=<?php echo $report_commentvdo['repoctComVdoID']; ?> " 
                                type="button"><i class="fa fa-ban"></i>
                          <span class="bold">Block</span>
                        </button> -->

                        
                      </td>
                    </tr>
                    <?php } ?>
                   
  
          
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        <?php include("footer.php") ?>
      </div>

    

      <!-- Modal -->
      <div class="modal fade slide-up disable-scroll" id="reportDetailModal" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5> <span class="semi-bold">รายละเอียด</span></h5>
                      <tr>
                        <td class="bold">ผู้รายงาน</td>
                      </tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <rt style="width: 50px">
                      <td class="bold">เหตุผลการรายงาน</td>
                      </rt>
                  </div>
                  <div class="modal-body">
                    <div class="form-group-attached">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="modalContent">
                                  
                                </div><br><br><br>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          


      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->

    <!-- datatable js-->
      <script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <!-- end datatable js-->

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" >

    (function($) {

'use strict';

var responsiveHelper = undefined;
var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

// Initialize datatable showing a search box at the top right corner
var initvideoHorrorTable = function() {
        var table = $('#videoHorrorTable');
      
        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "แสดง <b>_START_ ถึง _END_</b> จากทั้งหมด _TOTAL_ รายการ"
            },
            "iDisplayLength": 5
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });
    }
    
  
    initvideoHorrorTable();
    
    $('#aadVideoHorror').click(function () {
      // alert("click add Video button.");
      window.location.href = "add-video-horror.php";
    });
    
    



    $("#videoHorrorTable").delegate(".block-report-spoiler", "click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'คุณต้องการระงับสมาชิก ใช่ หรือ ไม่?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ใช่, ระงับสมาชิก',
            cancelButtonText: 'ปิดหน้าต่างนี้'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = $(this).attr('href');
            }
        })
      });

    // $("#videoHorrorTable").delegate(".report-detail", "click", function (event) {
    //     event.preventDefault();
    //     var commentID  = $(this).data('comment');
    //     console.log('>>>>' , commentID );

    //     $.ajax({
    //         method: "POST",
    //         url: "details-report-comment.php",
    //         data: { action: "report-detail", commentID : commentID }
    //     })
    //     .done(function( response ) {
    //         console.log(response)
    //         if (response.status == 'success') {
    //             $('#modalContent').html(response.message);
    //             $('#reportDetailModal').modal('show');
    //         }
    //     });
        
    // });

})(window.jQuery);
    

    </script>
  </body>
</html>
