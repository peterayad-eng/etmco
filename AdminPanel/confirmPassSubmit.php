<?php

    session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}

    require_once "session.php";
	require_once "../connect.php";	

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
		
    define("TIME", 1800);
    $currenttime = date('Y-m-d H:i:s');
    $user = $_SESSION['user'];
    $password = test_input($_POST['pass']);
    $id = $_POST['id'];
    $flag = $_POST['flag'];
    $ip = $_POST['ip'];

    $connec = new con();
		
    $select_sql = $connec->query('SELECT * FROM users WHERE user = ?', $user)->fetchArray();
    $usertime = $select_sql['timestamp'];
    $userattempt = $select_sql['attempts'];
    $timesubuser = strtotime($currenttime) - strtotime($usertime);

    if(password_verify( $password, $select_sql['pass'])){
        if($userattempt > 4 && $timesubuser < TIME){
            $connec->close();
            $log = "3242\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has confirmed his password but after more than 5 attempts while changing the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: confirmPass?error=2&id=$id");
            exit;
        }else{
            $userattempt = 0;
            $update_sql = $connec->query('UPDATE users SET timestamp = ?, attempts = ? WHERE user = ?', $currenttime, $userattempt, $user);
            $connec->close();
            $log = "2241\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has confirmed his password successfully to change the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: userEditPass?id=$id");
            exit;
        }
    }else{
        if($userattempt > 4 && $timesubuser < TIME){
            $connec->close();
            $log = "4243\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to confirm his password: '".$password."', and the number of attempts has exceeded the limit while changing the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: confirmPass?error=2&id=$id");
            exit;
        }elseif ($userattempt > 4 && $timesubuser > TIME){
            $userattempt = 1;
            $update_sql = $connec->query('UPDATE users SET timestamp = ?, attempts = ? WHERE user = ?', $currenttime, $userattempt, $user);
            $connec->close();
            $log = "4244\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to confirm password: '".$password."' after the ban time is over while changing the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: confirmPass?error=1&id=$id");
            exit;
        }elseif ($userattempt <= 4 && $timesubuser > TIME){
            $userattempt = 1;
            $update_sql = $connec->query('UPDATE users SET timestamp = ?, attempts = ? WHERE user = ?', $currenttime, $userattempt, $user);
            $connec->close();
            $log = "4241\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to confirm password: '".$password."' while changing the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: confirmPass?error=1&id=$id");
            exit;
        }else{
            $userattempt = $userattempt + 1;
            $update_sql = $connec->query('UPDATE users SET timestamp = ?, attempts = ? WHERE user = ?', $currenttime, $userattempt, $user);
            $connec->close();
            $log = "4242\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$user." \tThe user has failed to confirm password: '".$password."'and the number of attempts is ".$userattempt." while changing the password for the user that has an id: '".$id."' \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            header("location: confirmPass?error=1&id=$id");
            exit;
        }
    }
?>