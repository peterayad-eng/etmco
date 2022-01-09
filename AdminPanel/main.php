<main>
    <?php
        $select_sqlu = $connec->query('SELECT type FROM users WHERE user = ?', $_SESSION['user'])->fetchArray();
        if($select_sqlu['type']=='admin'){
    ?>
    <section id="adminproducts">
        <?php
            if(isset($_GET['adderror']) && $_GET['adderror'] == 0){
                echo "<div style='color:green'>The product is Added successfully </div>";
            }
            
            if(isset($_GET['editDerror']) && $_GET['editDerror'] == 0){
                echo "<div style='color:green'>The data is updated successfully </div>";
            }
        
            if(isset($_GET['editIerror']) && $_GET['editIerror'] == 0){
                echo "<div style='color:green'>The image is updated successfully </div>";
            }
        
            if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 0){
				echo "<div style='color:green'>The product is deleted successfully </div>";
            }
            else if(isset($_GET['deleteerror']) && $_GET['deleteerror'] == 1){
                echo "<div style='color:red'>The product could not be deleted </div>";
            }
					
        ?>
        <div class="row bottommargin">
            <?php
                $select_sql = $connec->query('SELECT * FROM printers')->fetchAll();
                foreach($select_sql as $printer){
                    $id = $printer['id'];
            ?>
            <div class="col-12 col-sm-6 col-md-3 bottompadd">
                <div id='canonproduct' class='relativecontainer'>
                    <div class="dropdown float-right">
                        <button class="btn bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="printersEditImg?id=<?=$id?>">Edit Image</a></li>
                                <li><a class="dropdown-item" href="printersEditData?id=<?=$id?>">Edit Data</a></li>
                                <li><a class="dropdown-item deleteButton" href="printersAfterDelete?id=<?=$id?>">Delete Product</a></li>									
                        </ul>
                    </div>
                    
                    <img src="../Images/<?=$printer['image']?>" class="d-block w-100 h-100 otherimg" alt="<?=$printer['model']?>"/>
                    <div class='absolutecaption w-8 red bold'><?=$printer['model']?></div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
                <div class="dbutton center">
                        <a href="printersAdd" class="btn backblue btn-secondary btn-lg lbutton" role="button" aria-pressed="true">Add Printer</a>
                </div>
    </section>
    <?php
        }
    ?>
</main>