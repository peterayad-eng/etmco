<main>
    <?php
        $select_sqlu = $connec->query('SELECT type FROM users WHERE user = ?', $_SESSION['user'])->fetchArray();
        if($select_sqlu['type']=='admin'){
            $user=$_SESSION['user'];
            $updatedid = $_GET['id'];
            $select_sql = $connec->query('SELECT * FROM printers WHERE id = ?', $updatedid)->fetchArray();
            $function = str_split($select_sql['functions']);

            while(count($function)<4){
                array_unshift($function,"0");
            }

            function br2nl($string){
                return str_replace(array('<br />', '<br>', '<br/>'), "", $string);
            }
    ?>
    <section id="printereditdata">
        <?php
            if(isset($_GET['editDerror']) && $_GET['editDerror'] == 1){
			echo "<div style='color:red'>The Data could not be updated </div>";
            }
            elseif(isset($_GET['editDerror']) && $_GET['editDerror'] == 2){
                echo "<div style='color:red'>The Product model is already Exist </div>";
            }
        ?>
        <div class="">
           <div class="login-form roundborder">
                 <div class="login-logo">
                    <h2> Edit Printer's Data </h2>
                </div>
                <form  action="printerAfterEditData" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$updatedid?>"/>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter"><label>Model</label></div>
                        <div class="col-12 col-md-9 nopadd leftmargin"><input id='model' type="text" class="form-control" placeholder="Printer model" name="model" value="<?=$select_sql['model']?>" required></div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd">
                        <div class="col-6 col-md-2 labelCenter"><label>Category</label></div>
                        <div class="col-12 col-md-9">
                            <?php
                                $select_sqlc = $connec->query('SELECT * FROM categories')->fetchAll();
                                foreach($select_sqlc as $category){
                            ?> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="exampleRadios<?=$category['id']?>" value="<?=$category['category']?>" <?php if($category['category'] == $select_sql['category']){echo 'checked';} ?>>
                                        <label class="form-check-label" for="exampleRadios<?=$category['id']?>"><?=$category['button']?></label>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd">
                        <div class="col-6 col-md-2 labelCenter"><label>Functions</label></div>
                        <div class="col-12 col-md-10">
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Print' class="form-check-input" type="checkbox" role="switch" id="Print" <?php if($function[0] == '1'){echo 'checked';} ?>>
                                <label class="form-check-label" for="Print">Print</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Copy' class="form-check-input" type="checkbox" role="switch" id="Copy" <?php if($function[1] == '1'){echo 'checked';} ?>>
                                <label class="form-check-label" for="Copy">Copy</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Scan' class="form-check-input" type="checkbox" role="switch" id="Scan" <?php if($function[2] == '1'){echo 'checked';} ?>>
                                <label class="form-check-label" for="Scan">Scan</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Fax' class="form-check-input" type="checkbox" role="switch" id="Fax" <?php if($function[3] == '1'){echo 'checked';} ?>>
                                <label class="form-check-label" for="Fax">Fax</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd">
                        <div class="col-6 col-md-2 labelCenter"><label>Warrenty</label></div>
                        <div class="col-7 col-md-5 nopadd leftmargin"><input type="number" class="form-control" placeholder="warrenty" name="warrenty" value="<?=$select_sql['warrenty']?>"  required></div>
                        <div class="col-5">
                            <select name='warrentyperiod' class="form-select" aria-label="Default select example">
                                <option value="year" <?php if($select_sql['warrenty_period'] == 'year'){echo 'selected';} ?>>Year</option>
                                <option value="month" <?php if($select_sql['warrenty_period'] == 'month'){echo 'selected';} ?>>Month</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class='col-12'><textarea id="desc" name="desc" placeholder="Description in English" rows="3" class="forminput navheadersize"><?=br2nl($select_sql['description'])?></textarea></div>
                    <div class='col-12'><textarea id="descar" name="descar" placeholder="الوصف باللغة العربية" rows="3" class="forminput navheadersize" lang="ar" dir="rtl"><?=br2nl($select_sql['description_ar'])?></textarea></div>
                    
					<div class="center">
                        <button type="submit" class="btn backblue btn-success save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
</main>