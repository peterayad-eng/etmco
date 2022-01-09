<main>
    <?php
        $select_sqlu = $connec->query('SELECT type FROM users WHERE user = ?', $_SESSION['user'])->fetchArray();
        if($select_sqlu['type']=='admin'){
    ?>
    <section id="adminprinters">
        <?php
            if(isset($_GET['adderror']) && $_GET['adderror'] == 1){
                echo "<div style='color:red'>The Product could not be added </div>";
            }
            elseif(isset($_GET['adderror']) && $_GET['adderror'] == 2){
                echo "<div style='color:red'>This product is already Exist </div>";
            }
            if(isset($_GET['editLerror']) && $_GET['editLerror'] == 2){
                echo "<div style='color:red'>The Image Must be less than 5MB </div>";
            }
            elseif(isset($_GET['editLerror']) && $_GET['editLerror'] == 3){
                echo "<div style='color:red'>The File Must be an image </div>";
            }
        ?>
        <div class="">
           <div class="login-form roundborder">
                 <div class="login-logo">
                    <h2 class='center'> Add Printer </h2>
                </div>
                <form  action="printerAfterAdd" method="POST" enctype="multipart/form-data">
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter"><label>Model</label></div>
                        <div class="col-12 col-md-9 nopadd leftmargin"><input id='model' type="text" class="form-control" placeholder="Printer model" name="model" required></div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd">
                        <div class="col-6 col-md-2 labelCenter"><label>Category</label></div>
                        <div class="col-12 col-md-9">
                            <?php
                                $select_sql = $connec->query('SELECT * FROM categories')->fetchAll();
                                foreach($select_sql as $category){
                            ?> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="exampleRadios<?=$category['id']?>" value="<?=$category['category']?>" <?php if($category['id'] == 1){echo 'checked';} ?>>
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
                                <input name='func[]' value='Print' class="form-check-input" type="checkbox" role="switch" id="Print" checked>
                                <label class="form-check-label" for="Print">Print</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Copy' class="form-check-input" type="checkbox" role="switch" id="Copy">
                                <label class="form-check-label" for="Copy">Copy</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Scan' class="form-check-input" type="checkbox" role="switch" id="Scan">
                                <label class="form-check-label" for="Scan">Scan</label>
                            </div>
                            <div class="form-check form-check-inline form-switch">
                                <input name='func[]' value='Fax' class="form-check-input" type="checkbox" role="switch" id="Fax">
                                <label class="form-check-label" for="Fax">Fax</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-widget-four form-group row col-12">
				        <div class="stat-icon dib col-2 center leftmargin middlevertical justifycenter">
                            <i class="fas fa-database database"></i>
                        </div>
                        <div class="stat-content col-9 leftmargin nopadd">
                            <div class="text-left dib row col-12 nomargin nopadd">
                                <div class="stat-heading col-12">Select image to upload (jpg or png images only):</div>
                                <div class="stat-text row col-12">
                                    <input type="file" name="image" class="col-12" required/> 
                                    <div class="col-12">MaxSize:5MB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd">
                        <div class="col-6 col-md-2 labelCenter"><label>Warrenty</label></div>
                        <div class="col-7 col-md-5 nopadd leftmargin"><input type="number" class="form-control" placeholder="warrenty" name="warrenty" required></div>
                        <div class="col-5">
                            <select name='warrentyperiod' class="form-select" aria-label="Default select example">
                                <option value="year" selected>Year</option>
                                <option value="month">Month</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class='col-12'><textarea id="desc" name="desc" placeholder="Description in English" rows="3" class="forminput navheadersize"></textarea></div>
                    <div class='col-12'><textarea id="descar" name="descar" placeholder="الوصف باللغة العربية" rows="3" class="forminput navheadersize" lang="ar" dir="rtl"></textarea></div>
                    
					<div class="center">
                        <button type="submit" class="btn backblue btn-success save">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
</main>