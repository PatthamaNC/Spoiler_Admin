<?php
      include("authentication.php");
      include("database.php");
      if(isset ($_GET['action']) && $_GET['action'] == 'edit'){
          $spoiler_id = $_GET['spoilerID'];
    
        $sql = "
        SELECT * FROM spoiler WHERE spoilerID = '" . $spoiler_id . "'
      ";
        
      $result = $connection->query($sql); 
      if (!$result){
        echo ("wrong mysql command");
        exit;
      }
    
          $spoiler = $result->fetch_assoc();
          // echo '<pre>';
          // print_r($spoiler);
          // exit;
      }

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
 <!-- import bootstrap fileinput plugins-->
 <link href="assets/plugins/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"  />


 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
    *{
      font-family: 'Noto Sans Thai', sans-serif;
    }
    .btn-back{
      margin-left: 45%;
      font-size: 16px;
      color: #000;
    }
    .label01{
      margin-left: 45%;
    }
    .label02{
      margin-left: 49%;
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
                  <!-- <li><a location.href = "add-video-action.php">ข้อมูลภาพยนตร์แอ็กชั่น</a></li> -->
                  <li><a href=javascript:history.back(1)  style="font-family: 'Noto Sans Thai', sans-serif;">ข้อมูลรายงานภาพยนตร์</a></li>
                  <li><a href="#" class="active" style="font-family: 'Noto Sans Thai', sans-serif;">รายละเอียดภาพยนตร์</a></li>
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
              
                
                          <!-- START CONTAINER FLUID -->
                            <div class="container-fluid container-fixed-lg">
                            <div class="row">
                            <div class="col-md-12">
                            <!-- START PANEL -->
                        <div class="panel panel-default">
                  <!-- <div class="panel-heading">
                    <div class="panel-title">
                      Option #one
                    </div>
                  </div> -->
                  <div class="panel-body">
                    <h5 class="bold" style="font-family: 'Noto Sans Thai', sans-serif;">
                      รายละเอียดภาพยนตร์
                    </h5><br>
                    <form class="" role="form" >
                      <!-- <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default disabled" >
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">ชื่อภาพยนตร์</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" disabled value="<?php echo $spoiler['spoiler_name']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default disabled">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">หมวดหมู่</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" disabled value="<?php echo $spoiler['spoiler_category']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default disabled">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">นักแสดง</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" disabled value="<?php echo $spoiler['actor']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default disabled">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">ผู้กำกับ</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" disabled value="<?php echo $spoiler['director']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group form-group-default disabled">
                        <label style="font-family: 'Noto Sans Thai', sans-serif;">คำบรรยาย</label>
                        <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control"  disabled value="<?php echo $spoiler['spoiler_details']; ?>">
                      </div>
                      <div class="form-group form-group-default disabled">
                      <label style="font-family: 'Noto Sans Thai', sans-serif;">รูปภาพหน้าปก</label><br>
                      <p><img width="250px" height="150px" src="<?php echo $spoiler['spoiler_img']; ?>"></p>
                      </div><br> -->

                      <label class="bold">ชื่อภาพยนตร์ : <?php echo $spoiler['spoiler_name']; ?></label> <label class="label01 bold">หมวดหมู่ : <?php echo $spoiler['spoiler_category']; ?></label><br><br>
                      <label class="bold">นักแสดง : <?php echo $spoiler['actor']; ?></label> <label class="label02 bold">ผู้กำกับ : <?php echo $spoiler['director']; ?></label><br><br>
                      <label class="bold">คำบรรยาย : <?php echo $spoiler['spoiler_details']; ?></label><br><br>
                      <label class="bold" style="font-family: 'Noto Sans Thai', sans-serif;">รูปภาพหน้าปก</label>
                      <p><img width="250px" height="150px" src="<?php echo $spoiler['spoiler_img']; ?>"></p><br>
                        <u><a class="bold btn-back" style="font-family: 'Noto Sans Thai', sans-serif;" href=javascript:history.back(1)>กลับหน้าแรก</a></u>
                    </form>
                  </div>
                </div>
  
          
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
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    
       
      
      <!-- END Overlay Content !-->
    </div>
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

    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

     <!-- import bootstrap fileinput plugins-->
     <script src="assets/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="assets/plugins/bootstrap-fileinput/themes/fa/theme.js"></script>

    <!-- END VENDOR JS -->

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <script>
    $(function()
    {
     
      
    })
    </script>
  </body>
</html>