<main class='verticalcenter'>
    <?php
        $id = $_GET['id'];
        $select_sql = $connec->query('SELECT * FROM printers WHERE id = ?', $id)->fetchArray();
        $category = $select_sql['category'];
        $functions = $select_sql['functions'];
        $function = str_split($functions);
        $funcount = 0;
        $prfunc = '';
        $warrentysen = '';
    
        while(count($function)<4){
            array_unshift($function,"0");
        }
 
        for($i=0;$i<4;$i++){
            if ($function[$i]=='1'){
                $funcount++;
            }
        }
    
        for($i=0;$i<4;$i++){
            if ($i==0 and $function[$i]=='1'){
                $prfunc .= 'Print';
                $funcount--;
            }elseif($i==1 and $function[$i]=='1') {
                if($funcount==1){
                    $prfunc .= ', and Copy';
                }else {
                    if($function[0]=='0'){
                        $prfunc .= 'Copy';
                    }else{
                        $prfunc .= ', Copy';
                    }
                    $funcount--;
                }
            }elseif($i==2 and $function[$i]=='1') {
                if($funcount==1){
                    $prfunc .= ', and Scan';
                }else {
                    if($function[0]=='0' and $function[1]=='0'){
                        $prfunc .= 'Scan';
                    }else{
                        $prfunc .= ', Scan';
                    }
                    $funcount--;
                }
            }elseif($i==3 and $function[$i]=='1') {
                if($function[0]=='0' and $function[1]=='0' and $function[2]=='0'){
                    $prfunc .=  'Fax';
                }else{
                    $prfunc .=  ', and Fax';
                }
                $funcount--;
            }
        }
    
        if($select_sql['warrenty']==1){
            $warrentysen .= $select_sql['warrenty'].' '.$select_sql['warrenty_period'].' warrenty';
        }elseif($select_sql['warrenty']>1){
            $warrentysen .= $select_sql['warrenty'].' '.$select_sql['warrenty_period'].'s warrenty';
        }
    
        $select_sqli = $connec->query('SELECT * FROM categories WHERE category =  ?', $category)->fetchArray();
        $categoryname = $select_sqli['button'];
    ?>
    
    <div class='row'>
        <h2 class='red bold col-12 modelh headersize'><?=$select_sql['model']?></h2>
        <div class="col-12 col-md-5 order-md-3 leftpadd bottompadd">
            <div class="w-100 h-100">
                <img src="Images/<?=$select_sql['image']?>" class="d-block w-100 h-100 otherimg" alt="<?=$select_sql['model']?>"/>
            </div>
        </div>
        <div class="col-12 col-md-7 order-md-2 leftpadd bottompadd smallsize justify">
            <div class='bold'><?=$categoryname?></div>
            <div class='bold bottompadd'><?=$prfunc?></div>
            <div class='bottompadd'><?=$select_sql['description']?></div>
            <div class='bold'><?=$warrentysen?></div>
            <div class='row backbutton'>
                <div class='col-6 col-sm-7 col-lg-8'></div>
                <a href='javascript: history.back()' class="btn btn-lg applybutton reqbtn navheadersize col-6 col-sm-5 col-lg-4">Back</a>
            </div>
            <div class='row backbutton'>
                <div class='col-6 col-sm-7 col-lg-8'></div>
                <a href='contacts' class="btn btn-lg applybutton reqbtn navheadersize col-6 col-sm-5 col-lg-4">Contact Now</a>
            </div>
        </div>
    </div>
</main>