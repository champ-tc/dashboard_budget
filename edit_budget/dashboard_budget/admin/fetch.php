<?php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "Env044!@#", "budget_envocc");
 mysqli_set_charset($connect,'UTF8');
 $query = "SELECT * FROM tb_investment WHERE overall ='เขียว' AND type ='".$_POST["id"]."'";
 $result = mysqli_query($connect, $query);
 $i=1 ;
 $output = '<div ">';
while($row = mysqli_fetch_array($result)){
    $list = $row['list'];
    $quantity = $row['quantity'];
    $budget = $row['budget'];
    $procurement = $row['procurement'];
    $group = $row['id_group'];

    $output .= "<span class='head'>".$i.". </span><span>".$list."&emsp;".$quantity."<br/>";
    $output.= "&emsp;<span class='head'>กลุ่ม : </span><span>".$group."</span> &emsp;<span class='head'>งบประมาณ :&nbsp;".number_format($budget)."</span>&emsp;<span>จัดซื้อ :&nbsp;".number_format($procurement)." บาท</span><br/>";
    // $output.= "<span class='head'>งบประมาณ : ".number_format($budget)."</span> <span>  </span> <span>จัดซื้อ :".number_format($procurement)." บาท</span><br/>";

    $output.= "&emsp;<span class='head'>สถานะ : ส่งเบิก</span><br/>";
 $i++;
}
$output .= '</div>
';
 echo $output;
}


if(isset($_POST["id1"]))
{
 $connect = mysqli_connect("localhost", "root", "Env044!@#", "budget_envocc");
 mysqli_set_charset($connect ,'UTF8');
 $query = "SELECT * FROM tb_investment WHERE overall ='แดง' AND type ='".$_POST["id1"]."'";
 $result = mysqli_query($connect, $query);
 $i=1 ;
 $output = '<div ">';
 while($row = mysqli_fetch_array($result)){
    $list = $row['list'];
    $quantity = $row['quantity'];
    $budget = $row['budget'];
    $procurement = $row['procurement'];
    $group = $row['id_group'];

    $output .= "<span class='head'>".$i.". </span><span>".$list."&emsp;".$quantity."<br/>";
    $output.= "&emsp;<span class='head'>กลุ่ม : </span><span>".$group."</span> &emsp;<span class='head'>งบประมาณ :&nbsp;".number_format($budget)."</span>&emsp;<span>จัดซื้อ :&nbsp;".number_format($procurement)." บาท</span><br/>";
    // $output.= "<span class='head'>งบประมาณ : ".number_format($budget)."</span> <span>  </span> <span>จัดซื้อ :".number_format($procurement)." บาท</span><br/>";

    $output.= "&emsp;<span class='head'>สถานะ : </span><br/>";
 $i++;
}
$output .= '</div>
';
 echo $output;
}

if(isset($_POST["d2"]))
{
 $connect = mysqli_connect("localhost", "root", "Env044!@#", "budget_envocc");
 mysqli_set_charset($connect,'UTF8');

 $query = "SELECT * FROM tb_investment WHERE overall ='ส้ม' AND type ='".$_POST["d2"]."'";
 $result = mysqli_query($connect, $query);
 $i=1 ;
 $output = '<div ">';
 while($row = mysqli_fetch_array($result)){
    $list = $row['list'];
    $quantity = $row['quantity'];
    $budget = $row['budget'];
    $procurement = $row['procurement'];
    $group = $row['id_group'];

    $output .= "<span class='head'>".$i.". </span><span>".$list."&emsp;".$quantity."<br/>";
    $output.= "&emsp;<span class='head'>กลุ่ม : </span><span>".$group."</span> &emsp;<span class='head'>งบประมาณ :&nbsp;".number_format($budget)."</span>&emsp;<span>จัดซื้อ :&nbsp;".number_format($procurement)." บาท</span><br/>";
    // $output.= "<span class='head'>งบประมาณ : ".number_format($budget)."</span> <span>  </span> <span>จัดซื้อ :".number_format($procurement)." บาท</span><br/>";

    $output.= "&emsp;<span class='head'>สถานะ : </span><br/>";
 $i++;
}
$output .= '</div>
';
 echo $output;
}
if(isset($_POST["d3"]))
{
 $connect = mysqli_connect("localhost", "root", "Env044!@#", "budget_envocc");
 mysqli_set_charset($connect,'UTF8');
 $query = "SELECT * FROM tb_investment WHERE overall ='เหลือง' AND type ='".$_POST["d3"]."'";
 $result = mysqli_query($connect, $query);
 $i=1 ;
 $output = '<div ">';
while($row = mysqli_fetch_array($result)){
    $list = $row['list'];
    $quantity = $row['quantity'];
    $budget = $row['budget'];
    $procurement = $row['procurement'];
    $group = $row['id_group'];

    $output .= "<span class='head'>".$i.". </span><span>".$list."&emsp;".$quantity."<br/>";
    $output.= "&emsp;<span class='head'>กลุ่ม : </span><span>".$group."</span> &emsp;<span class='head'>งบประมาณ :&nbsp;".number_format($budget)."</span>&emsp;<span>จัดซื้อ :&nbsp;".number_format($procurement)." บาท</span><br/>";
    // $output.= "<span class='head'>งบประมาณ : ".number_format($budget)."</span> <span>  </span> <span>จัดซื้อ :".number_format($procurement)." บาท</span><br/>";

    $output.= "&emsp;<span class='head'>สถานะ : PO</span><br/>";
 $i++;
}
$output .= '</div>
';
 echo $output;
}
?>
