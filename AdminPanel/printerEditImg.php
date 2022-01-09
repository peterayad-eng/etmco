<main>
    <?php
        $select_sqlu = $connec->query('SELECT type FROM users WHERE user = ?', $_SESSION['user'])->fetchArray();
        if($select_sqlu['type']=='admin'){
            $user=$_SESSION['user'];
            $updatedid = $_GET['id'];
            $select_sql = $connec->query('SELECT * FROM printers WHERE id = ?', $updatedid)->fetchArray();
    ?>
    <section id="printereditdata">
        <?php
           if(isset($_GET['editIerror']) && $_GET['editIerror'] == 1){
               echo "<div style='color:red'>The File could not be uploaded </div>";
           }
            elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 2){
                echo "<div style='color:red'>The File Must be less than 5MB </div>";
            }
            elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 3){
                echo "<div style='color:red'>The File Must be an image </div>";
            }
        ?>
        <div class="">
           <div class="login-form roundborder">
                 <div class="login-logo">
                    <h2> Update printer's Image </h2>
                </div>
                <form  action="printerAfterEditImg" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$updatedid?>"/>
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
                    
                    
                    
					<div class="center">
                        <button type="submit" class="btn btn-success save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
</main>