<?php

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $lang = $_POST['lang'];
    $ip = $_POST['ip'];

    if(!isset($_POST['sq']) || empty($_POST['sq'])){
        $log = "3103\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \tSomeone has tried to search with an empty query \n";
        file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        header("location:javascript://history.go(-1)");
        exit;
    }else{
        $searchq = test_input(filter_var($_POST['sq'], FILTER_SANITIZE_STRING));
        $resultq = array();

        require_once "connect.php";	
        $connec = new con();

        if(strtolower($searchq)=='canon' || $searchq == 'كانون'){
            $select_sql = $connec->query('SELECT id FROM printers')->fetchAll();
        }elseif(strtolower($searchq)=='print' || strtolower($searchq)=='printer' || $searchq == 'طابعة' || $searchq == 'طباعة' || $searchq == 'طابعه' || $searchq == 'طباعه'){
            $select_sql = $connec->query('SELECT id FROM printers WHERE printers.functions LIKE "1%"')->fetchAll();
        }elseif(strtolower($searchq)=='copy' || strtolower($searchq)=='copier' || $searchq == 'تصوير'){
            $select_sql = $connec->query('SELECT id FROM printers WHERE printers.functions LIKE "_1%"')->fetchAll();
        }elseif(strtolower($searchq)=='scan' || strtolower($searchq)=='scanner' || strtolower($searchq)=='سكانر' || $searchq == 'سكان'){
            $select_sql = $connec->query('SELECT id FROM printers WHERE printers.functions LIKE "__1%"')->fetchAll();
        }elseif(strtolower($searchq)=='fax' || $searchq == 'فاكس'){
            $select_sql = $connec->query('SELECT id FROM printers WHERE printers.functions LIKE "%1"')->fetchAll();
        }else{
            $searchquerry = '%'.$searchq.'%';
            $select_sql = $connec->query('SELECT id FROM printers WHERE printers.model LIKE ? OR printers.description LIKE ? OR printers.description_ar LIKE ?', $searchquerry ,$searchquerry, $searchquerry)->fetchAll();
        }

        foreach($select_sql as $printer){
            $id = $printer['id'];
            array_push($resultq, $id);
        }

        $qs = implode("_",$resultq);

        $rows = $connec->query('SELECT * FROM search_history')->numRows();
        if($rows==0){
            $new_id=0;
        }else{
            $last_row = $connec->query('SELECT * FROM search_history ORDER BY id DESC LIMIT 1')->fetchArray();
            $new_id = $last_row['id'] + 1;
        }
        $insert_sql = $connec->query('INSERT INTO search_history (id, ip, searchq, qresult, timestamp) VALUES (?,?,?,?,?)', $new_id, $ip, $searchq, $qs, $currenttime);

        $connec->close();

        if($lang == 'ar') {  
            header("location: ar/searchresults?resultq=$qs");
            exit;
        } else {
            header("location: searchresults?resultq=$qs");
            exit;
        }
    }
?>