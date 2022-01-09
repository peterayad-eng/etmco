<main lang="ar" dir="rtl" class=''>
    <ul class="nav nav-tabs filterbar">
        <li class="nav-item">
            <a href='#' class="nav-link navheadersize filterlink activefilter" aria-current="page" data-filter="all">الكل</a>
        </li>
        <?php
            $queryc = $connec->query('SELECT * FROM categories')->fetchAll();
            foreach($queryc as $category){
		?>
            <li class="nav-item">
                <a href='#' id="<?=$category['id']?>" class="nav-link filterlink navheadersize" data-filter=".<?=$category['category']?>"><?=$category['button_ar']?></a>
            </li>			
		<?php
		  }
		?>
    </ul>
    <div class='row mixgallery'>
        <?php
            $select_sql = $connec->query('SELECT * FROM printers')->fetchAll();
            foreach($select_sql as $printer){
                    $id = $printer['id'];
		?>
			<div class='col-12 col-sm-6 col-md-3 bottompadd mix <?=$printer["category"]?>'>
                <div id='canonproduct' class='relativecontainer'>
                    <a href="product?id=<?=$id?>"><img src="../Images/<?=$printer['image']?>" class="d-block w-100 h-100 otherimg passiveservice" alt="<?=$printer['model']?>"/></a>
                    <div style="font-family: 'Helvetica';" class='absolutecaption_ar w-8 red bold rightpadd'><?=$printer['model']?></div>
                </div>
            </div>
		<?php
		  }
		?>
    </div>
</main>

<script src="../JS/mixitup.min.js"></script>

<script>
    //toggle active nav tab
    navtabs = document.getElementsByClassName('filterlink');
    
    function changeFilter(event){
        var clickedtab = event.path[0];
        
        for(let i=0 ; i<navtabs.length ; i++){
            navtabs[i].classList.remove('activefilter');
        }
        
        clickedtab.classList.add('activefilter');
    }
    
    
    for(let i=0 ; i<navtabs.length ; i++){
        navtabs[i].addEventListener('click', changeFilter);
    }
</script>

<?php
    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];
?>
    <script>
        var containerEl = document.querySelector('.mixgallery');
        var activcat = document.getElementById("<?=$filter?>")
        var mixer = mixitup(containerEl, {
                load: {
                    filter: activcat.getAttribute("data-filter")
                }
            });
        
        for(let i=0 ; i<navtabs.length ; i++){
            navtabs[i].classList.remove('activefilter');
        }
        
        activcat.classList.add('activefilter')
    </script>
<?php
    }else{
?>
    <script>
        //Select MixItUp Plugin filter container
        var containerEl = document.querySelector('.mixgallery');

        var mixer = mixitup(containerEl);
    </script>
<?php
    }
?>