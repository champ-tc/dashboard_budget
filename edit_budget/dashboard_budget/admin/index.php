<?php
$page = 'index';
include "../include/session.php";
include "../include/header.php";
require_once('../include/database_connection.php');
?>

<?php

//database_connection.php

// $connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "root", "");
// $connect->exec("set names utf8");


// $connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "budget_envocc", "Env044!@#");
// $connect->exec("set names utf8");

?>
<html>
 <head>
  

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
 </head>

 <style>
    /* @media screen and (min-width: 400px) {
        body {
            background-color: lightgreen;
            width:50%;
        }
    }

    @media screen and (min-width: 800px) {
        body {
            background-color: lavender;
            width:100%;
        }
    } */
 </style>
 <body>


<!-- <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            งบลงทุนและวัสดุวิทยาศาสตร์
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sample_data" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>รายการ</th>
                            <th>จำนวน</th>
                            <th>ประเภท</th>
                            <th>งบประมาณ</th>
                            <th>จัดซื้อ</th>
                            <th>คงเหลือ</th>
                            <th>สถานะ</th>
                            <th>วันที่</th>
                            <th>กลุ่ม</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->



<div class="container">
    
    <div class="panel panel-default">
        <div class="panel-heading">งบลงทุนและวัสดุวิทยาศาสตร์</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>ประเภท</th>
                                <th>งบประมาณ</th>
                                <th>จัดซื้อ</th>
                                <th>คงเหลือ</th>
                                <th>สถานะ</th>
                                <th>วันที่</th>
                                <th>กลุ่ม</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>   
            </div>
        </div>    
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">ประเภทงบ</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="sample_data2" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ประเภทงบ</th>
                                <th>งบประมาณ</th>
                                <th>เบิกจ่าย</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>   
            </div>
        </div>    
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">ผลการเบิกจ่ายเทียบงบสุทธิ</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="sample_data3" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ชื่อ</th>
                                <th>Q1</th>
                                <th>Q2</th>
                                <th>Q3</th>
                                <th>Q4</th>
                                <th>%เบิกจ่าย</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>   
            </div>
        </div>    
    </div>

    
</div>

 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch_investment.php",
   type:"POST"
  }
 });

 $('#sample_data').on('draw.dt', function(){
  $('#sample_data').Tabledit({
   url:'action_investment.php',
   dataType:'json',
   columns:{
    identifier : [0, 'ID'],
    editable:[[1, 'list'], [2, 'quantity'], [3, 'type', '{"ครุภัณฑ์วิทยาศาสตร์":"ครุภัณฑ์วิทยาศาสตร์","ที่ดิน สิ่งก่อสร้าง":"ที่ดิน สิ่งก่อสร้าง","วัสดุวิทยาศาสตร์":"วัสดุวิทยาศาสตร์"}'],[4, 'budget'], [5, 'procurement'], [6, 'remain'],[7, 'overall','{"แดง":"แดง","ส้ม":"ส้ม","เหลือง":"เหลือง","เขียว":"เขียว"}'], [8, 'date_finish'], [9, 'id_group']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data').DataTable().ajax.reload();
    }
    
   }
  });
 });


 var dataTable2 = $('#sample_data2').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch_type_budget.php",
   type:"POST"
  }
 });

 $('#sample_data2').on('draw.dt', function(){
  $('#sample_data2').Tabledit({
   url:'action_type_budget.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id_type'],
    editable:[[1, 'type'], [2, 'budget'], [3, 'disbursement']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data2').DataTable().ajax.reload();
    }
    
   }
  });
 });

 var dataTable2 = $('#sample_data3').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch_target.php",
   type:"POST"
  }
 });

 $('#sample_data3').on('draw.dt', function(){
  $('#sample_data3').Tabledit({
   url:'action_target.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'name'],[2, 'q1'], [3, 'q2'], [4, 'q3'],[5, 'q4'],[6, 'percent']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data3').DataTable().ajax.reload();
    }
    
   }
  });
 });
  
}); 
</script>


<?php include "../include/footer.php"; ?>