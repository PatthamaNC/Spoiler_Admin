<?php
  include("authentication.php");
  include("database.php");
  
  if(isset ($_GET['action']) && $_GET['action'] == 'edit'){
      $adminID = $_GET['adminID'];

    $sql = "
    SELECT * FROM admin WHERE adminID = '" . $adminID . "'
  ";
    
  $result = $connection->query($sql); 
  if (!$result){
    echo ("wrong mysql command");
    exit;
  }

      $admin = $result->fetch_assoc();
      // echo '<pre>';
      // print_r($admin);
      // exit;
  }
  if(isset($_POST['buttonEditVideo'])){
    $pictureUrl = "";

    $sql = "
    UPDATE  admin SET
      email = '" . $_POST['email'] . "'
      ";
      
    // แก้ไขรูปภาพโปรไฟล์
    if (isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){

      $pictureEntension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
      if(!in_array($pictureEntension, ["png","jpg"])){
        echo "กรุณาเลือกไฟล์ .png หรือ jpg เท่านั้น";
        exit;
        
      }
      
      $fileName = uniqid() . "." . $pictureEntension;
      if(move_uploaded_file($_FILES["picture"]["tmp_name"], "../csc2023/uploads/videospoiler/videoimg/" . $fileName)){
        $pictureUrl = "http://localhost/csc2023/uploads/videospoiler/videoimg/" . $fileName;
    
      }  
       $sql .=", admin_picture = '" . $pictureUrl . "'";
    }

        $sql .="WHERE adminID = '" . $_POST['adminID'] . "'";

          $result = $connection->query($sql); 
          if (!$result){
            echo ("wrong mysql command");
            exit();
          }

          header("location:profile.php");
          exit();
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
    </style>

          <style>
            .Form{
              margin-left: 30%;
            }
            .but_save{
              margin-left: 45%;
            }
            h5{
              font-weight: 900;
              margin-left: 40%;
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
    <div class="page-container ">

    <?php include("header.php"); ?>
      <div class="page-content-wrapper ">
        <div class="content ">
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
              </div>
            </div>
          </div>
          <div class="container-fluid container-fixed-lg">
          <div class="container-fluid container-fixed-lg bg-white ">
            <div class="panel panel-transparent">
              <div class="panel-heading">
                            <div class="container-fluid container-fixed-lg">
                        <div class="panel panel-default ">
                  
                    <div class="panel-body center">
                        <h5 class="FontEdit" style="font-family: 'Noto Sans Thai', sans-serif; font-weight: bold;">
                            แก้ไขข้อมูลผู้ดูแลระบบ
						            </h5><br>
                  <form class="Form" role="form" name="editVideoActionForm" id="editVideoActionForm" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="adminID" name="adminID" value="<?php echo $admin['adminID']; ?>" > 

                    <div class="form-group col-md-7 ">
                    <label style="font-family: 'Noto Sans Thai', sans-serif; font-size: 14.5px;">อีเมล</label>
                    <input  class="form-control" required name="email" value="<?php echo $admin['email']; ?>">
                    </div><br>
                    <div class="form-group  col-md-7">
                        <label style="font-family: 'Noto Sans Thai', sans-serif; font-size: 14.5px;">รูปภาพ</label>
                        <span class="help">เฉพาะไฟล์นามสกุล .jpg, .png เท่านั้น</span>
                        <input type="file" name="picture" id="picture" class="from-control" value="<?php echo $admin['admin_picture']; ?>">
                        </div>
                        </div><br>
                        <button type="submit" id="buttonEditVideo" name="buttonEditVideo" class="btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down but_save ">
                          <span>บันทึกข้อมูล</span>
                        </button>
                    </form>
                  </div>
                </div>
          </div>
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
      


      $("#picture").fileinput({
        showUpload: false,
        maxFileCount: 10,
        mainClass:"input-group-md",
        
        initialPreview: ['<img src="<?php echo $admin['admin_picture']; ?>" class="kv-preview-data file-preview-image">']
      });
    })
    </script>
  </body>
</html>