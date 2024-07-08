<?php
	// $mysqli = new MySQLi("localhost","root","","budget_envocc");
	$mysqli = new MySQLi("localhost","root","Env044!@#","budget_envocc");
	if($mysqli->connect_errno) echo "failed";
    $mysqli -> set_charset('UTF8');
	isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";

	// $personnel ="";
	// $month ="";

	$getData = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
                INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 1.1' AND tb_group.name_group = '$department' 
                GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows =$mysqli->query($getData);
	$rowcount = $rows->num_rows;
	if($rowcount == 0){	
			$p11[] = 1 ;		
	}

	elseif($rowcount >0){
		while($r = $rows->fetch_assoc()){
			$p11[] = $r["d"];
		}
	}
    $getData2 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
                SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
                INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 1.1'
                AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
                UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
                FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
                WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 1.1' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows2 =$mysqli->query($getData2);
	$rowcount2 = $rows2->num_rows;
	if($rowcount2 == 0){	
		$p11[] = 1 ;
	
    }
    elseif($rowcount2 >0){
		while($r2 = $rows2->fetch_assoc()){
			// $name[] = $r2["produce"];
			$p11[] = $r2["amount"];
			
		}
	}

	if($p11[0]==1 && $p11[1]==1 ){
		$color[] = '#C8C8C8';
		$color[] = '#C8C8C8';
		$per = "0%";
	}else{
		$cal = ($p11[0]/$p11[1])*100;
		$per = number_format((float)$cal, 2, '.', '');
        $per = $per." "."%";
		$color[] = '#00FF00';
		$color[] = '#0000FF';
	}

	
	
	//  ผ.2.2
    isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data22 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
                INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 2.2' AND tb_group.name_group = '$department' 
                GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows22 =$mysqli->query($Data22);
	$rowcount22 = $rows22->num_rows;
	if($rowcount22 == 0){	
			$p22[] = 1 ;		
	}

	elseif($rowcount22 >0){
		while($r22 = $rows22->fetch_assoc()){
			$p22[] = $r22["d"];
		}
	}

	$getData222 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 2.2'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 2.2' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows222 =$mysqli->query($getData222);
	$rowcount222 = $rows222->num_rows;
	if($rowcount222 == 0){	
		$p22[] = 1 ;

	}
	elseif($rowcount222 >0){
		while($r222 = $rows222->fetch_assoc()){
		// $name[] = $r2["produce"];
		$p22[] = $r222["amount"];

		}
	}

	if($p22[0]==1 && $p22[1]==1 ){
		$color22[] = '#C8C8C8';
		$color22[] = '#C8C8C8';
		$per22 = "0%";
	}else{
		$cal22 = ($p22[0]/$p22[1])*100;
		$per22 = number_format((float)$cal22, 2, '.', '');
        $per22 = $per22." "."%";
		$color22[] = '#00FF00';
		$color22[] = '#0000FF';
	}

	//  ผ.6.1
    isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data61 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
                INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 6.1' AND tb_group.name_group = '$department' 
                GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows61 =$mysqli->query($Data61);
	$rowcount61 = $rows61->num_rows;
	if($rowcount61 == 0){	
			$p61[] = 1 ;		
	}

	elseif($rowcount61 >0){
		while($r61 = $rows61->fetch_assoc()){
			$p61[] = $r61["d"];
		}
	}

	$getData612 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 6.1'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 6.1' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows612 =$mysqli->query($getData612);
	$rowcount612 = $rows612->num_rows;
	if($rowcount612 == 0){	
		$p61[] = 1 ;

	}
	elseif($rowcount612 >0){
		while($r612 = $rows612->fetch_assoc()){
		// $name[] = $r2["produce"];
		$p61[] = $r612["amount"];

		}
	}

	if($p61[0]==1 && $p61[1]==1 ){
		$color61[] = '#C8C8C8';
		$color61[] = '#C8C8C8';
		$per61 = "0%";
	}else{
		$cal61 = ($p61[0]/$p61[1])*100;
		$per61 = number_format((float)$cal61, 2, '.', '');
        $per61 = $per61." "."%";
		$color61[] = '#00FF00';
		$color61[] = '#0000FF';
	}

	//  ผ.6.2
	isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data62 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
				INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 6.2' AND tb_group.name_group = '$department' 
				GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows62 =$mysqli->query($Data62);
	$rowcount62 = $rows62->num_rows;
	if($rowcount62 == 0){	
			$p62[] = 1 ;		
	}

	elseif($rowcount62 >0){
		while($r62 = $rows62->fetch_assoc()){
			if($r62["d"]== 0){
				$p62[] = 1;
			}
			else {
				$p62[] = $r62["d"];
			}	
		}
	}

	$getData622 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 6.2'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 6.2' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows622 =$mysqli->query($getData622);
	$rowcount622 = $rows622->num_rows;
	if($rowcount622 == 0){	
		$p62[] = 1 ;

	}
	elseif($rowcount622 >0){
		while($r622 = $rows622->fetch_assoc()){
			if($r622["amount"] == 0){
				$p62[] = 1 ;
			}	
			// $name[] = $r2["produce"];
			else{
				$p62[] = $r622["amount"];

			}
		}
	}

	if($p62[0]==1 && $p62[1]==1 ){
		$color62[] = '#C8C8C8';
		$color62[] = '#C8C8C8';
		$per62 = "0%";
	}else{
		$cal62 = ($p62[0]/$p62[1])*100;
		$per62= number_format((float)$cal62, 2, '.', '');
        $per62 = $per62." "."%";
		$color62[] = '#00FF00';
		$color62[] = '#0000FF';
	}


	//  ผ.6.3
	isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data63 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
			   INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 6.3' AND tb_group.name_group = '$department' 
			   GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows63 =$mysqli->query($Data63);
	$rowcount63 = $rows63->num_rows;
	if($rowcount63 == 0){	
			$p63[] = 1 ;		
	}

	elseif($rowcount63 >0){
		while($r63 = $rows63->fetch_assoc()){
			$p63[] = $r63["d"];
		}
	}

	$getData632 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 6.3'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 6.3' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows632 =$mysqli->query($getData632);
	$rowcount632 = $rows632->num_rows;
	if($rowcount632 == 0){	
		$p63[] = 1 ;

	}
	elseif($rowcount632 >0){
		while($r632 = $rows632->fetch_assoc()){
			if($r632["amount"] == 0){
				$p63[] = 1 ;
			}	
		// $name[] = $r2["produce"];
		    else {
				$p63[] = $r632["amount"];
			}	
		}
	}

	if($p63[0]==1 && $p63[1]==1 ){
		$color63[] = '#C8C8C8';
		$color63[] = '#C8C8C8';
		$per63 = "0%";
	}else{
		$cal63 = ($p63[0]/$p63[1])*100;
		$per63 = number_format((float)$cal63, 2, '.', '');
        $per63 = $per63." "."%";
		$color63[] = '#00FF00';
		$color63[] = '#0000FF';
	}


	//  ผ.9.4
	isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data94 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
				INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 9.4' AND tb_group.name_group = '$department' 
				GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows94 =$mysqli->query($Data94);
	$rowcount94 = $rows94->num_rows;
	if($rowcount94 == 0){	
			$p94[] = 1 ;		
	}

	elseif($rowcount94 >0){
		while($r94 = $rows94->fetch_assoc()){
			$p94[] = $r94["d"];
		}
	}

	$getData942 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 9.4'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 9.4' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows942 =$mysqli->query($getData942);
	$rowcount942 = $rows942->num_rows;
	if($rowcount942 == 0){	
		$p94[] = 1 ;

	}
	elseif($rowcount942 >0){
		while($r942 = $rows942->fetch_assoc()){
			if($r942["amount"] == 0){
				$p94[] = 1 ;
			}
		// $name[] = $r2["produce"];
		    else {
				$p94[] = $r942["amount"];
			}
		}
	}

	if($p94[0]==1 && $p94[1]==1 ){
		$color94[] = '#C8C8C8';
		$color94[] = '#C8C8C8';
		$per94 = "0%";
	}else{
		$color94[] = '#00FF00';
		$color94[] = '#0000FF';
		$cal94 = ($p94[0]/$p94[1])*100;
		$per94 = number_format((float)$cal94, 2, '.', '');
        $per94 = $per94." "."%";
	}

	//  ผ.10.1
	isset($_POST["department"]) ? $department = $_POST["department"] : $department ="";
	$Data101 = "SELECT tb_group.name_group as name_group,tb_ref.produce as p ,SUM(tb_manage.amount)as d FROM tb_manage INNER JOIN tb_group ON tb_manage.id_group = tb_group.id_group 
				INNER JOIN tb_ref ON tb_manage.id_ref = tb_ref.id_ref WHERE tb_manage.type_buget ='เบิกจ่าย' AND tb_ref.produce ='ผลผลิตที่ 10.1' AND tb_group.name_group = '$department' 
				GROUP BY tb_group.name_group ,tb_ref.produce;";
	$rows101 =$mysqli->query($Data101);
	$rowcount101 = $rows101->num_rows;
	if($rowcount101 == 0){	
			$p101[] = 1 ;		
	}

	elseif($rowcount101 >0){
		while($r101 = $rows101->fetch_assoc()){
			$p101[] = $r101["d"];
		}
	}

	$getData1012 = "SELECT name_group , produce,sum(amount) AS amount FROM(SELECT tb_group.name_group as name_group ,tb_ref.produce as produce, 
		SUM(tb_receive.amount) as amount FROM tb_receive INNER JOIN tb_ref ON tb_receive.id_ref = tb_ref.id_ref 
		INNER JOIN tb_group ON tb_receive.id_group = tb_group.id_group WHERE tb_receive.type_budget != 'งบตามแผน' AND tb_ref.produce ='ผลผลิตที่ 10.1'
		AND tb_group.name_group = '$department'  GROUP BY tb_group.name_group ,tb_ref.produce 
		UNION ALL SELECT tb_group.name_group as name_group,tb_ref.produce as produce,SUM(tb_adjust.type3)-SUM(tb_adjust.type4) AS amount 
		FROM tb_adjust INNER JOIN tb_ref ON tb_adjust.id_ref = tb_ref.id_ref INNER JOIN tb_group ON tb_adjust.id_group = tb_group.id_group 
		WHERE tb_group.name_group = '$department' AND tb_ref.produce ='ผลผลิตที่ 10.1' GROUP BY tb_group.name_group ,tb_ref.produce) as a GROUP BY name_group,produce;";
	$rows1012 =$mysqli->query($getData1012);
	$rowcount1012 = $rows1012->num_rows;
	if($rowcount1012 == 0){	
		$p101[] = 1 ;

	}
	elseif($rowcount1012 >0){
		while($r1012 = $rows1012->fetch_assoc()){
		// $name[] = $r2["produce"];
		$p101[] = $r1012["amount"];

		}
	}

	if($p101[0]==1 && $p101[1]==1 ){
		$color101[] = '#C8C8C8';
		$color101[] = '#C8C8C8';
		$per101 = "0%";
	}else{
		$cal101 = ($p101[0]/$p101[1])*100;
		$per101 = number_format((float)$cal101, 2, '.', '');
        $per101 = $per101." "."%";
		$color101[] = '#00FF00';
		$color101[] = '#0000FF';
	}




	










  
	echo json_encode(
		array(
	
			"p11" => $p11,
			"color" => $color,
			"per"=>$per,
			"p22" => $p22,
			"color22" => $color22,
			"per22"=>$per22,
			"p61" => $p61,
			"color61" => $color61,
			"per61"=>$per61,
			"p62" => $p62,
			"color62" => $color62,
			"per62"=>$per62,
			"p63" => $p63,
			"color63" => $color63,
			"per63"=>$per63,
			"p94" => $p94,
			"color94" => $color94,
			"per94"=>$per94,
			"p101" => $p101,
			"color101" => $color101,
			"per101"=>$per101,
			
		)
	);
?>