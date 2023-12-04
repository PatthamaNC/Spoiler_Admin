<?php
  include("authentication.php");
  include("database.php");
  
  if(isset ($_GET['action']) && $_GET['action'] == 'edit'){
      $adminID = $_GET['id'];

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
 
if (isset($_POST['saveButton'])) {
    // echo $_POST['confirmPass'];
    // echo $admin['password'];
    // exit;

    if ($_POST['confirmPass'] == $admin['password']) {
        $sql = "
        UPDATE admin SET 
        password = '" . $_POST['password'] . "'
        WHERE adminID = '" . $_POST['id'] . "'
        ";

        $result = $connection->query($sql);
        if (!$result) {
            echo "wrong sql command";
            exit;
        }

        header("location: profile.php");
        exit;
    }
    if ($_POST['confirmPass'] != $admin['password']) {
        echo
            "<script>
            alert('รหัสผ่านเดิมไม่ถูกต้อง');
        document.location.href = 'edit-password.php';
            
        </script>
        ";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>The Movies Spoiler</title>
    
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
    .but_save{
        margin-left: 45%;
        
    }
    .but_Pass{
        margin-left: 30%;
    }
    .font_edit{
        margin-left: 45%;
    }
    </style>
  </head>
  <body class="fixed-header ">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      
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

    <div class="page-content-wrapper ">
        <div class="content ">
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
              <ul class="breadcrumb">
                  <li>
                    <p>The Movies Spoiler</p>
                  </li>
                  <li><a style="font-family: 'Noto Sans Thai', sans-serif;" href=javascript:history.back(1)>โปรไฟล์</a></li>
                </ul>
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
                        <h5 class="FontEdit font_edit" style="font-family: 'Noto Sans Thai', sans-serif; font-weight: bold;">
                            เปลี่ยนรหัสผ่าน
						            </h5><br>
                  <form class="Form" role="form" name="editVideoActionForm" id="editVideoActionForm" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $admin['adminID']; ?>" > 

                    <div class="form-group col-md-5 but_Pass"  >
                    <label style="font-family: 'Noto Sans Thai', sans-serif; font-size: 14.5px;">รหัสผ่านเดิม</label>
                    <input  class="form-control" type="text" required id="confirmPass" name="confirmPass">
                    </div><br>

                    <div class="form-group col-md-5 but_Pass">
                    <label style="font-family: 'Noto Sans Thai', sans-serif; font-size: 14.5px;">รหัสผ่านใหม่</label>
                    <input  class="form-control" required id="password" name="password">
                    </div><br>
                    <br><br>
                        <button type="submit" name="saveButton" class="btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down  but_save ">
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
      $('#editVideoForm').validate({
        rules:{
            romantic_name: {
                required: true
            },
            romantic_category: {
                required: true
            },
            actor: {
                required: true,
            },
            director: {
                required: true
            },
            romantic_details: {
                required: true
            }
            },
        messages: {
                romantic_name: {
                required: "กรุณากรอกชื่อภาพยนตร์"
            },
            romantic_category: {
                required: "กรุณากรอกหมวดหมู่"
            },
            actor: {
                required: "กรุณากรอกชื่อนักแสดง"
            },
            director: {
                required: "กรุณากรอกชื่อผู้กำกับ"
            },
            romantic_details: {
                required: "กรุณากรอกเนื้อหา"
            },
            }
      })

      $("#video").fileinput({
            showUpload:false,
            maxFileCount:10,
            mainClass:"input-group-md"
          });

      $("#picture").fileinput({
        showUpload: false,
        maxFileCount: 10,
        mainClass:"input-group-md"
      });
    })
    </script>
  </body>
</html>