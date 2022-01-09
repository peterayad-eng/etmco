<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}

    require_once "session.php";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
		
    $id = $_POST['id'];
    $model = test_input($_POST['model']);
    $category = test_input($_POST['category']);
    $func = $_POST['func'];
    $warrenty = test_input($_POST['warrenty']);
    $warrentyperiod = test_input($_POST['warrentyperiod']);
    $desc = nl2br(test_input($_POST['desc']));
    $descar = nl2br(test_input($_POST['descar']));
    $repeatflag=0;

    //fuctions code generator
    $function='';
    if(in_array('Print', $func)){
        $function = $function.'1';
    }else{
        $function = $function.'0';
    }

    if(in_array('Copy', $func)){
        $function = $function.'1';
    }else{
        $function = $function.'0';
    }

    if(in_array('Scan', $func)){
        $function = $function.'1';
    }else{
        $function = $function.'0';
    }

    if(in_array('Fax', $func)){
        $function = $function.'1';
    }else{
        $function = $function.'0';
    }

    require_once "../connect.php";	
    $connec = new con();

    $select_sql = $connec->query('SELECT * FROM printers')->fetchAll();
    foreach($select_sql as $printer){
        if($model == $printer['model']){
            if($id != $printer['id']){
                $repeatflag=$repeatflag+1;
            }
        }
    }

    if($repeatflag == 0){
        $update_sql = $connec->query('UPDATE printers SET category = ?, model = ?, functions = ?, description = ?, description_ar = ?, warrenty = ?, warrenty_period = ? WHERE id = ?', $category, $model, $function, $desc, $descar, $warrenty, $warrentyperiod, $id);
        $connec->close();
        $log = "2351\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe printer: '".$model."' with an id: '".$id."' data is updated successfully \n";
        file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        header("location: index?editDerror=0");
        exit;
    }else{
        $connec->close();
        $log = "3351\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe printer: '".$model."' with an id: '".$id."' data could not be updated because the targeted model is already exist \n";
        file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        header("location: printersEditData?editDerror=2&id=$id");
        exit;
    }
?>