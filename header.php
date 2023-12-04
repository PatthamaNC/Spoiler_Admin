<?php
    include("authentication.php");
    include("database.php");

    $sql = "
    SELECT * FROM admin
    ORDER BY adminID DESC
    ";

    $result = $connection->query($sql);

    if (!$result){
      echo "wrong mysql command" ;
      exit;
    }


    $admins = $result->fetch_all(MYSQLI_ASSOC);
    // echo '<pre>';
    // print_r($spoilers);
    // exit;
?>
    <head>
      <style>
        .imgLogo{
          margin-top: -8.5%;
        }
      </style>
    </head>
    <!-- START HEADER -->
      <div class="header" id="headerTable">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <!-- <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
              </div>
            </div>
          </div> -->
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs" >
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="icon-set menu-hambuger-plus"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <img class="imgLogo" src="assets/img/logo03.png" alt="logo" data-src="assets/img/logo03.png" data-src-retina="assets/img/logo03.png" width="70" height="75" style="margin-top: -9px; margin-right: 50px;">
            </div>
            <!-- START NOTIFICATION LIST -->
            <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
            </ul>
            <!-- <a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>พิมพ์ค้นหา <span class="bold">VDO</span></a>  -->
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold"><?php echo $_SESSION['username']; ?>
            </span> <span class="text-master">Admin</span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="
                <?php echo $_SESSION['admin_picture']; ?>" width="32" height="32">
                </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="profile.php"><i class="fa fa-user" id="profileAdmin"></i> โปรไฟล์</a>
                </li>
                <li><a href="edit-password.php?action=edit&id=<?php echo $_SESSION['adminID'];?>"><i class="fa fa-key"></i>เปลี่ยนรหัสผ่าน</a>
                </li>
                <!-- <li><a href="#"><i class="pg-signals"></i> ดูโปรไฟล์</a>
                </li> -->
                <li class="bg-master-lighter">
                  <a href="logout.php" class="clearfix">
                    <span class="pull-left" id=logout>ออกจากระบบ</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
