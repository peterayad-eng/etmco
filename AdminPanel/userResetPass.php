<?php

    session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}

    require_once "session.php";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $password = test_input($_POST['pass']);
    $cpassword = test_input($_POST['cpass']);
    $ip = $_POST['ip'];
    $user = $_SESSION['user'];
    $id = $_POST['id'];

    if ($password == $cpassword){
        if(strlen($password)<8){
            $log = "3262\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to reset the password while changing the password for the user that has an id: '".$id."' because the password does not meet the complexity \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: userEditPass?editPerror=1&id=$id");
            exit;
        }else{
            require_once "../connect.php";	
            
            $pass = password_hash($password, PASSWORD_DEFAULT);

            $connec = new con();
            $update_sql = $connec->query('UPDATE users SET pass = ? WHERE id = ?', $pass, $id);
            $connec->close();
            $log = "2261\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe password has been reset successfully for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: users?editPerror=0");
            exit;
        }
    }else{
        $log = "3261\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to reset the password while changing the password for the user that has an id: '".$id."' because the confirm password did not match \n";
        file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        header("location: userEditPass?editPerror=2&id=$id");
        exit;
    }
