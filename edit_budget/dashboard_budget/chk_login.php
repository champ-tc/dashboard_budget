<?php 
    session_start();
        if(isset($_POST['user'])){
            include("include/database_connection.php");

            $user = $_POST['user'];
            $pass = sha1($_POST['pass']);

            $stmt = $connect->prepare("SELECT * FROM tb_admin WHERE admin_user = :admin_user AND admin_pass = :admin_pass");
            $stmt->bindParam(':admin_user', $user , PDO::PARAM_STR);
            $stmt->bindParam(':admin_pass', $pass , PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION["UserID"] = $row["admin_user"];
                $_SESSION["User_level"] = $row["admin_level"];
                if($_SESSION["User_level"]=="1"){
                    Header("Location: admin/dashboard.php");
                } 
                if ($_SESSION["User_level"]=="2"){
                    Header("Location: employee/index.php");
                }
            }else{
                echo "<script>";
                    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                    echo "window.history.back()";
                echo "</script>";
            }
        }else{
            Header("Location: login.php"); 
        }
?>

             