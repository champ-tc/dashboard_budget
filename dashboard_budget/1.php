<?php


//ตามแผน
$sql_p1 ="SELECT tb_group.name_initials as name_initials,SUM(tb_plan2.amont)as amount,tb_plan2.quarter , CASE WHEN tb_group.name_initials = 'กลุ่มบริหารทั่วไป' THEN 1 WHEN tb_group.name_initials = 'กลุ่มนวัตกรรมฯ' THEN 2 WHEN tb_group.name_initials = 'กลุ่มยุทธ์ฯ' THEN 3 WHEN tb_group.name_initials = 'กลุ่มอาชีวอนามัยฯ' THEN 4 WHEN tb_group.name_initials = 'กลุ่มกฎหมายฯ' THEN 5 WHEN tb_group.name_initials = 'กลุ่มข้อมูลฯ' THEN 6 WHEN tb_group.name_initials = 'กลุ่มสิ่งแวดล้อมฯ' THEN 7 WHEN tb_group.name_initials = 'ศูนย์อ้างอิงฯ' THEN 8 WHEN tb_group.name_initials = 'ศูนย์ระยอง' THEN 9 END AS n FROM tb_plan2 INNER JOIN tb_ref ON tb_plan2.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_plan2.id_group = tb_group.id_group WHERE tb_plan2.quarter ='Q1' GROUP BY name_initials,quarter ORDER BY n ASC;";
$query_pq1 = mysqli_query($conn,  $sql_p1) or die("Error Query [" .  $sql_p1. "]");              
foreach($query_pq1  as $pq1  ){
    $spq1[] =$pq1['amount'];
}


$sql_p1 ="SELECT CASE WHEN produce = 'ผลผลิตที่ 1.1' THEN 1 WHEN produce = 'ผลผลิตที่ 2.2' THEN 2 WHEN produce = 'ผลผลิตที่ 6.1' THEN 3 WHEN produce = 'ผลผลิตที่ 6.3' THEN 4 WHEN produce = 'ผลผลิตที่ 9.4' THEN 5 WHEN produce = 'ผลผลิตที่ 10.1' THEN 6 END as p,produce ,type_buget,sum(disburse) AS amount FROM (SELECT DISTINCT `produce` as produce ,'เบิกจ่าย' as type_buget ,0 as disburse FROM `tb_ref` UNION ALL SELECT `tb_ref`.`produce` as produce , `tb_plan2`.`type_buget` as type_buget, SUM(`tb_plan2`.`amount`) AS disburse FROM tb_plan2 INNER JOIN tb_ref ON `tb_plan2`.`id_ref` = `tb_ref`.`id_ref` WHERE `tb_plan2`.`type_buget` ='เบิกจ่าย' AND `tb_plan2`.`quarter` = 'Q1' GROUP BY `tb_ref`.`produce` , `tb_manage`.`type_buget`) as a GROUP BY produce ORDER BY `p` ASC";
$query = mysqli_query($conn, $sql_dq1) or die("Error Query [" . $sql_dq1 . "]");
foreach($query as $data){
$dq1[] =$data['amount'];
}


?>