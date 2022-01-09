<main lang="ar" dir="rtl" class=''>
    <div class='row toppadd right'>
        <?php
            if(isset($_GET['resultq']) && empty($_GET['resultq'])==0){
                $resultq = explode('_',$_GET['resultq']);
                for ($i=0; $i<count($resultq); $i++){
                    $select_sql = $connec->query('SELECT * FROM printers WHERE id= ?', $resultq[$i])->fetchArray();
		?>
			<div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='canonproduct' class='relativecontainer'>
                    <a href="product?id=<?=$select_sql['id']?>"><img src="../Images/<?=$select_sql['image']?>" class="d-block w-100 h-100 otherimg passiveservice" alt="<?=$select_sql['model']?>"/></a>
                    <div style="font-family: 'Helvetica';" class='absolutecaption_ar w-8 red bold rightpadd'><?=$select_sql['model']?></div>
                </div>
            </div>
		<?php
		      }
            }
        
            if(isset($_GET['resultq']) && empty($_GET['resultq'])==1){
		?>
			<div class='col-12 bottompadd bold'>
                لاتوجد نتائج بحث
            </div>
		<?php
            }
		?>
    </div>
</main>