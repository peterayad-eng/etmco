<main class=''>
    <div class='row toppadd'>
        <?php
            if(isset($_GET['resultq']) && empty($_GET['resultq'])==0){
                $resultq = explode('_',$_GET['resultq']);
                for ($i=0; $i<count($resultq); $i++){
                    $select_sql = $connec->query('SELECT * FROM printers WHERE id= ?', $resultq[$i])->fetchArray();
		?>
			<div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='canonproduct' class='relativecontainer'>
                    <a href="product?id=<?=$select_sql['id']?>"><img src="Images/<?=$select_sql['image']?>" class="d-block w-100 h-100 otherimg passiveservice" alt="<?=$select_sql['model']?>"/></a>
                    <div class='absolutecaption w-8 red bold'><?=$select_sql['model']?></div>
                </div>
            </div>
		<?php
		      }
            }
        
            if(isset($_GET['resultq']) && empty($_GET['resultq'])==1){
		?>
			<div class='col-12 bottompadd bold'>
                No Search result
            </div>
		<?php
            }
		?>
    </div>
</main>