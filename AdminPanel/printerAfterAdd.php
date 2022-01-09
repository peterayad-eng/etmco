<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}

    require_once "session.php";

    $fileExtensions=['jpeg','jpg','png','webp'];
	$fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName  = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $tmp = explode('.', $fileName);
    $fileExtension = strtolower(end($tmp));


		
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
		
    define("SIZE", 5242880);
    $model = test_input($_POST['model']);
    $category = test_input($_POST['category']);
    $func = $_POST['func'];
    $warrenty = test_input($_POST['warrenty']);
    $warrentyperiod = test_input($_POST['warrentyperiod']);
    $desc = nl2br(test_input($_POST['desc']));
    $descar = nl2br(test_input($_POST['descar']));
    $counter = 0;
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

    $rows = $connec->query('SELECT * FROM printers')->numRows();
    if($rows==0){
        $Addedid = 0;
    }else{
        $last_row = $connec->query('SELECT * FROM printers ORDER BY id DESC LIMIT 1')->fetchArray();
        $Addedid = $last_row['id'] + 1;
    }

    $select_sql = $connec->query('SELECT * FROM printers')->fetchAll();
    foreach($select_sql as $printer){
            if($model == $printer['model']){
                $repeatflag=$repeatflag+1;
            }
    }
    
    if($repeatflag == 0){
        if(array_key_exists('image', $_FILES)){
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                if($fileSize>SIZE){
                    $connec->close();
                    $log = "3321\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has tried to add a printer with an oversized Image: '".$fileName."', and Image size: '".$fileSize."' \n";
                    file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
                    header("location: printersAdd?editLerror=2");
                    exit;
                }
                    
                if (in_array($fileExtension,$fileExtensions)){
                    $imageName = basename($fileName);
                    
                    do{
                        $editflag=0;
                        foreach($select_sql as $printer){
                            if ($imageName == $printer['image']){
                                $imageName = "a".$imageName;
                                $editflag=1;
                            }
                        }
                    }while(editflag==1);
                        
                    $sitepath= "Images/".$imageName;
                    $uploadpath= "../Images/".$imageName;
                    $upload= move_uploaded_file($fileTmpName, $uploadpath);
                    $insert_sql = $connec->query('INSERT INTO printers (id, category, model, functions, image, description, description_ar, warrenty, warrenty_period) VALUES (?,?,?,?,?,?,?,?,?)', $Addedid, $category, $model, $function, $imageName, $desc, $descar, $warrenty, $warrentyperiod);
                    $connec->close();
                    $log = "2301\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has added a printer: '".$model."' with an id: '".$Addedid."' successfully \n";
                    file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
                    header("location: index?adderror=0");
                    exit;
                }else{
                    $connec->close();
                    $log = "3322\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has tried to add a printer with Image: '".$fileName."' that has an unallowed extension, and Image size: '".$fileSize."' \n";
                    file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
                    header("location: printersAdd?editLerror=3");
                    exit;
                }
            } else {
                $connec->close();
                $log = "3323\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has tried to add a printer but Image: '".$fileName."' with size: '".$fileSize."' could not be uploaded \n";
                file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
                header("location:  printersAdd?adderror=1");
                exit;
            }
        }
    }else{
        $connec->close();
        $log = "3301\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has tried to add a printer: '".$model."' that is already exist \n";
        file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        header("location:  printersAdd?adderror=2");
        exit;
    }
?>