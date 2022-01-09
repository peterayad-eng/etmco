<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}

    require_once "session.php";

    $deletedid = $_GET['id'];

    require_once "../connect.php";	
    $connec = new con();

    $select_sql = $connec->query('SELECT * FROM printers WHERE id = ?', $deletedid)->fetchArray();
    $url=$select_sql['image'];
    $deleted_model=$select_sql['model'];
    $url="../Images/".$url;
        
    $delete_sql = $connec->query('DELETE FROM printers WHERE id = ?', $deletedid);
    unlink($url);
    $select_sql = $connec->query('SELECT * FROM printers')->fetchAll();
    $count_sql = $connec->query('SELECT * FROM printers')->numRows();
    for($i=0;$i<$count_sql;$i++){
        $newid=$i+1;
        $model=$select_sql[$i]['model'];
        $update_sql = $connec->query('UPDATE printers SET id = ? WHERE model = ?', $newid, $model);
    }
    $connec->close();
    $log = "2302\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe printer: '".$deleted_model."' with an id: '".$deletedid."' is deleted successfully \n";
    file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
    header("location: index?deleteerror=0");
    exit;
?>