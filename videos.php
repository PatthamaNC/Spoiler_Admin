<?php
    include("authentication.php");
    include("database.php");

    $sql = "
    SELECT * FROM videos
    ORDER BY videos DESC
    ";

    $result = $connection->query($sql);

    if (!$result){
      echo "wrong mysql command" ;
      exit;
    }


    $videos = $result->fetch_all(MYSQLI_ASSOC);
    // echo '<pre>';
    // print_r($spoilers);
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

   <!-- fonts css -->
   <link rel="stylesheet" href="/pages/css/fonts.css" type="text/css">

   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
    *{
      font-family: 'Noto Sans Thai', sans-serif;
    }
    </style>


    <!--[if lte IE 9]>
	<link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
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
                  <li><a href="#" class="active" style="font-family: 'Noto Sans Thai', sans-serif;">ข้อมูลวิดีโอภาพยนตร์สปอยล์</a>
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
                <div class="panel-title" style="font-family: 'Noto Sans Thai', sans-serif; font-size: 15px;">ข้อมูลวิดีโอภาพยนตร์สปอยล์</div>
                <div class="pull-right">
                  <div class="col-xs-8">
                    <input type="text" id="search-table" style="font-family: 'Noto Sans Thai', sans-serif;" class="form-control pull-right" placeholder="ค้นหา">
                  </div>
                  <div class= "col-xs-4">
                  <button type="submit" id="aadVideos" class="btn btn-complete btn-cons btn-animated from-left fa fa-plus btn-rounded">
                      <span>เพิ่มข้อมูล</span>
                  </button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body" >
                <table class="table table-hover demo-table-search table-responsive-block" id="spoilerTable" >
                  <thead>
                    <tr >
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">ID</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">ชื่อภาพยนตร์</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">หมวดหมู่ภาพยนตร์สปอยล์</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">คำบรรยายสปอยล์</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">นักแสดง</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">ผู้กำกับ</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">วิดีโอ	</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">รูปภาพ	</th>
                      <th  style="font-family: 'Noto Sans Thai', sans-serif;">ตัวดำเนินการ</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($videos AS $index => $videos){
                    ?>
                  
                    <tr>
                      <td class="v-align-middle semi-bold">
                        <p> <?php echo $videos['videosID']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $videos['name']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $videos['category']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $videos['details']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $videos['actor']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $videos['director']; ?></p>
                      </td>
                      <td class="v-align-middle">
                      <video width="200px" height="100px" controls="controls">
                        <source src="<?php echo $videos['videos']; ?>" type="video/mp4">
                      </video>
                      </td>
                      <td class="v-align-middle">
                        <p><img width="200px" height="100px" src="<?php echo $videos['img']; ?>"></p>
                      </td>


                      <td class="v-align-middle">
                        <div>
                        <a href="edit-videos.php?action=edit&videosID=<?php echo $videos['videosID']; ?>">
                          <button class="btn btn-warning btn-cons btn-animated from-left fa fa-pencil-square-o btn-rounded">
                            <span>แก้ไข</span>
                          </button>
                        </a>
                        </div>
                        <br>
                        <div>
                        <a class="edit-videos" href="edit-videos.php?action=delete&videosID=<?php echo $videos['videosID']; ?> ">
                          <button class="btn btn-danger btn-cons btn-animated from-left pg pg-trash btn-rounded">
                            <span>ลบ</span>
                          </button>
                        </a>
                      </div>
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
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- START OVERLAY -->
    <div class="overlay hide" data-pages="search">
      <!-- BEGIN Overlay Content !-->
      <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Logo !-->
          <img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
          <!-- END Overlay Logo !-->
          <!-- BEGIN Overlay Close !-->
          <a href="#" class="close-icon-light overlay-close text-black fs-16">
            <i class="pg-close"></i>
          </a>
          <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Controls !-->
          <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
          <br>
          <div class="inline-block">
            <div class="checkbox right">
              <input id="checkboxn" type="checkbox" value="1" checked="checked">
              <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
            </div>
          </div>
          <div class="inline-block m-l-10">
            <p class="fs-13">Press enter to search</p>
          </div>
          <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid">
          <span>
                <strong>suggestions :</strong>
            </span>
          <span id="overlay-suggestions"></span>
          <br>
          <div class="search-results m-t-40">
            <p class="bold">Pages Search Results</p>
            <div class="row">
              <div class="col-md-6">
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                    <div>
                      <img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                    <p class="hint-text">via john smith</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                    <div>T</div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                    <p class="hint-text">via pages</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                    <div><i class="fa fa-headphones large-text "></i>
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                    <p class="hint-text">via pagesmix</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
              </div>
              <div class="col-md-6">
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                    <div><i class="fa fa-facebook large-text "></i>
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                    <p class="hint-text">via facebook</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                    <div><i class="fa fa-twitter large-text "></i>
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                    <p class="hint-text">via twitter</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
                <!-- BEGIN Search Result Item !-->
                <div class="">
                  <!-- BEGIN Search Result Item Thumbnail !-->
                  <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                    <div><i class="fa fa-google-plus large-text "></i>
                    </div>
                  </div>
                  <!-- END Search Result Item Thumbnail !-->
                  <div class="p-l-10 inline p-t-5">
                    <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                    <p class="hint-text">via google plus</p>
                  </div>
                </div>
                <!-- END Search Result Item !-->
              </div>
            </div>
          </div>
        </div>
        <!-- END Overlay Search Results !-->
      </div>
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
var initspoilerTable = function() {
        var table = $('#spoilerTable');
      
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
    
  
    initspoilerTable();
    
    $('#aadVideos').click(function () {
      // alert("click add Video button.");
      window.location.href = "add-videos.php";
    });
    
    



    $("#spoilerTable").delegate(".edit-videos", "click", function (event) {
        event.preventDefault();
        Swal.fire({
          title: 'คุณต้องการลบข้อมูลวิดีโอภาพยนตร์สปอยล์ ใช่ หรือ ไม่?',
          text: "",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'ลบภาพยนตร์',
          cancelButtonText: 'ปิดหน้าต่างนี้'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = $(this).attr('href');
          }
        });
      });

})(window.jQuery);
    

    </script>
  </body>
</html>