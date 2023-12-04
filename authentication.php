<?php
// เก็บค่า session ว่า Login มั้ย
// เก็บค่าLogin ไว้ใน session

// ถ้าไม่เจอตัวแปล session นี้ หรือ ตัวแปลsession ไม่เป็นค่า true ในทำการ อิไดเรก ไปหน้า Login
session_start();
if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true ){
    header ("location: login.php");
    exit();
}
?>