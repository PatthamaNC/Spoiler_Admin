<?php
    session_start();
    include("database.php");

    if(isset($_POST['loginButton'])) {

        $sql = "
            SELECT adminID, username, email, password, admin_picture
            FROM admin
            WHERE
                    email = '" . $_POST['email'] . "'
            AND     password = '" . $_POST['password'] . "'
        ";

        // run คำสั่ง sql
        $result = $connection->query($sql);

        // check run คำสั่ง sql error
        if ($result && $result->num_rows > 0){
            $admin = $result->fetch_assoc();
            $_SESSION['isLogin'] = true;
            $_SESSION['adminID'] = $admin['adminID'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['admin_picture'] = $admin['admin_picture'];
            header("location: profile.php");
            exit();
        }
    }
   
?>


<!DOCTYPE html>
<html>
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
    *{
      font-family: 'Noto Sans Thai', sans-serif;
    }
    .but-save{
      margin-left: 35%;
      /* background-color: brown; */
    }

    </style>
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
    <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header ">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <!-- <img src="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" 
            data-src="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" 
            data-src-retina="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" alt="" class="lazy"> -->

            <!-- <img src="assets/img/demo/3658597.jpg" 
            data-src="assets/img/demo/3658597.jpg" 
            data-src-retina="assets/img/demo/3658597.jpg" alt="" class="lazy"> -->
             <img src="../img/418011.jpg" 
            data-src="../img/418011.jpg" 
            data-src-retina="../img/418011.jpg" alt="" >
        <div class="smoke">
            <span>L</span>
            <span>O</span>
            <span>G</span>
            <span>I</span>
            <span>N</span>
        </div>
 
        

      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <!-- <div class="panel-title p-t-100">Login</div> -->
          <br><br><br><br><br><br><br><br>
          <form id="form-login" class="p-t-15" role="form"  name="login-form" action="" method="post">
            <div class="form-group form-group-default">
              <label style="font-family: 'Noto Sans Thai', sans-serif;">อีเมล</label>
              <div class="controls">
                <input style="font-family: 'Noto Sans Thai', sans-serif;" type="text" name="email" placeholder="กรุณากรอกอีเมล" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-group-default">
              <label style="font-family: 'Noto Sans Thai', sans-serif;">รหัสผ่าน</label>
              <div class="controls">
                <input style="font-family: 'Noto Sans Thai', sans-serif;" type="password" class="form-control" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
              </div>
            </div>
            <button  style="font-family: 'Noto Sans Thai', sans-serif;" class="btn btn-success btn-cons m-t-10  fs-13 but-save" type="submit" name="loginButton" id="loginButton">เข้าสู่ระบบ</button>
          </form>
          <!-- <div class="pull-bottom sm-pull-bottom"> btn-rounded 
          </div> -->
        </div>
      </div>
    </div>
    <!-- <div class="overlay hide" data-pages="search">
      <div class="overlay-content has-results m-t-20">
        <div class="container-fluid">
          <img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
        </div>
      </div>
    </div> -->


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
    <!-- END VENDOR JS -->
    <script src="pages/js/pages.min.js"></script>
    <script>
    $(function()
    {
      $('#form-login').validate({
        rules:{
            email: {
                required: true,
                // minlength: 4
            },
            password: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            email: {
                required: "กรุณากรอกอีเมล"
                // minlength: "กรุณากรอกอีเมล"
            },
            password: {
                required: "กรุณากรอกรหัสผ่าน",
                minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
            },
        }
      })
    })
    </script>
  </body>
</html>