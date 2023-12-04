<?php
      include("authentication.php");
      include("database.php");

      if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $videoromanticID = $_GET['videoromanticID'];
        // echo $videoactionID ;
        // exit;

      $sql = "
      DELETE FROM videoromantic WHERE videoromanticID = '" . $videoromanticID . "'
      ";

      $result = $connection->query($sql); 
      if (!$result){
        echo ("wrong mysql command");
        exit();
      }
      header("location: video-romantic.php");
      exit();
}

        if(isset ($_GET['action']) && $_GET['action'] == 'edit'){
          $videoromanticID = $_GET['videoromanticID'];

          $sql = "
          SELECT * FROM videoromantic WHERE videoromanticID = '" . $videoromanticID . "'
        ";
          
        $result = $connection->query($sql); 
        if (!$result){
          echo ("wrong mysql command");
          exit;
        }

        $videoromantic = $result->fetch_assoc();
        }
        
        if(isset($_POST['buttonEditVideo'])){
          $videoUrl = "";
          $pictureUrl = "";
      
      if (isset($_FILES['video']) && $_FILES['video']['size'] > 0){

        $videoEntension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
        if(!in_array($videoEntension, ["mp4"])){
          echo "กรุณาเลือกไฟล์ .mp4 เท่านั้น";
          exit;
        }
  
        $videoFileName = uniqid() . "." . $videoEntension;
        if(move_uploaded_file($_FILES["video"]["tmp_name"], "../csc2023/uploads/" . $videoFileName)){
          $videoUrl = "http://localhost/csc2023/uploads/" . $videoFileName;
      
        }
      }
    
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
      }
          $sql = "
              UPDATE  videoromantic SET
                romantic_name = '" . $_POST['romantic_name'] . "',
                romantic_category= '" . $_POST['romantic_category'] . "',
                romantic_details= '" . $_POST['romantic_details'] . "',
                actor= '" . $_POST['actor'] . "',
                director= '" . $_POST['director'] . "',
                video_romantic= '" . $videoUrl . "',
                romantic_img= '" . $pictureUrl . "'

              WHERE videoromanticID = '" . $_POST['videoromanticID'] . "'
                ";

                $result = $connection->query($sql); 
                if (!$result){
                  echo ("wrong mysql command");
                  exit();
                }

                header("location: video-romantic.php");
                exit();
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
                  <li><a style="font-family: 'Noto Sans Thai', sans-serif;" href=javascript:history.back(1)>ข้อมูลภาพยนตร์โรแมนติก</a></li>
                  <li><a style="font-family: 'Noto Sans Thai', sans-serif;" href="#" class="active">แก้ไขข้อมูลภาพยนตร์โรแมนติก</a></li>
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
                  
                  <div class="panel-body" style="font-family: 'Noto Sans Thai', sans-serif;">
                        <h5>
                            แก้ไขข้อมูลภาพยนตร์โรแมนติก
						            </h5>
                    <form class="" role="form" name="editVideoForm" id="editVideoForm" action="" method="POST" enctype="multipart/form-data">
                      <!--  -->
                    <input type="hidden" id="videoromanticID" name="videoromanticID" value="<?php echo $videoromantic['videoromanticID']; ?>" > 
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default ">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">ชื่อภาพยนตร์</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" name="romantic_name" value="<?php echo $videoromantic['romantic_name']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">หมวดหมู่ภาพยนตร์</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" name="romantic_category" value="<?php echo $videoromantic['romantic_category']; ?>">
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default ">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">นักแสดง</label>
                            <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" class="form-control" name="actor" value="<?php echo $videoromantic['actor']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default">
                            <label style="font-family: 'Noto Sans Thai', sans-serif;">ผู้กำกับ</label>
                            <input type="text" class="form-control" name="director" value="<?php echo $videoromantic['director']; ?>">
                          </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group form-group-default  ">
                          <label style="font-family: 'Noto Sans Thai', sans-serif;">คำบรรยาย</label>
                        <input type="text" class="form-control" name="romantic_details" value="<?php echo $videoromantic['romantic_details']; ?>">
                        </div>
                      <!-- START PANEL -->
                      <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                  <label style="font-family: 'Noto Sans Thai', sans-serif;">วิดีโอ</label>
                                  <span class="help">เฉพาะไฟล์นามสกุล .mp4 เท่านั้น</span>
                                  <input type="file" name="video" id="video" class="from-control" value="<?php echo $videoromantic['video_romantic']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                  <label style="font-family: 'Noto Sans Thai', sans-serif;">รูปภาพ</label>
                                  <span class="help">เฉพาะไฟล์นามสกุล .jpg, .png เท่านั้น</span>
                                  <input type="file" name="picture" id="picture" class="from-control" value="<?php echo $videoromantic['romantic_img']; ?>">
                                </div>
                            </div>
                        </div><br>
                        <!-- END PANEL -->  
                        <button type="submit" id="buttonEditVideo" name="buttonEditVideo" class="btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down btn-rounded but_save">
                          <span>บันทึกข้อมูล</span>
                        </button>
                        <!-- <button class="btn btn-success pull-right btn-rounded" type="submit" id="buttonEditVideoRomantic" name="buttonEditVideoRomantic">บันทึกการแก้ไข</button> -->
                    </form>
                  </div>
                  
                </div>
                <!-- END PANEL -->
                
             
          <!-- END CONTAINER FLUID -->
              
                   
  
          
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