<!-- ?php 
$page = 'login';
include "include/head.php";
include "include/headerPUBLIC.php";
?>

<br><br><br> -->

<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<style>
  body{
    background-color:#34495E;
  }
</style>


<div class="container-fluid" style="min-height:65vh;">
  <div class="row m-5">
    <div class="col-1 col-sm-3"></div>
    <div class="col-10 col-sm-6">
      <form action="chk_login.php" method="post">
        <center>
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>

          <div><h3>เข้าสู่ระบบ</h3></div>

        </center><br>

        <input type="text" class="form-control" name="user" placeholder="ชื่อผู้ใช้" autocomplete="off" maxlength="13"><br>
        <input type="password" class="form-control" name="pass" placeholder="รหัสผ่าน" autocomplete="off"><br>
        <center>
        <input name="btn_submit" type="submit" class="btn btn-dark" value="เข้าสู่ระบบ" >
        <button type="reset" class="btn btn-outline-dark">ยกเลิก</button>
        </center>
      </form>
    </div>
    <div class="col-1 col-sm-3"></div>
  </div>
</div>