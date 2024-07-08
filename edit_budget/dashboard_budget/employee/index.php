<?php
$page = 'dashboard';
include "../include/sessionE.php";
include "../include/heademp.php";
?>

<?php
$server    = 'localhost';
$username  = 'root';
$password  = '';
$dbname = 'budget_envocc';

$conn = mysqli_connect($server, $username ,$password, $dbname);
mysqli_set_charset($conn,'UTF8');
?>


  <style>
      .tooltip-inner {
            max-width: 500px;
            width: 500px;
            text-align: left;
            /* font-size: 1.2rem; */
            overflow-x: hidden;
            overflow-y: auto;
            max-height: 400px;
      }
      .circle {
            background-color: gray;
            height: 50px;
            width: 50px;
            border-radius: 100%;
      }        
      .six-pointed-star{
        --star-color:#0038b8;
        --sqrt-3:1.73205080757;
        margin: 0 auto;
        font-size:10em;
        width: 0;
        height: 0;
        position:relative;
        border-left: 1em solid transparent;
        border-right: 1em solid transparent;
        border-bottom: calc( 1em * var(--sqrt-3) ) solid var(--star-color);
    }
    .circle {
      background:#fff702;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-left:80px ;
    }
    .circle2 {
      background: #09ecf8;
      width: 105px;
      height: 105px;
      border-radius: 50%;
      margin-left:80px ;
    }
    .circle3 {
      background: #ff00ff;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-left:80px ;
    }
    table {
      border-collapse: collapse;
      border-radius: 10px;
      overflow: hidden;
    }
    @media screen and (max-width: 415px), 
          screen and (max-height: 915px) {
      .col-xl-1 { width: 25%}
      .col-xl-2 { width: 25%}  
      .col-xl-3 { width: 25% }
      .col-xl-4 { width: 25% }
      .col-xl-5 { width: 25% }
      .col-xl-6 { width: 25% }
      .col-xl-7 { width: 25%}
      .col-xl-8 { width: 25% }
      .col-xl-9 { width: 25% }
      .col-xl-10 { width: 25% }
      .col-xl-11 { width: 25% }
      .col-xl-12 { width: 25% }
    }



    
  </style>

    <!-- ======= Header ======= -->
      <!-- <header id="header" class=""> -->
        <!-- <header id="header" class="header fixed-top d-flex "> -->
          <!-- <div class="col-lg-12" style="text-align:rigth;background-color: white"> -->
          <!-- <div>
            <img src="https://scontent.fbkk5-5.fna.fbcdn.net/v/t39.30808-6/272689780_303179955170587_6966711018903142471_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=sC9OzhogDQQAX_hPhtx&_nc_ht=scontent.fbkk5-5.fna&oh=00_AT8IFTamQ5V858WeF7-CEh-r9tgsDiUMuXzHqO1d-tNj1Q&oe=632CD15C" alt="Girl in a jacket" width="60" height="74">
          </div>       -->
            <!-- <div style="text-align:center; ">          -->
                <!-- <h5  style="text-align:center;font-size: 30px;">ผลการเบิกจ่ายงบประมาณ กองโรคจากการประกอบอาชีพและสิ่งแวดล้อม</h5>             -->
                

                <!-- <p style="text-align:right;">วันที่แสดงผล ณ วันที่ 20 กันยายน 2565 </p> -->
                <!-- </div> -->
                <?php
                  $monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
                  
                  function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
                      global $dayTH,$monthTH;   
                      $thai_date_return ="แสดง ณ วันที่"." ".date("j",$time);   
                      $thai_date_return.=" ".$monthTH[date("n",$time)];   
                      $thai_date_return.= " ".(date("Y",$time)+543);   

                      return $thai_date_return;   
                } 
                
                ?>
                <!-- <div style ="margin-top:-30px"> -->
                  <?php 
                    
                    $sql_date = "SELECT MAX(`date_system`) as datatime FROM `tb_manage`;";
                    $date = mysqli_query($conn, $sql_date) or die("Error Query [" . $sql_date . "]");
                    while ($date_ = mysqli_fetch_array($date)) {
                      $date__ = $date_["datatime"];
                    }
                  $monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
                  
                  function thai_date_and_time2($date__){   // 19 ธันวาคม 2556 เวลา 10:10:43
                      global $dayTH,$monthTH;   
                      $thai_date_return =date("j",$date__);   
                      $thai_date_return.=" ".$monthTH[date("n",$date__)];   
                      $thai_date_return.= " ".(date("Y",$date__)+543);   

                      return $thai_date_return;   
                } 
                    
                  ?>
                  <!-- <p style="text-align:right;margin-top:-20px">?php echo "ข้อมูล ณ วันที่"." " ?>?=thai_date_and_time2(strtotime($date__))?></p>
                  <p style="text-align:right;margin-top:-20px">?=thai_date_and_time(time())?></p> -->
                <!-- </div> -->
          <!-- </div> -->
      <!-- </header><br> -->
    <!-- ======= Header ======= -->


    <div class="container-fluid">
      <h2 style="text-align:center;">ผลการเบิกจ่ายงบประมาณ กองโรคจากการประกอบอาชีพและสิ่งแวดล้อม</h2>
      <div>
        <div><?php echo "ข้อมูล ณ วันที่"." " ?><?=thai_date_and_time2(strtotime($date__))?></div>
        <div><?=thai_date_and_time(time())?></div>
      </div>
      <div class="row">
        <div class="col">
          Column
        </div>
        <div class="col">
          Column
        </div>
      </div>
    </div>
    

    <section class="section">
        <div class="pagetitle" style ="color:#525966">
          <h1>Chart</h1>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item">Chart</li>
  
              </ol>
          </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <!-- card1 -->
            <div class="col-lg-4">
                <div class="card" style ="height: 420px;">
                    <div class="card-body">
                        <h5 class="card-title">งบประมาณที่ได้รับ (งบดำเนินงานโครงการ)</h5> 
                        <div class="row">
                            <div class="col-4"  >
                              <div class="row" style ="background-color:#00BFFF;text-align:center; font-size: 16px;color:black;font-weight: bold;" >
  
                                <div  >งบประมาณ</div>
                                <?php
                                    $sql_total = "SELECT SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref WHERE tb_receive.type_budget = 'งบตามแผน' AND tb_ref.budget1 ='2.งบดำเนินงาน' AND tb_ref.budget2 != '2.2 งบวัสดุวิทย์' AND tb_ref.budget2 != '2.3 งบขั้นต่ำ'";
                                    $total = mysqli_query($conn, $sql_total ) or die("Error Query [" . $sql . "]");
                                    while ($sumtotal = mysqli_fetch_array($total)) {
                                
                                        $p = number_format($sumtotal["amount"]);
                                    } 
                                ?>
                                <div><?php echo $p ?></div>
                              </div>
                              <div class="row"  style ="background-color:#16E2F5;text-align:center; font-size: 16px;color:black;font-weight: bold;" >
  
                                <div>งบที่ได้รับ</div>
                                <?php
                                    $sql_total = "SELECT sum(amount) as total FROM tb_receive WHERE type_budget !='งบตามแผน'";
                          
                                    $total = mysqli_query($conn, $sql_total ) or die("Error Query [" . $sql . "]");
                                    while ($sumtotal = mysqli_fetch_array($total)) {
                                    $x = $sumtotal["total"];
                                    // echo number_format($sumtotal["amount"]);
                                    } 
                                ?>
                                <div><?php echo number_format($x) ?></div>
                              </div>   
                            </div>
                            <div class="col-4" style ="text-align:center; color:black;background-color:#66ff99;font-weight: bold;" >
                                <div style ="text-align:center; font-size: 20px;" >เบิกจ่าย(ล้าน)</div>  
                                <div style ="text-align:center; font-size: 18px;" >
                                <?php
                                    $sql_total = "SELECT SUM(amount) as amount FROM `tb_manage` WHERE type_buget = 'เบิกจ่าย';";
                                    $totald = mysqli_query($conn, $sql_total ) or die("Error Query [" . $sql . "]");
                                    while ($sumd = mysqli_fetch_array($totald)) {
                                    $y = $sumd["amount"];
                                    echo number_format($y, 2, '.', ',');
                                    }  
                                    
                                ?>
                                </div> 
                            </div>
                            <div class="col-4" style ="text-align:center; font-size: 20px;color:black;background-color:#ffff80;font-weight: bold; " >  
                                <div style ="color:black;text-align:center;" >% เบิกจ่าย</div>
                                <?php
                                    $cal = ($y/$x)*100;
                                    $num = number_format((float)$cal, 2, '.', '');
                                    echo $num." "."%";   
                                               
                                ?> 
                            </div>
                        </div> <!-- end row-->
                        <?php  //query data to tag->table
                            $sql = "SELECT type_budget,SUM(amount) as amount ,max(date_time) as date_time ,quarter FROM tb_receive Where type_budget !='งบตามแผน' GROUP BY type_budget";
                            $budget = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                        ?> 
                        <table class="table table-striped table_center2" style ="text-align: center;">
                            <thead>
                                <tr >
                                    <th scope="col">งวดที่</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">จำนวน</th>
             
                                </tr>

                            </thead> 
                            <tbody>
                                <?php
                                    
                                    while ($objResult = mysqli_fetch_array($budget)) { 
                                ?>    
                                <tr>                  
                                    <td><?php echo $objResult["type_budget"]; ?></td>
                                    <td><?=thai_date_and_time2(strtotime($objResult["date_time"]))?></td> <!-- วันที่-->
                                    <td><?php echo number_format($objResult["amount"]); ?></td>
                                
                                </tr>
                                <?php
                                
                                }
                                ?>
                                <tr>
                                  
                                    <td colspan="2">รวมทั้งหมด</td>
                                    <td><?php echo number_format($x) ?></td>
                                  
                                </tr>
               
                            </tbody>
                        </table>             

                    </div><!-- end card-body-->
                </div>
            </div>
            <!-- end card1 -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">เบิกจ่ายรายผลผลิต</h5> 
                        
                        <?php
                          //ผลผลิต
                          $sql_p = "SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce FROM tb_ref GROUP BY produce ORDER BY `p` ASC;";
                          $query = mysqli_query($conn, $sql_p) or die("Error Query [" . $sql . "]");
                          foreach($query as $data){
                              $labels[] =$data['produce'];
                          }
                          //ประเภทเงินงวด            
                          // $sql_type = "SELECT DISTINCT(type_budget)  FROM tb_receive WHERE type_budget != 'งบตามแผน';";
                          // $query = mysqli_query($conn, $sql_type) or die("Error Query [" . $sql . "]");
                          // foreach($query as $data){
                          //     $types[] =$data['type_budget'];
                          // }
                          //Q1
                          $sql_q1 = "SELECT CASE WHEN tb_ref.produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN tb_ref.produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN tb_ref.produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN tb_ref.produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN tb_ref.produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN tb_ref.produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,tb_ref.produce ,SUM(tb_receive.amount) AS Toatal FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.budget1 ='2.งบดำเนินงาน' AND tb_ref.budget2 != '2.2 งบวัสดุวิทย์' AND tb_ref.budget2 != '2.3 งบขั้นต่ำ'GROUP BY tb_ref.produce ORDER BY `p` ASC;" ;
                          $query = mysqli_query($conn, $sql_q1) or die("Error Query [" . $sql_q1 . "]");
                          foreach($query as $data){
                            $q1[] =$data['Toatal'];
                          }
                       

                          //ยอดใช้(เบิกจ่าย)
                          // $sql_disburse = "SELECT `tb_ref`.`produce` , `tb_manage`.`type_buget`, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage 
                          //           INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='เบิกจ่าย' 
                          //           GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`;" ;
                          // $query = mysqli_query($conn, $sql_disburse) or die("Error Query [" . $sql . "]");
                          // foreach($query as $data){
                          //   $disburse[] =$data['disburse'];
                          // }

                          $sql_dq1 ="SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_manage`.`type_buget` as type_buget, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='เบิกจ่าย' AND `tb_manage`.`quarter` = 'Q1' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce ORDER BY `p` ASC";
                          $query = mysqli_query($conn, $sql_dq1) or die("Error Query [" . $sql_dq1 . "]");
                          foreach($query as $data){
                            $dq1[] =$data['amount'];
                          }
                          $sql_dq2 ="SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_manage`.`type_buget` as type_buget, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='เบิกจ่าย' AND `tb_manage`.`quarter` = 'Q2' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce ORDER BY `p` ASC";
                          $query = mysqli_query($conn, $sql_dq2) or die("Error Query [" . $sql_dq2 . "]");
                          foreach($query as $data){
                            $dq2[] =$data['amount'];
                          }
                          $sql_dq3 ="SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_manage`.`type_buget` as type_buget, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='เบิกจ่าย' AND `tb_manage`.`quarter` = 'Q3' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce ORDER BY `p` ASC";
                          $query = mysqli_query($conn, $sql_dq3) or die("Error Query [" . $sql_dq3 . "]");
                          foreach($query as $data){
                            $dq3[] =$data['amount'];
                          }
                          $sql_dq4 ="SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_manage`.`type_buget` as type_buget, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='เบิกจ่าย' AND  `tb_manage`.`quarter` = 'Q4' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce ORDER BY `p` ASC;";
                          $query = mysqli_query($conn, $sql_dq4) or die("Error Query [" . $sql_dq4 . "]");
                          foreach($query as $data){
                            $dq4[] =$data['amount'];
                          }

                          $sql_PO ="SELECT produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_manage`.`type_buget` as type_buget, SUM(`tb_manage`.`amount`) AS disburse FROM tb_manage INNER JOIN tb_ref ON `tb_manage`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_manage`.`type_buget` ='PO' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce;";
                          $query = mysqli_query($conn, $sql_PO) or die("Error Query [" . $sql_PO . "]");
                          foreach($query as $data){
                            $PO[] =$data['amount'];
                          }


                          //ตามแผน
                          $sql_p1 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q1' GROUP BY name_initials,quarter ORDER BY n ASC;";
                          $query_pq1 = mysqli_query($conn,  $sql_p1) or die("Error Query [" .  $sql_p1. "]");              
                          foreach($query_pq1  as $pq1  ){
                              $spq1[] =$pq1['amount'];
                          }
                          $sql_p2 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q2' GROUP BY name_initials,quarter ORDER BY n ASC;";
                          $query_pq2 = mysqli_query($conn,  $sql_p2) or die("Error Query [" .  $sql_p2. "]");              
                          foreach($query_pq2  as $pq2  ){
                              $spq2[] =$pq2['amount'];
                          }
                          $sql_p3 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q3' GROUP BY name_initials,quarter ORDER BY n ASC;";
                          $query_pq3 = mysqli_query($conn,  $sql_p3) or die("Error Query [" .  $sql_p3. "]");              
                          foreach($query_pq3  as $pq3  ){
                              $spq3[] =$pq3['amount'];
                          }
                          $sql_p4 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q4' GROUP BY name_initials,quarter ORDER BY n ASC;";
                          $query_pq4 = mysqli_query($conn,  $sql_p4) or die("Error Query [" .  $sql_p4. "]");              
                          foreach($query_pq4  as $pq4  ){
                              $spq4[] =$pq4['amount'];
                          }
                        ?>

                        <!-- Pie Chart -->
                        <canvas id="Chart" style="max-height: 1000px;"></canvas>
                        <script>
                          var chartE2 = document.getElementById("Chart");
                          chartE2.height = 225;
                        </script>
                        <script>
                          var data_p = {
                            labels: <?php echo json_encode($labels)?>, //ชื่อผลผลิต axis x
                                datasets: [{ 
                                  label: "งบประมาณ",
                                  type: "bar",
                                  stack: "Base",
                                  backgroundColor: "#0000FF",
                                  data:  <?php echo json_encode($q1)?>, //งวดที่1
                                  // pointStyle: 'rect'
                                  },
                                  // เงินงวด/ไตรมาส
                                  
                                  // เบิกจ่าย
                                  {
                                  label: "เบิกจ่าย Q1",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#006148",      
                                  data:<?php echo json_encode($dq1)?>,
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q2",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#008647",      
                                  data:  <?php echo json_encode($dq2)?>,//[613473,767645,179535,0,4050,450790,419219]
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q3",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#49b76e",      
                                  data:<?php echo json_encode($dq4)?>,// [933162,0790553,11500,8700,412808,316786]
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q4",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#b1ff1d",      
                                  data:[0, 0,0, 0, 0, 0],//[230765,0,208708,0,0,75966,54939]
                                  // pointStyle: 'rect'
                                  },

                                  // แผน
                                  {
                                  label: "แผน Q1",
                                  type: "bar",
                                  stack: "list",
                                  backgroundColor: "#914f3b",      
                                  data:<?php echo json_encode($spq1)?>,
                                  },
                                  {
                                  label: "แผน Q2",
                                  type: "bar",
                                  stack: "list",
                                  backgroundColor: "#b36c49",      
                                  data:  <?php echo json_encode($spq2)?>,
                                  },
                                  {
                                  label: "แผน Q3",
                                  type: "bar",
                                  stack: "list",
                                  backgroundColor: "#d58d57",      
                                  data:<?php echo json_encode($spq3)?>,
                                  },
                                  {
                                  label: "แผน Q4",
                                  type: "bar",
                                  stack: "list",
                                  backgroundColor: "#f6b165",      
                                  data:<?php echo json_encode($spq4)?>,
                                  },

                                ]
                              };

                              var customDataLabels_p ={
                              id: 'customDataLabels_p',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =data_p.datasets[1].data.map((datapoint,index) => {
                                  if(datapoint > data_p.datasets[1].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =data_p.datasets[0].data.map((datapoint,index) => {
                                  var x1 = Number(data_p.datasets[1].data[index]);
                                  var x2 = Number(data_p.datasets[2].data[index]);
                                  var x3 = Number(data_p.datasets[3].data[index]);
                                  var x4 = Number(data_p.datasets[4].data[index]);
                                  var cal =((x1+x2+x3+x4)/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 12px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+20,chart.getDatasetMeta(datasetArray[0]).data[index].y-10);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }
                          var config_p = {
                            type: 'bar',
                            data:data_p,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins:{
                                  legend:{
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        
                                      }
                                    
                                  }
                                }
                            },
                            plugins:[customDataLabels_p]
                          };

                          // render init block
                          var myChart21 = new Chart(document.getElementById('Chart'),config_p);

                        </script>
                        <!-- End Pie CHart -->
                    </div>
                </div>
            </div>
            <!-- end card2 -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">เบิกจ่ายตามประเภทงบ</h5> 
                        <canvas id="Chart2" style="max-height: 400px;"></canvas>
                        <?php
                          $sql_type = "SELECT * FROM `tb_type_budget`";
                          $query = mysqli_query($conn, $sql_type) or die("Error Query [" . $sql_type . "]");
                          foreach($query as $data){
                              $typess[] =$data['type'];
                              $budgetss[] =$data['budget'];
                              $disbursementss[] =$data['disbursement'];
                          }
                        ?>
                        <script>
                          var chartE2 = document.getElementById("Chart2");
                          chartE2.height = 225;
                        </script>
                        <script>
                        // setup 
                        const data = {
                          labels: <?php echo json_encode($typess)?>,
                          datasets: [{
                            label: 'งบประมาณ',
                            data: <?php echo json_encode($budgetss)?>, //4441900,  30805440  ,  41769375 
                            backgroundColor:'#0000FF',
                            borderWidth: 1
                          },{
                            label: 'เบิกจ่าย',
                            data: <?php echo json_encode($disbursementss)?>, //3813300, 22008125.69 , 34647275
                            backgroundColor: '#49b76e',
                            borderWidth: 1
                          }]
                        };

                        const customDataLabels ={
                            id: 'customDataLabels',
                            afterDatasetsDraw(chart,args,pluginOptions){
                            const {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                            const datasetArray =data.datasets[1].data.map((datapoint,index) => {
                                if(datapoint > data.datasets[1].data[index]){
                                return 0;
                                }
                                else {
                                return 1;
                                }

                            })
                            const diffArray =data.datasets[0].data.map((datapoint,index) => {
                                var cal =(data.datasets[1].data[index]/datapoint)*100 ;
                                return cal.toFixed(2)+"%";
                            })

                            console.log(datasetArray);
                            console.log(diffArray );
                            diffArray.forEach((value,index)=>{
                                ctx.font = "bold 18px em sans-serif";
                                ctx.fillStyle ='black';
                                ctx.textAlign ="center";
                                ctx.fillText(value,x.getPixelForValue(index)+30,chart.getDatasetMeta(datasetArray[0]).data[index].y-10);
                      
                                // ctx.font = "bold 12px FontAwesome";
                                // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                            
                            
                            })
                            ctx.save();
                            
                            }
                        }

                        // config 
                        const config = {
                          type: 'bar',
                          data,
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            },
                              plugins:{
                                  legend:{
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        
                                      }
                                    
                                  }
                                }
                          },
                          plugins:[customDataLabels]
                        };

                        // render init block
                        const myChart = new Chart(
                          document.getElementById('Chart2'),
                          config
                        );
                        </script>
                    </div>
                </div>
            </div> 
            <!-- end card3 -->
            
            <div class="col-lg-6" >
                <div class="card" style ="height: 490px;">
                    <div class="card-body">
                        <h5 class="card-title">ผลการเบิกจ่ายเทียบงบสุทธิ</h5>
                      <div class="row" style ="text-align:center;font-size: 20px;font-weight: bold;">
                        <div class="col-2"></div>
                        <div class="col-8">เป้าหมายและแผน</div>
                        <div class="col-2">ผลเบิกจ่าย</div>
                      </div>
                      <?php
                        $sql_target = "SELECT * FROM `tb_target`;";
                        $query_target = mysqli_query($conn,  $sql_target) or die("Error Query [" .$sql_target. "]");              
                            foreach($query_target  as $target ){
                                $names[] =$target['name'];
                                $t_q1[] =$target['q1'];
                                $t_q2[] =$target['q2'];
                                $t_q3[] =$target['q3'];
                                $t_q4[] =$target['q4'];
                                $percent[] =$target['percent'];
                            }
                     ?>                               
                      <div class="row">
                        <div class="col-2" >
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:50px" >  
                              <div class="col-12 arrow-pointer" ><?php echo $names[0]?></div>
                          </div>  <br>
                          <div class="row" style ="text-align:center; font-size: 14px;" >  
                              <div class="col-12 arrow-pointer2" ><?php echo $names[1]?></div>
                 
                          </div>
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:50px" >  
                              <div class="col-12 arrow-pointer" ><?php echo $names[2]?></div>
                          </div> 
                          <div class="row" style ="text-align:center; font-size: 12px;" >  
                              <div class="col-12 arrow-pointer2" ><?php echo $names[3]?></div>
                 
                          </div> 
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:30px" >  
                              <div class="col-12 arrow-pointer" ><?php echo $names[4]?></div>
                          </div> <br>
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:-10px" >  
                              <div class="col-12 arrow-pointer2" ><?php echo $names[5]?></div>
                 
                          </div>  
                         
                        </div>
                        <div class="col-8" >
                            <div class="row" style ="text-align:center; font-size: 20px;" >  
                              <!-- <div class="col-md-12 half-ellipse1" style ="background-color: coral;">เป้าหมาย</div> -->
                            </div>  
                            <div class="row" style ="text-align:center; font-size: 20px;" >  
                              <div class="col-3 flag" >Q1</div>
                              <div class="col-3 flag" >Q2</div>
                              <div class="col-3 flag" >Q3</div>
                              <div class="col-3 flag" >Q4</div>
                            </div> 

                            <div class="row" style ="text-align:center; font-size: 24px;margin-top:20px;font-weight: bold;" >  
                              <div class="col-3 shape1" style ="background-color:#ff9500;"><?php echo $t_q1[0]?></div>
                              <div class="col-3 shape2" style ="background-color:#ffaa00"><?php echo $t_q2[0]?></div>
                              <div class="col-3 shape3" style ="background-color:#ffd000"><?php echo $t_q3[0]?></div>
                              <div class="col-3 shape4" style ="background-color:#ffea00"><?php echo $t_q4[0]?></div>
                            </div> 
                            <div class="row" style ="text-align:center; font-size: 24px;font-weight: bold;margin-top:5px;" >  
                              <div class="col-3 shape1" style ="background-color:#ff9500;"><?php echo $t_q1[1]?></div>
                              <div class="col-3 shape2" style ="background-color:#ffaa00"><?php echo $t_q2[1]?></div>
                              <div class="col-3 shape3" style ="background-color:#ffd000"><?php echo $t_q3[1]?></div>
                              <div class="col-3 shape4" style ="background-color:#ffea00"><?php echo $t_q4[1]?></div>
                            </div> 
                            <div class="row" style ="text-align:center; font-size: 24px;margin-top:40px;font-weight: bold;" >
                            
                              <div class="col-3 shape1" style ="background-color:#00a9ff;"><?php echo $t_q1[2]?></div>
                              <div class="col-3 shape2" style ="background-color:#00bfff"><?php echo $t_q2[2]?></div>
                              <div class="col-3 shape3" style ="background-color:#00d4ff"><?php echo $t_q3[2]?></div>
                              <div class="col-3 shape4" style ="background-color:#00e9ff"><?php echo $t_q4[2]?></div>
                            </div> 
                            <div class="row" style ="text-align:center; font-size: 24px;font-weight: bold;margin-top:5px;" >  
                            
                              <div class="col-3 shape1" style ="background-color:#00a9ff;" ><?php echo $t_q1[3]?></div>
                              <div class="col-3 shape2" style ="background-color:#00bfff"><?php echo $t_q2[3]?></div>
                              <div class="col-3 shape3" style ="background-color:#00d4ff"><?php echo $t_q3[3]?></div>
                              <div class="col-3 shape4" style ="background-color:#00e9ff"><?php echo $t_q4[3]?></div>
                            </div> 
                            <div class="row" style ="text-align:center; font-size: 24px;margin-top:40px;font-weight: bold;coloe:black" >  
                            <div class="col-3 shape1" style ="background-color:#d900ff;" ><?php echo $t_q1[4]?></div>
                              <div class="col-3 shape2" style ="background-color:#ee76ff;"><?php echo $t_q2[4]?></div>
                              <div class="col-3 shape3" style ="background-color:#f189ff;"><?php echo $t_q3[4]?></div>
                              <div class="col-3 shape4" style ="background-color:#f39dff"><?php echo $t_q4[4]?></div>
                            </div> 
                            <div class="row" style ="text-align:center; font-size: 24px;font-weight: bold;margin-top:5px;" >  
                              <div class="col-3 shape1" style ="background-color:#d900ff;" ><?php echo $t_q1[5]?></div>
                              <div class="col-3 shape2" style ="background-color:#ee76ff;"><?php echo $t_q2[5]?></div>
                              <div class="col-3 shape3" style ="background-color:#f189ff;"><?php echo $t_q3[5]?></div>
                              <div class="col-3 shape4" style ="background-color:#f39dff;"><?php echo $t_q4[5]?></div>
                            </div> 


                            
                        </div>
                             
                        <div class="col-2" style ="text-align:center; font-size: 20px;margin-left:-60px">
                           <!-- <div class="col-md-12 half-ellipse1" style ="background-color: coral;"> ผลลัพธ์</div> -->
                            <div class="row" style ="text-align:center; font-size: 14px;margin-top:40px" >  
                              <div class="col-12 circle" ><p style ="text-align:center; font-size: 21.5px;color:black;margin-top:30px;font-weight: bold;"><?php echo $percent[0]?></p></div>
                            </div> 
                          
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:10px" >  
                              <div class="col-12 circle2" ><p style ="text-align:center; font-size: 21.5px;color:black;margin-top:30px;font-weight: bold;"><?php echo $num." "."%"; ?></p></div>

                          </div> 
                          
                          <div class="row" style ="text-align:center; font-size: 14px;margin-top:10px" >  
                              <div class="col-12 circle3" ><p style ="text-align:center; font-size: 21.5px;color:black;margin-top:30px;font-weight: bold;"><?php echo number_format(($disbursementss[2]/$budgetss[2])*100, 2, '.', '')." "."%";?></p></div>
                          </div> 
                          

                            
                        </div>    
                      </div>
                        

                    </div>
                </div>
            </div> 
            <!-- end card4 --> 
            <div class="col-lg-6">
                <div class="card" style ="height: 480px;">
                    <div class="card-body">
                        <h5 class="card-title">งบลงทุนและวัสดุวิทยาศาสตร์</h5>
                        <?php 
                            $query = "SELECT type,COUNT(list) as count_list,SUM(budget) as budget,SUM(procurement) as p ,(CASE WHEN type ='ครุภัณฑ์วิทยาศาสตร์' THEN 'ศูนย์ระยอง , ศูนย์อ้างอิง' WHEN type ='วัสดุวิทยาศาสตร์' THEN 'ศูนย์ระยอง , ศูนย์อ้างอิง , กลุ่มสิ่งแวดล้อมฯ' ELSE id_group END) AS id_group ,COUNT(CASE WHEN `overall` = 'แดง' THEN 1 END) AS status1 ,COUNT(CASE WHEN `overall` = 'ส้ม' THEN 1 END) AS status2 ,COUNT(CASE WHEN `overall` = 'เขียว' THEN 1 END) AS status3,COUNT(CASE WHEN `overall` = 'เหลือง' THEN 1 END) AS status4 FROM tb_investment GROUP BY type;";
                            $result = mysqli_query($conn, $query);
                        ?>
                        <table class="table table-bordered" style ="text-align:center; width:100%;">
                            <tr>
                                <th scope="col">ประเภท</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">งบประมาณ</th>
                                <th scope="col">งบจัดซื้อ<br>งบคงเหลือ</th>
                                <th scope="col" colspan="4">สถานะ</th>
                                <th scope="col">กลุ่ม</th>
                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["count_list"]; ?></td>
                                <td><?php echo number_format($row["budget"]); ?></td>
                                <td><?php echo number_format($row["p"])."<br> ". number_format($row["budget"]-$row["p"]) ; ?></td>
                                <td><label><button style = "background-color:#ff3333;color:black;border-color:#ff3333 ;height: 45px;width: 45px;font-size: 16px;font-weight: bold;" type="button" class="btn btn-danger hover1" id="<?php echo $row["type"]; ?>" ><?php echo $row["status1"]; ?></button></label></td>
                                <td><label><button style = "background-color:orange;border-color: orange;color:black;height: 45px;width: 45px;font-size: 16px;font-weight: bold;" type="button" class="btn btn-danger hover2" id="<?php echo $row["type"]; ?>" ><?php echo $row["status2"]; ?></button></label></td>
                                <td><label><button style = "background-color:Yellow;border-color: Yellow;color:black;height: 45px;width: 45px;font-size: 16px;font-weight: bold;" type="button" class="btn btn-danger hover3" id="<?php echo $row["type"]; ?>" ><?php echo $row["status4"]; ?></button></label></td>
                                <td><label><button style = "background-color:#1aff66;color:black;border-color: #1aff66;height: 45px;width: 45px;font-size: 16px;font-weight: bold;" type="button" class="btn btn-danger hover" id="<?php echo $row["type"]; ?> "><?php echo $row["status3"]; ?></button></label></td>
                                <td><?php echo $row["id_group"]; ?></td>
                            

                            </tr>
                            <?php 
                            }
                            ?>
                        </table>
                        
                    </div>
                </div>
            </div> 
            <!-- end card5 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">งบประมาณที่ได้รับและการเบิกจ่ายในแต่ละกลุ่ม/ศูนย์</h5> 
                        <div class="row" >
                            <div class="col-9" >
                              <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="ta btn btn-outline-primary" id ="tab1">Q1</button>
                                <button type="button" class="ta btn btn-outline-primary" id ="tab2">Q2</button>
                                <button type="button" class="ta btn btn-outline-primary" id ="tab3">Q3</button>
                                <button type="button" class="ta btn btn-outline-primary" id ="tab4">Q4</button>
                                                          
                              </div>
                            </div>
                         
                            <div class="col-3">
                              <div class="row">
                                <div class="col-6">
                                    <table  style="border: none;">
                                      
                                      <tbody>
                                            <tr style="border: none;text-align: center;">
                                              <td>งบประมาณ</td>
                                              <td><i class="fa fa-square fa-fw" style="color:#0000FF;"></i></td>                                          
                                            </tr>                       
                                            <tr style="border: none;">               
                                              <td>กันเงิน</td>
                                              <td><i class="fa fa-square fa-fw" style="color:red"></i></td>
                                            </tr>
                                      </tbody>
                                    </table>       
                                </div>
                                <div class="col-6">
                              <table  style="border: none;text-align: center;">
                                <tbody>
                                      <tr style="border: none;">
                                        <td></td>                  
                                        <td>แผน</td>
                                        <td>เบิก</td>
                                      </tr>                       
                                      <tr style="border: none;">
                                        <td>Q1</td>                  
                                        <td><i class="fa fa-square fa-fw" style="color:#914f3b"></i></td>
                                        <td><i class="fa fa-square fa-fw" style="color:#006148"></i></td>
                                      </tr>
                                      <tr style="border: none;">
                                        <td>Q2</td>                    
                                        <td><i class="fa fa-square fa-fw" style="color:#b36c49"></i></td>
                                        <td><i class="fa fa-square fa-fw" style="color:#008647"></i></td>
                                      </tr>
                                      <tr style="border: none;">
                                        <td>Q3</td>                    
                                        <td><i class="fa fa-square fa-fw" style="color:#d58d57"></i></td>
                                        <td><i class="fa fa-square fa-fw" style="color:#49b76e"></i></td>
                                      </tr>
                                      <tr style="border: none;">
                                        <td>Q4</td>                    
                                        <td><i class="fa fa-square fa-fw" style="color:#f6b165"></i></td>
                                        <td><i class="fa fa-square fa-fw" style="color:#b1ff1d"></i></td>
                                      </tr>
                                </tbody>
                            </table>                 

                            </div>

                              </div>
                                         

                            </div>
                            
                        </div>

                        
                         
                        <div id="tab1show" class="tab">
                          <canvas id="Chart31" style="max-height: 400px;" ></canvas> 
                        </div>

                        <div id="tab2show" class="tab">
                          <canvas id="Chart32" style="max-height: 400px;"></canvas>
                        </div>

                        <div id="tab3show" class="tab">
                          <canvas id="Chart33" style="max-height: 400px;"></canvas>  
                        </div>

                        <div id="tab4show" class="tab">
                          <canvas id="Chart30" style="max-height: 400px;"></canvas>
                        </div>

                        <!-- <div class="row">
                          <div class="col-md-1">ภาพรวม</div>
                          <div class="col-md-1">0.00 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.00 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.00 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.39 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.03 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.00 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.00 %</div>
                          <div class="col-md-1" style="margin-left:40px ;">0.00 %</div>
                          <div class="col-md-1" style="margin-left:30px ;">0.00 %</div>


                          
                        </div> -->
                        
                        <?php
                            // ALL
                             $sql_group = "SELECT DISTINCT tb_group.name_initials as name_initials , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_receive INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group ORDER BY n ASC;";
                             $query_group = mysqli_query($conn,  $sql_group) or die("Error Query [" .  $sql_group. "]");
                             foreach($query_group as $group ){
                                $groups[] =$group['name_initials'];
                             }
                             $sql_budget = "SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials as name_initials,tb_ref.produce as produce, SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT tb_group.name_initials as name_initials,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group GROUP BY tb_group.name_initials ,tb_ref.produce) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_budget = mysqli_query($conn,  $sql_budget) or die("Error Query [" .  $sql_budget. "]");              
                            foreach($query_budget  as $budget  ){
                                $budgets[] =$budget['amount'];
                            }
                            $sql_d ="SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='เบิกจ่าย' GROUP BY tb_group.name_initials ORDER BY n ASC;";
                            $query_d = mysqli_query($conn,  $sql_d) or die("Error Query [" .  $sql_d. "]");              
                            foreach($query_d  as $spend  ){
                                $spends[] =$spend['amount'];
                            }

                            $sql_s ="SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='กันเงิน' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_s = mysqli_query($conn,  $sql_s) or die("Error Query [" .  $sql_s. "]");              
                            foreach($query_s  as $s  ){
                                $ss[] =$s['amount'];
                            }
                            // End All

                            //Q1
                            $sql_budgetq1 = "SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials as name_initials, SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_receive.quarter ='Q1' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT tb_group.name_initials as name_initials,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group WHERE tb_adjust.quarter ='Q1' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_budgetq1 = mysqli_query($conn,  $sql_budgetq1) or die("Error Query [" .  $sql_budgetq1. "]");              
                            foreach($query_budgetq1  as $budgetq1  ){
                                $budgetsq1[] =$budgetq1['amount'];
                            }
                            $sql_dq1 ="SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_manage.quarter ='Q1' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_dq1 = mysqli_query($conn,  $sql_dq1) or die("Error Query [" .  $sql_dq1. "]");              
                            foreach($query_dq1  as $spendq1  ){
                                $spendsq1[] =$spendq1['amount'];
                            }

                            $sql_sq1 ="SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n  FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='กันเงิน' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_sq1 = mysqli_query($conn,  $sql_sq1) or die("Error Query [" .  $sql_sq1. "]");              
                            foreach($query_sq1  as $sq1  ){
                                $ssq1[] =$sq1['amount'];
                            }
                            //End Q1

                            //Q2
                            $sql_budgetq2 = "SELECT name_initials ,sum(amount) AS amount  , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials as name_initials, SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_receive.quarter ='Q1' OR tb_receive.quarter ='Q2' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT tb_group.name_initials as name_initials,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group WHERE tb_adjust.quarter ='Q1' OR tb_adjust.quarter ='Q2' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_budgetq2 = mysqli_query($conn,  $sql_budgetq2) or die("Error Query [" .  $sql_budgetq2. "]");              
                            foreach($query_budgetq2  as $budgetq2  ){
                                $budgetsq2[] =$budgetq2['amount'];
                            }
                            $sql_dq2 ="SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_manage.quarter ='Q2' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_dq2 = mysqli_query($conn,  $sql_dq2) or die("Error Query [" .  $sql_dq2. "]");              
                            foreach($query_dq2  as $spendq2  ){
                                $spendsq2[] =$spendq2['amount'];
                            }

                             //End Q2

                            //Q3
                            $sql_budgetq3 = "SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials as name_initials, SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_receive.quarter ='Q1' OR tb_receive.quarter ='Q2' OR tb_receive.quarter ='Q3' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT tb_group.name_initials as name_initials,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group WHERE tb_adjust.quarter ='Q1' OR tb_adjust.quarter ='Q2' OR tb_adjust.quarter ='Q3' GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_budgetq3 = mysqli_query($conn,  $sql_budgetq3) or die("Error Query [" .  $sql_budgetq3. "]");              
                            foreach($query_budgetq3  as $budgetq3  ){
                                $budgetsq3[] =$budgetq3['amount'];
                            }
                            $sql_dq3 ="SELECT name_initials ,sum(amount) AS amount, CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n  FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_manage.quarter ='Q1' AND tb_manage.quarter ='Q2' AND tb_manage.quarter ='Q3' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_dq3 = mysqli_query($conn,  $sql_dq3) or die("Error Query [" .  $sql_dq3. "]");              
                            foreach($query_dq3  as $spendq3  ){
                                $spendsq3[] =$spendq3['amount'];
                            }

                            //End Q3

                            //Q4
                            $sql_budgetq4 = "SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials as name_initials,tb_ref.produce as produce, SUM(tb_receive.amount) as amount FROM tb_receive 
                            INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' 
                            GROUP BY tb_group.name_initials ,tb_ref.produce UNION ALL SELECT tb_group.name_initials as name_initials,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
                            FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
                            GROUP BY tb_group.name_initials ,tb_ref.produce) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_budgetq4 = mysqli_query($conn,  $sql_budgetq4) or die("Error Query [" .  $sql_budgetq4. "]");              
                            foreach($query_budgetq4  as $budgetq4  ){
                                $budgetsq4[] =$budgetq4['amount'];
                            }
                            $sql_dq4 ="SELECT name_initials ,sum(amount) AS amount , CASE WHEN name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM (SELECT tb_group.name_initials,SUM(tb_manage.amount) as amount FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_manage.quarter ='Q4' GROUP BY tb_group.name_initials UNION ALL SELECT name_initials as name_initials, 0 as amount FROM tb_group) as a GROUP BY name_initials ORDER BY n ASC;";
                            $query_dq4 = mysqli_query($conn,  $sql_dq4) or die("Error Query [" .  $sql_dq4. "]");              
                            foreach($query_dq4  as $spendq4  ){
                                $spendsq4[] =$spendq4['amount'];
                            }
                            //End Q4

                            //ตามแผน
                            $sql_p1 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q1' GROUP BY name_initials,quarter ORDER BY n ASC;";
                            $query_pq1 = mysqli_query($conn,  $sql_p1) or die("Error Query [" .  $sql_p1. "]");              
                            foreach($query_pq1  as $pq1  ){
                                $spq1[] =$pq1['amount'];
                            }
                            $sql_p2 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q2' GROUP BY name_initials,quarter ORDER BY n ASC;";
                            $query_pq2 = mysqli_query($conn,  $sql_p2) or die("Error Query [" .  $sql_p2. "]");              
                            foreach($query_pq2  as $pq2  ){
                                $spq2[] =$pq2['amount'];
                            }
                            $sql_p3 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q3' GROUP BY name_initials,quarter ORDER BY n ASC;";
                            $query_pq3 = mysqli_query($conn,  $sql_p3) or die("Error Query [" .  $sql_p3. "]");              
                            foreach($query_pq3  as $pq3  ){
                                $spq3[] =$pq3['amount'];
                            }
                            $sql_p4 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q4' GROUP BY name_initials,quarter ORDER BY n ASC;";
                            $query_pq4 = mysqli_query($conn,  $sql_p4) or die("Error Query [" .  $sql_p4. "]");              
                            foreach($query_pq4  as $pq4  ){
                                $spq4[] =$pq4['amount'];
                            }

                        ?>
                        
                      
                          <!-- <canvas id="Chart30" style="max-height: 400px;"></canvas> -->
                          <script>
                          var chartEl2 = document.getElementById("Chart30");
                          chartEl2.height = 2500;
                        </script>
                          <script>
                          // setup !!! Q4 !!!
                          var data2 = {
                            labels: <?php echo json_encode($groups)?>, //ชื่อผลผลิต axis x
                                datasets: [{ 
                                  label: "งบประมาณ",
                                  type: "bar",
                                  stack: "Base",
                                  backgroundColor: "#0000FF",
                                  data: <?php echo json_encode($budgets)?>, //งวดที่1
                                  // pointStyle: 'rect'
                                  },
                                  // เงินงวด/ไตรมาส
                                  
                                  // แผน
                                  {
                                  label: "แผน Q1",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#914f3b",      
                                  data: <?php echo json_encode($spq1)?>//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q2",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#b36c49",      
                                  data:<?php echo json_encode($spq2)?>,//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q3",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#d58d57",      
                                  data: <?php echo json_encode($spq3)?>,//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q4",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#f6b165",      
                                  data:<?php echo json_encode($spq4)?>,//$,
                                 // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q1",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#006148",      
                                  data:<?php echo json_encode($spendsq1)?>,//$echo json_encode($spendsq1),
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q2",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#008647",      
                                  data: <?php echo json_encode($spendsq2)?>,//$,echo json_encode($spendsq2)
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q3",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#49b76e",      
                                  data: <?php echo json_encode($spendsq3)?>,//$echo json_encode($spendsq3),
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q4",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#b1ff1d",      
                                  data:<?php echo json_encode($spendsq4)?>,//$,echo json_encode($spendsq4)
                                  // pointStyle: 'rect'
                                  },
                                  {
                                    label: 'กันเงิน',
                                    type: "bar",
                                    stack: "sen",
                                    data: <?php echo json_encode($ssq1)?>,//$ss
                                    backgroundColor: [ 'red'],
                                    borderColor: ['red'],
                                    borderWidth: 1
                                  }
                                ]
                              };

                          var customDataLabels2 ={
                              id: 'customDataLabels2',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =data2.datasets[5].data.map((datapoint,index) => {
                                  if(datapoint > data2.datasets[5].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =data2.datasets[0].data.map((datapoint,index) => {
                                  var x1 = Number(data2.datasets[5].data[index]);
                                  var x2 = Number(data2.datasets[6].data[index]);
                                  var x3 = Number(data2.datasets[7].data[index]);
                                  var x4 = Number(data2.datasets[8].data[index]);
                                  var cal =((x1+x2+x3+x4)/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 18px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+5,25);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }

                          // config 
                          var config20 = {
                            type: 'bar',
                            data:data2,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins: {
                                  legend: {
                                      display: false
                                  },
                              }
                              
                            },
                            plugins:[customDataLabels2],
                            
                          };

                          // render init block
                          var myChart20 = new Chart(document.getElementById('Chart30'),config20);
   
                         //Q1

                          var chartEl3 = document.getElementById("Chart31");
                          chartEl3.height = 2500;                     
                          // setup 
                          var data3 = {
                            labels: <?php echo json_encode($groups)?>, //ชื่อผลผลิต axis x
                                datasets: [{ 
                                  label: "งบประมาณ",
                                  type: "bar",
                                  stack: "Base",
                                  backgroundColor: "#0000FF",
                                  data: <?php echo json_encode($budgets)?>, //งวดที่1
                                  // pointStyle: 'rect'
                                  },
                                  // เงินงวด/ไตรมาส
                                  
                                  // แผน
                                  {
                                  label: "แผน Q1",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#914f3b",      
                                  data: <?php echo json_encode($spq1)?>//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "เบิกจ่าย Q1",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#006148",      
                                  data:<?php echo json_encode($spendsq1)?>,//$echo json_encode($spendsq1),
                                  // pointStyle: 'rect'
                                  },
                                  {
                                    label: 'กันเงิน',
                                    type: "bar",
                                    stack: "sen",
                                    data: <?php echo json_encode($ssq1)?>,//$ss
                                    backgroundColor: [ 'red'],
                                    borderColor: ['red'],
                                    borderWidth: 1
                                  }
                                ]
                          };

                          var customDataLabels3 ={
                              id: 'customDataLabels3',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =data3.datasets[1].data.map((datapoint,index) => {
                                  if(datapoint > data3.datasets[1].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =data3.datasets[0].data.map((datapoint,index) => {
                                  var cal =(data3.datasets[2].data[index]/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 18px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+5,25);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }

                          // config 
                          var config21 = {
                            type: 'bar',
                            data:data3,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins: {
                                  legend: {
                                      display: false
                                  },
                              }
                            },
                            plugins:[customDataLabels3]
                          };

                          // render init block
                          var myChart21 = new Chart(document.getElementById('Chart31'),config21);
                          
                          

                      
                        // Q2                        
                          var chartEl4 = document.getElementById("Chart32");
                          chartEl4.height = 2500;                   
                          // setup 
                          var data4 = {
                            labels: <?php echo json_encode($groups)?>, //ชื่อผลผลิต axis x
                                datasets: [{ 
                                  label: "งบประมาณ",
                                  type: "bar",
                                  stack: "Base",
                                  backgroundColor: "#0000FF",
                                  data: <?php echo json_encode($budgets)?>, //งวดที่1
                                  // pointStyle: 'rect'
                                  },
                                  // เงินงวด/ไตรมาส
                                  
                                  // แผน
                                  {
                                  label: "แผน Q1",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#914f3b",      
                                  data: <?php echo json_encode($spq1)?>//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q2",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#b36c49",      
                                  data:<?php echo json_encode($spq2)?>,//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "เบิกจ่าย Q1",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#006148",      
                                  data:<?php echo json_encode($spendsq1)?>,//$echo json_encode($spendsq1),
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q2",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#008647",      
                                  data: <?php echo json_encode($spendsq2)?>,//$,echo json_encode($spendsq2)
                                  // pointStyle: 'rect'
                                  },
                                  {
                                    label: 'กันเงิน',
                                    type: "bar",
                                    stack: "sen",
                                    data: <?php echo json_encode($ssq1)?>,//$ss
                                    backgroundColor: [ 'red'],
                                    borderColor: ['red'],
                                    borderWidth: 1
                                  }
                                ]
                          };

                          var customDataLabels4 ={
                              id: 'customDataLabels4',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =data4.datasets[1].data.map((datapoint,index) => {
                                  if(datapoint > data4.datasets[1].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =data4.datasets[0].data.map((datapoint,index) => {
                                
                                  var x3 = Number(data4.datasets[3].data[index]);
                                  var x4 = Number(data4.datasets[4].data[index]);
                                  var cal =((x3+x4)/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 18px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+5,25);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }

                          // config 
                          var config22 = {
                            type: 'bar',
                            data:data4,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins: {
                                  legend: {
                                      display: false
                                  },
                              }
                            },
                            plugins:[customDataLabels4]
                          };

                          // render init block
                          var myChart22 = new Chart(document.getElementById('Chart32'),config22);
          
                          // <!-- Q3 -->                  
                          var chartEl5 = document.getElementById("Chart33");
                          chartEl5.height = 2500;
   
                          // setup 
                          var data5 = {
                            labels: <?php echo json_encode($groups)?>, //ชื่อผลผลิต axis x
                                datasets: [{ 
                                  label: "งบประมาณ",
                                  type: "bar",
                                  stack: "Base",
                                  backgroundColor: "#0000FF",
                                  data: <?php echo json_encode($budgets)?>, //งวดที่1
                                  // pointStyle: 'rect'
                                  },
                                  // เงินงวด/ไตรมาส
                                  
                                  // แผน
                                  {
                                  label: "แผน Q1",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#914f3b",      
                                  data: <?php echo json_encode($spq1)?>//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q2",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#b36c49",      
                                  data:<?php echo json_encode($spq2)?>,//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "แผน Q3",
                                  type: "bar",
                                  stack: "bar1",
                                  backgroundColor: "#d58d57",      
                                  data: <?php echo json_encode($spq3)?>,//$,
                                  // pointStyle: 'rect'
                                  },// แผน
                                  {
                                  label: "เบิกจ่าย Q1",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#006148",      
                                  data:<?php echo json_encode($spendsq1)?>,//$echo json_encode($spendsq1),
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q2",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#008647",      
                                  data: <?php echo json_encode($spendsq2)?>,//$,echo json_encode($spendsq2)
                                  // pointStyle: 'rect'
                                  },
                                  {
                                  label: "เบิกจ่าย Q3",
                                  type: "bar",
                                  stack: "Sensitivity",
                                  backgroundColor: "#49b76e",      
                                  data: <?php echo json_encode($spendsq3)?>,//$echo json_encode($spendsq3),
                                  // pointStyle: 'rect'
                                  },                                 
                                  {
                                    label: 'กันเงิน',
                                    type: "bar",
                                    stack: "sen",
                                    data: <?php echo json_encode($ssq1)?>,//$ss
                                    backgroundColor: [ 'red'],
                                    borderColor: ['red'],
                                    borderWidth: 1
                                  }
                                ]
                          };

                          var customDataLabels5 ={
                              id: 'customDataLabels5',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =data5.datasets[1].data.map((datapoint,index) => {
                                  if(datapoint > data5.datasets[1].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =data5.datasets[0].data.map((datapoint,index) => {
                               
                                  var x2 = Number(data5.datasets[4].data[index]);
                                  var x3 = Number(data5.datasets[5].data[index]);
                                  var x4 = Number(data5.datasets[6].data[index]);
                                  var cal =((x2+x3+x4)/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 18px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+5,25);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }

                          // config 
                          var config23 = {
                            type: 'bar',
                            data:data5,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins: {
                                  legend: {
                                      display: false
                                  },
                              }
                            },
                            plugins:[customDataLabels5]
                          };

                          // render init block
                          var myChart23 = new Chart(document.getElementById('Chart33'),config23);
                          
                      
                                $('#tab1show').hide();
                                $('#tab2show').hide();
                                $('#tab3show').hide();
                                $('.ta').click(function () {
                                $('.tab').hide();
                                console.log("#"+$(this).attr("id")+"show");
                                $("#"+$(this).attr("id")+"show").show();
                            });
                        </script>

                    </div>
                </div>
            </div>
            <!-- end card6 -->
            <div class="col-lg-6">
          <div class="card" style="height: 625px;;">
            <div class="card-body">
              <h5 class="card-title">ผลผลิตแต่ในแต่ละกลุ่ม/ศูนย์</h5>
              <select name="selDept" id="selDept" class="form-select" aria-label="Default select example">
                <?php
                   $sql_n = "SELECT name_group FROM tb_group ;";
                   $name = mysqli_query($conn, $sql_n ) or die("Error Query [" . $sql_n . "]");
                   while ($group_name = mysqli_fetch_array($name)) {
                ?>
                    <option selected value = <?php echo $group_name["name_group"]?>  ><?php echo $group_name["name_group"]?> </option>
                <?php
                    }
                  ?>
              </select>
                <!-- <div style="text-align: center; font-size: 20px;">แสดงข้อมูลจำนวนแต่ละตำแหน่ง</div> -->
                <div>
                     <i class="fa fa-square fa-2x fa-fw" style="color: #0000FF"></i>งบประมาณ
                     <i class="fa fa-square fa-2x fa-fw" style="color: #00FF00"></i>เบิกจ่าย
                </div>
                
              
              <div class="row">
                <!-- Doughnut Chart -->
                    <div class="col-3"  id="divChart" style = "text-align: center; ">

                    </div>
                    <div class="col-3" id="divChart2" style = "text-align: center; ">

                    </div>
                    <div class="col-3" id="divChart3" style = "text-align: center; ">
  
                    </div>
                    <div class="col-3" id="divChart4" style = "text-align: center; ">
  
                    </div>
              </div>
              <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3" id="divChart5" style = "text-align: center; ">
        
                    </div>
                    <div class="col-3" id="divChart6" style = "text-align: center; ">
                  
                    </div>
                    <div class="col-3" id="divChart7" style = "text-align: center; ">
                
                    </div>
                    <div class="col-1">
                        
                    </div>
              </div>
              <script>
                 let department = 'department=' + document.getElementById("selDept").value;
                 let xhr = new XMLHttpRequest();
                 xhr.open('POST','get2.php');
                 xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    xhr.send(department);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState == 4 && xhr.status == 200){
                            document.getElementById("divChart").innerHTML ='<canvas id="cnvChart"></canvas>ผลผลิตที่ 1.1';
                            let r = JSON.parse(this.response);
                            const centerText ={
                              id: 'centerText',
                              beforeDraw(chart,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r.per;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }

                            // config 
                            const config = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r.p11,
                                backgroundColor: r.color

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText]
                            };

                            // render init block
                            let chart =new Chart(document.getElementById("cnvChart"),config);

                            document.getElementById("divChart2").innerHTML ='<canvas id="cnvChart2"></canvas> ผลผลิตที่ 2.2';
                            let r2 = JSON.parse(this.response);
                            const centerText2 ={
                              id: 'centerText2',
                              beforeDraw(chart2,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart2;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r.per22;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config2 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r2.p22,
                                backgroundColor: r2.color22

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText2]
                            };

                            // render init block
                            let chart2 =new Chart(document.getElementById("cnvChart2"),config2);

                            document.getElementById("divChart3").innerHTML ='<canvas id="cnvChart3"></canvas> <div style="text-align: center;">ผลผลิตที่ 6.1</div>';
                            let r3 = JSON.parse(this.response);
                            const centerText3 ={
                              id: 'centerText3',
                              beforeDraw(chart3,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart3;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r3.per61;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config3 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r3.p61,
                                backgroundColor: r3.color61

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText3]
                            };

                            // render init block
                            let chart3 =new Chart(document.getElementById("cnvChart3"),config3);

                            document.getElementById("divChart4").innerHTML ='<canvas id="cnvChart4"></canvas> ผลผลิตที่ 6.2';
                            let r4 = JSON.parse(this.response);
                            const centerText4 ={
                              id: 'centerText4',
                              beforeDraw(chart4,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart4;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r4.per62;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config4 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r4.p62,
                                backgroundColor: r4.color62

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText4]
                            };

                            // render init block
                            let chart4 =new Chart(document.getElementById("cnvChart4"),config4);

                            document.getElementById("divChart5").innerHTML ='<canvas id="cnvChart5"></canvas> ผลผลิตที่ 6.3';
                            let r5 = JSON.parse(this.response);
                            const centerText5 ={
                              id: 'centerText5',
                              beforeDraw(chart5,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart5;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r5.per63;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config5 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r5.p63,
                                backgroundColor: r5.color63

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText5]
                            };

                            // render init block
                            let chart5 =new Chart(document.getElementById("cnvChart5"),config5);

                            document.getElementById("divChart6").innerHTML ='<canvas id="cnvChart6"></canvas> ผลผลิตที่ 9.4';
                            let r6 = JSON.parse(this.response);
                            const centerText6 ={
                              id: 'centerText6',
                              beforeDraw(chart6,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart6;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r6.per94;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config6 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r6.p94,
                                backgroundColor: r6.color94

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText6]
                            };

                            // render init block
                            let chart6 =new Chart(document.getElementById("cnvChart6"),config6);

                            document.getElementById("divChart7").innerHTML ='<canvas id="cnvChart7"></canvas> ผลผลิตที่ 10.1';
                            let r7 = JSON.parse(this.response);
                            const centerText7 ={
                              id: 'centerText7',
                              beforeDraw(chart7,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart7;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r7.per101 ;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config7 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r7.p101,
                                backgroundColor: r7.color101,

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText7]
                            };

                            // render init block
                            let chart7 =new Chart(document.getElementById("cnvChart7"),config7);
                            

                            
                        }
                    }

                    document.getElementById("selDept").onchange =function(){
                        let department = 'department=' + document.getElementById("selDept").value;
                        let xhr = new XMLHttpRequest();
                        xhr.open('POST','get2.php');
                        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                        xhr.send(department);
                        xhr.onreadystatechange = function(){
                            if(xhr.readyState == 4 && xhr.status == 200){
                              document.getElementById("divChart").innerHTML ='<canvas id="cnvChart"></canvas> ผลผลิตที่ 1.1';
                              let r = JSON.parse(this.response);
                              const centerText ={
                                id: 'centerText',
                                beforeDraw(chart,args,options){
                                  const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart;
                                  var fontSize = (height / 140).toFixed(2);
                                  ctx.font =fontSize + "em sans-serif";
                                  ctx.textBaseline = "middle";
                                  var  text = r.per;
                                  ctx.fillStyle ='black';
                                  textX = Math.round((width - ctx.measureText(text).width) / 2),
                                  textY = height / 2;
                                  ctx.fillText(text ,textX,textY);
                                }
                              }

                              // config 
                              const config = {
                                type: 'doughnut',
                                data:{
                                labels: ['เบิกจ่าย','งบประมาณ'],
                                datasets: [{
                                  // label: 'Weekly Sales',
                                  data: r.p11,
                                  backgroundColor: r.color

                                }]
                              },
                                options: {
                                  plugins: {
                                    legend: {
                                      display: false,
                                    }
                                  }
                                },
                                plugins : [centerText]
                              };

                              // render init block
                              let chart =new Chart(document.getElementById("cnvChart"),config);

                              document.getElementById("divChart2").innerHTML ='<canvas id="cnvChart2"></canvas> ผลผลิตที่ 2.2';
                              let r2 = JSON.parse(this.response);
                              const centerText2 ={
                                id: 'centerText2',
                                beforeDraw(chart,args,options){
                                  const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart;
                                  var fontSize = (height / 140).toFixed(2);
                                  ctx.font =fontSize + "em sans-serif";
                                  ctx.textBaseline = "middle";
                                  var  text = r2.per22;
                                  ctx.fillStyle ='black';
                                  textX = Math.round((width - ctx.measureText(text).width) / 2),
                                  textY = height / 2;
                                  ctx.fillText(text ,textX,textY);
                                }
                              }

                              // config 
                              const config2 = {
                                type: 'doughnut',
                                data:{
                                labels: ['เบิกจ่าย','งบประมาณ',],
                                datasets: [{
                                  // label: 'Weekly Sales',
                                  data: r2.p22,
                                  backgroundColor: r2.color22

                                }]
                              },
                                options: {
                                  plugins: {
                                    legend: {
                                      display: false,
                                    }
                                  }
                                },
                                plugins : [centerText2]
                              };

                              // render init block
                              let chart2 =new Chart(document.getElementById("cnvChart2"),config2);

                              document.getElementById("divChart3").innerHTML ='<canvas id="cnvChart3"></canvas> ผลผลิตที่ 6.1';
                              let r3 = JSON.parse(this.response);
                              const centerText3 ={
                              id: 'centerText3',
                              beforeDraw(chart3,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart3;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r3.per61;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config3 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r3.p61,
                                backgroundColor: r3.color61

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText3]
                            };

                            // render init block
                            let chart3 =new Chart(document.getElementById("cnvChart3"),config3);


                              document.getElementById("divChart4").innerHTML ='<canvas id="cnvChart4"></canvas> ผลผลิตที่ 6.2';
                              let r4 = JSON.parse(this.response);
                              const centerText4 ={
                              id: 'centerText4',
                              beforeDraw(chart4,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart4;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r4.per62;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config4 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r4.p62,
                                backgroundColor: r4.color62

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText4]
                            };

                            // render init block
                            let chart4 =new Chart(document.getElementById("cnvChart4"),config4);

                            document.getElementById("divChart5").innerHTML ='<canvas id="cnvChart5"></canvas> ผลผลิตที่ 6.3';
                            let r5 = JSON.parse(this.response);
                            const centerText5 ={
                              id: 'centerText5',
                              beforeDraw(chart5,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart5;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r5.per63;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config5 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r5.p63,
                                backgroundColor: r5.color63

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText5]
                            };

                            // render init block
                            let chart5 =new Chart(document.getElementById("cnvChart5"),config5);

                            document.getElementById("divChart6").innerHTML ='<canvas id="cnvChart6"></canvas> ผลผลิตที่ 9.4';
                            let r6 = JSON.parse(this.response);
                            const centerText6 ={
                              id: 'centerText6',
                              beforeDraw(chart6,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart6;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r6.per94;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config6 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r6.p94,
                                backgroundColor: r6.color94

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText6]
                            };

                            // render init block
                            let chart6 =new Chart(document.getElementById("cnvChart6"),config6);

                            document.getElementById("divChart7").innerHTML ='<canvas id="cnvChart7"></canvas> ผลผลิตที่ 10.1';
                            let r7 = JSON.parse(this.response);
                            const centerText7 ={
                              id: 'centerText7',
                              beforeDraw(chart7,args,options){
                                const {ctx,chartArea:{left,right,top,bottom,width,height}} = chart7;
                                var fontSize = (height / 140).toFixed(2);
                                ctx.font =fontSize + "em sans-serif";
                                ctx.textBaseline = "middle";
                                var  text = r7.per101 ;
                                ctx.fillStyle ='black';
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;
                                ctx.fillText(text ,textX,textY);
                              }
                            }
                            // config 
                            const config7 = {
                              type: 'doughnut',
                              data:{
                              labels: ['เบิกจ่าย','งบประมาณ',],
                              datasets: [{
                                // label: 'Weekly Sales',
                                data: r7.p101,
                                backgroundColor: r7.color101,

                              }]
                            },
                              options: {
                                plugins: {
                                  legend: {
                                    display: false,
                                  }
                                }
                              },
                              plugins : [centerText7]
                            };

                            // render init block
                            let chart7 =new Chart(document.getElementById("cnvChart7"),config7);
                          }
                        }
                    }

              </script>
              
            </div>
                </div>
            </div>
            <!-- end card7--> 

            <div class="col-lg-6">
                <div class="card" >
                    <div class="card-body">
                       <h5 class="card-title">ประชุมเชิงฯ</h5>
                       <div class="row">
                          <div class="col-5">
                            <?php
                              $s_totalmeet ="SELECT count(*)as total FROM (SELECT tb_group.name_initials AS name ,tb_ref.n_activity AS n_activity,tb_plan2.quarter as q,tb_plan2.amont as m FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_ref.budget2 ='2.1 งบโครงการ ป.เชิงฯ' AND tb_plan2.amont != 0 GROUP BY name,tb_ref.activity,tb_ref.n_activity,q) as p;";
                              $total_meet = mysqli_query($conn, $s_totalmeet ) or die("Error Query [" . $s_totalmeet . "]");
                              while ($total = mysqli_fetch_array($total_meet)) {
                          
                                  $meet = number_format($total["total"]);
                              }
                              $s_totalb ="SELECT sum(amount) AS amount FROM (SELECT SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' UNION ALL SELECT SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref WHERE tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ') as a ;";
                              $total_b = mysqli_query($conn, $s_totalb ) or die("Error Query [" . $s_totalb . "]");
                              while ($total1 = mysqli_fetch_array($total_b)) {
                                  $plan =$total1["amount"];
                                  // $b = number_format($total1["amount"]);
                              }
                            ?>


                            <table class="table" style ="text-align:center;font-weight: bold;">
                            
                                <tr>
                                  <th scope="col" colspan="4" >จำนวนประชุมทั้งหมด</th>
                                </tr>
                                <tr>
                                  <th scope="col" colspan="4" style ="background-color:#FF77FF"><?php echo $meet ?></th>
                                </tr>
                                <tr>
                                  <td>Q1</td>
                                  <td>Q2</td>
                                  <td>Q3</td>
                                  <td>Q4</td>
                                </tr>
                                <?php
                                  $sql_q_meet ="SELECT q,COUNT(q) as count_p, CASE WHEN q = 'Q1' THEN '#ff66cc' WHEN q = 'Q2' THEN '#ff99dd' WHEN q = 'Q3' THEN '#ffb3e6' ELSE '#ffccee' END as color FROM (SELECT tb_group.name_initials AS name ,tb_ref.n_activity AS n_activity,tb_plan2.quarter as q,tb_plan2.amont as m FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_ref.budget2 ='2.1 งบโครงการ ป.เชิงฯ' AND tb_plan2.amont != 0 GROUP BY name,tb_ref.activity,tb_ref.n_activity,q) as p GROUP BY q;";
                                  $result = mysqli_query($conn, $sql_q_meet);
                                ?>
                            
                                <tr>
                                <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                                  <td style ="background-color:<?php echo $row["color"]; ?>"><?php echo $row["count_p"]; ?></td>
                                <?php 
                                  }
                                ?> 
                                </tr>
                                <?php
                                  $sql_c ="SELECT COUNT( CASE WHEN `quarter` = 'Q1' THEN 1 END) AS q1,COUNT( CASE WHEN `quarter` = 'Q2' THEN 1 END) AS q2, COUNT( CASE WHEN `quarter` = 'Q3' THEN 1 END) AS q3, COUNT( CASE WHEN `quarter` = 'Q4' THEN 1 END) AS q4 FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref WHERE tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' AND tb_adjust.type_adjust = 'อนุมัติโครงการ';";
                                  $result_c = mysqli_query($conn, $sql_c);
                                  while ($total1 = mysqli_fetch_array($result_c)) {
                                    $q1=$total1["q1"];
                                    $q2=$total1["q2"];
                                    $q3=$total1["q3"];
                                    $q4=$total1["q4"];
                                 }
                                 $sql_disbT ="SELECT COUNT( CASE WHEN `quarter` = 'Q1' THEN 1 END) AS q1, COUNT( CASE WHEN `quarter` = 'Q2' THEN 1 END) AS q2, COUNT( CASE WHEN `quarter` = 'Q3' THEN 1 END) AS q3, COUNT( CASE WHEN `quarter` = 'Q4' THEN 1 END) AS q4 ,SUM(tb_manage.amount) as total FROM tb_manage INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' AND tb_manage.type_buget = 'เบิกจ่าย';";
                                 $query_disbT = mysqli_query($conn,  $sql_disbT) or die("Error Query [" .$sql_disbT. "]");              
                                 foreach($query_disbT  as $disbT ){
                                    $total=$disbT["total"];
                                 }
                                  
                                ?>
                                <tr>
                                  <td style ="background-color:#ff66cc"><?php echo number_format($q1) ?></td>
                                  <td style ="background-color:#ff99dd;"><?php echo number_format($q2) ?></td>
                                  <td style ="background-color:#ffb3e6;"><?php echo number_format($q3) ?></td>
                                  <td style ="background-color:#ffccee;"><?php echo number_format($q4) ?></td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                          <div class="col-5">
                            <table class="table" style ="margin-left:0px;text-align:center;">
                            
                                  <tr>
                                    <th scope="col" colspan="2" >งบทั้งหมด</th>
                                    <th scope="col" colspan="2" >จำนวนที่จัดประชุม</th>
                                  </tr> 
                                  <tr>
                                    <th scope="col" colspan="2" style ="background-color:#B1AFFF;font-size:24px"><?php echo number_format($plan) ?></th>
                                    <th scope="col" colspan="2" style ="background-color:#B8E8FC;font-weight: bold;font-size: 26px;"><?php echo number_format($q1+$q2+$q3+$q4) ?></th>
                                  </tr>
                              
                                  <!-- <tr style ="font-size: 12.5px;">
                                    <td colspan="2">%ประชุม</td>
                           
                                    <td colspan="2">%เงิน</td>
                                 
                                  </tr> -->
                                  <tr >
                                    <td colspan="2" rowspan ="2" style ="background-color:#6AFB92">%เบิกจ่าย<br> <br><p style ="font-size: 28px;font-weight: bold;"><?php echo number_format(($total/$plan)*100, 2, '.', '')." "."%";?></p></td>
                           
                                    <td colspan="2" style ="background-color:#98FF98;color:black;font-weight: bold;">เบิกจ่าย <br> <?php echo number_format($total) ?></td>
                                 
                                  </tr>
                                  <tr>
                                    <td colspan="2" style ="background-color:#ffff80;color:black;font-weight: bold;">คงเหลือ <br> <?php echo number_format($plan-$total)  ?></td>
                                  </tr>
                                                             
                                </tbody>
                              </table>
                            
                          </div>
                          <div class="col-2">
                          
                            <div class="circle" style ="background:orange;text-align:center; font-size: 18px;color:#FFFF;margin-left:-12px;margin-top:30px;width: 120px;height: 120px;">
                             
                            </div>
                            <div style="margin-top:-100px;text-align:center;font-size: 18px;color:black;height: 12px;"> เป้าหมาย </div>
                            <div style="margin-top:15px;text-align:center;font-size: 26px;color:black;font-weight: bold;"> 50% </div>
                            
                          </div>
                       </div>
                      <?php
                        $sql_mgroup = "SELECT name as name_g ,COUNT(CASE WHEN name = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN name = 'กลุ่มนวัตกรรมฯ' THEN 1 WHEN name = 'กลุ่มยุทธ์ฯ' THEN 1 WHEN name = 'กลุ่มกฎหมายฯ' THEN 1 WHEN name = 'กลุ่มสิ่งแวดล้อมฯ' THEN 1 WHEN name = 'กลุ่มอาชีวอนามัยฯ' THEN 1 WHEN name = 'กลุ่มข้อมูลฯ' THEN 1 WHEN name = 'ศูนย์อ้างอิงฯ' THEN 1 WHEN name = 'ศูนย์ระยอง' THEN 1 END)AS count_meet,SUM(m) as amount FROM (SELECT tb_group.name_initials AS name ,tb_ref.n_activity AS n_activity,tb_plan2.quarter as q,tb_plan2.amont as m FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_ref.budget2 ='2.1 งบโครงการ ป.เชิงฯ' AND tb_plan2.amont != 0 GROUP BY name,tb_ref.activity,tb_ref.n_activity,q) as p GROUP BY name;";
                        $query_mgroup = mysqli_query($conn,  $sql_mgroup) or die("Error Query [" .$sql_mgroup. "]");              
                            foreach($query_mgroup  as $mr ){
                                $names_group[] =$mr['name_g'];
                                $counts[] =$mr['count_meet'];
                                $amounts[] =$mr['amount'];
                            }

                        $sql_disb = "SELECT group_name, disb FROM ( SELECT tb_group.name_initials AS group_name, sum(tb_manage.amount) AS disb FROM tb_manage INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group WHERE tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' AND tb_manage.type_buget = 'เบิกจ่าย' GROUP BY group_name UNION ALL SELECT name_initials AS group_name, 0 AS disb FROM tb_group ) AS a GROUP BY group_name;";
                        $query_disb = mysqli_query($conn,  $sql_disb) or die("Error Query [" .$sql_disb. "]");              
                        foreach($query_disb  as $disb ){
                          
                            $disbs[] =$disb['disb'];
                          
                        }
                        $sql_b2= "SELECT NAME , SUM(amount) AS amount FROM ( SELECT tb_group.name_initials AS NAME, SUM(tb_receive.amount) AS amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' GROUP BY NAME UNION ALL SELECT tb_group.name_initials AS NAME, SUM(tb_adjust.type3) - SUM(tb_adjust.type4) AS amount FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group WHERE tb_ref.budget2 = '2.1 งบโครงการ ป.เชิงฯ' GROUP BY NAME UNION ALL SELECT name_initials AS group_name, 0 AS disb FROM tb_group ) AS a GROUP BY NAME";
                        $query_b2 = mysqli_query($conn,  $sql_b2) or die("Error Query [" .$sql_b2. "]");              
                        foreach($query_b2  as $b2 ){
                            $b2_name[] =$b2['NAME'];
                            $b2_amount[] =$b2['amount'];
                          
                        }
                      
                     ?>

                       <div class="row">
                          <div class="col-4">
                          <canvas id="pieChart" style="max-height: 400px;"></canvas>
                          <div style="font-size: 14px;">
                              <i class="fa fa-circle " style="color: #FCE700"></i>กลุ่มนวัตกรรมฯ &nbsp;&nbsp;
                              <i class="fa fa-circle " style="color: #cc33ff"></i>กลุ่มข้อมูลฯ<br>  
                              <i class="fa fa-circle " style="color: #66ff99"></i>กลุ่มยุทธ์ฯ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <i class="fa fa-circle " style="color: rgb(255, 205, 86)"></i>กลุ่มสิ่งแวดล้อมฯ<br>
                              <i class="fa fa-circle " style="color: rgb(54, 162, 235)"></i>ศูนย์อ้างอิงฯ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <i class="fa fa-circle " style="color: #EA1B27"></i>กลุ่มชีวอนามัยฯ  <br> 
                              <i class="fa fa-circle " style="color: #66ffff"></i>กลุ่มกฎหมายฯ &nbsp;&nbsp;                                            
                              <i class="fa fa-circle " style="color: #FB6B90"></i>กลุ่มบริหารทั่วไป&nbsp;<br>
                              <i class="fa fa-circle " style="color: #00b57c"></i>ศูนย์ระยอง&nbsp;<br>

                             
                              <!-- <i class="fa fa-circle " style="color: rgb(255, 205, 86)"></i>กลุ่มสิ่งแวดล้อมฯ<br>
                              <i class="fa fa-circle " style="color: rgb(255, 99, 132)"></i>กลุ่มชีวอนามัยฯ -->

                          </div>
                            <script>
                              var chartE3 = document.getElementById("pieChart");
                              chartE3.height = 200;
                              document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#pieChart'), {
                                  type: 'pie',
                                  data: {
                                    labels:<?php echo json_encode($names_group)?>,
                                    datasets: [{
                                      label: 'My First Dataset',
                                      data: <?php echo json_encode($counts)?>,
                                      backgroundColor: [ 
                                        '#66ffff',
                                        '#cc33ff',
                                        '#FCE700',
                                        '#FB6B90',
                                        '#66ff99',
                                        'rgb(255, 205, 86)',
                                        '#EA1B27',
                                        'rgb(54, 162, 235)',
                                        '#00b57c'
                                        // 'rgb(255, 205, 86)',
                                      ],
                                      hoverOffset: 4
                                    }]
                                  },
                                  options: {
                              // scales: {
                              //   y: {
                              //     beginAtZero: true
                              //   }
                              // },
                                    plugins:{
                                         legend: {
                                            display: false
                                        },
                                        datalabels: {
                                          color: 'black',
                                          labels: {
                                            title: {
                                              font: {
                                                weight: 'bold',
                                                size : 16
                                              }
                                            },
                                          
                                          }
                                        }
                                 
                                      },
                                      
                                 },
                                 plugins:[ChartDataLabels]
                                  
                                });
                              });
                            </script>
                            <!-- End Pie CHart -->
                          </div>
                            <div class="col-8">
                             <div> 
                               <canvas id="ChartP" style="height: 150px;"></canvas>
                            </div>  
                             <script>
                          // setup 
                          var chartE2 = document.getElementById("ChartP");
                          chartE2.width= 225;
                          var dataP2 = {
                            labels: <?php echo json_encode($b2_name)?>,
                            datasets: [{
                              label: 'งบประมาณ',
                              data: <?php echo json_encode($b2_amount)?>, //4441900,  30805440  ,  41769375 
                              backgroundColor:['#0000FF'],
                              borderColor: ['#0000FF'],
                              borderWidth: 1
                            },{
                              label: 'เบิกจ่าย',
                              data: <?php echo json_encode($disbs)?>,
                              backgroundColor: [ '#49b76e'],
                              borderColor: ['#49b76e'],
                              borderWidth: 1
                            }]
                          };

                          var customDataLabelsP2 ={
                              id: 'customDataLabelsP2',
                              afterDatasetsDraw(chart,args,pluginOptions){
                              var {ctx,chartArea:{left,right,top,bottom,width,height},scales:{x,y}} = chart;
                              var datasetArray =dataP2.datasets[1].data.map((datapoint,index) => {
                                  if(datapoint > dataP2.datasets[1].data[index]){
                                  return 0;
                                  }
                                  else {
                                  return 1;
                                  }

                              })
                              var diffArray =dataP2.datasets[0].data.map((datapoint,index) => {
                                  var cal =(dataP2.datasets[1].data[index]/datapoint)*100 ;
                                  return cal.toFixed(2)+"%";
                              })

                              console.log(datasetArray);
                              console.log(diffArray );
                              diffArray.forEach((value,index)=>{
                                  ctx.font = "bold 10px em sans-serif";
                                  ctx.fillStyle ='black';
                                  ctx.textAlign ="center";
                                  ctx.fillText(value,x.getPixelForValue(index)+15,chart.getDatasetMeta(datasetArray[0]).data[index].y-10);

                                  // ctx.font = "bold 12px FontAwesome";
                                  // ctx.fillText('X',x.getPixelForValue(index)+25,chart.getDatasetMeta(datasetArray[2]).data[index].y-10);
                              
                              
                              })
                              ctx.save();
                              
                              }
                          }

                          // config 
                          var configP20 = {
                            type: 'bar',
                            data:dataP2,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              },
                              plugins:{
                                  legend:{
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        
                                      }
                                    
                                  }
                                }
                            },
                            plugins:[customDataLabelsP2]
                          };

                          // render init block
                          var myChartP20 = new Chart(document.getElementById('ChartP'),configP20);
                          // myChartP20.canvas.parentNode.style.width = '475px';
                          // myChartP20.canvas.parentNode.style.height = '10px';
                          // var chartE2 = document.getElementById("ChartP");
                          // chartE2.height = 10;
                          </script>      
                          </div>

                          </div>
                       </div>
                   

                    </div>
                </div>
            </div> 
            <!-- end card3 -->

            
            
       </div>  <!-- end row -->

    <script>
        $(document).ready(function(){

            $('.hover').tooltip({
                title: fetchData,
                html: true,
                placement: 'right'
            });

            function fetchData(){
                var fetch_data = '';
                var element = $(this);
                var id = element.attr("id");
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    async: false,
                    data:{id:id},
                    success:function(data){
                    fetch_data = data;
                    }
                });   
                return fetch_data;
            }
        });
           
        $(document).ready(function(){

            $('.hover1').tooltip({
                title: fetchData,
                html: true,
                placement: 'right'
            });

            function fetchData(){
                var fetch_data = '';
                var element = $(this);
                var id1 = element.attr("id");
                 $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    async: false,
                    data:{id1:id1},
                    success:function(data){
                    fetch_data = data;
                    }
                });   
            return fetch_data;
            }
        });
        
        $(document).ready(function(){

            $('.hover2').tooltip({
                title: fetchData,
                html: true,
                placement: 'right'
            });

            function fetchData(){
                var fetch_data = '';
                var element = $(this);
                var d2 = element.attr("id");
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    async: false,
                    data:{d2:d2},
                    success:function(data){
                        fetch_data = data;
                    }
                });   
                return fetch_data;
            }
        });
        $(document).ready(function(){

        $('.hover3').tooltip({
            title: fetchData,
            html: true,
            placement: 'right'
        });

        function fetchData(){
            var fetch_data = '';
            var element = $(this);
            var d3 = element.attr("id");
            $.ajax({
                url:"fetch.php",
                method:"POST",
                async: false,
                data:{d3:d3},
                success:function(data){
                    fetch_data = data;
                }
            });   
            return fetch_data;
        }
        });
    </script>   
</script>

<?php include "../include/footer.php"; ?>