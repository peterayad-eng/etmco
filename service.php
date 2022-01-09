<main class='verticalcenter'>
    <div id='services' class=''>
        <div class="row padd verticalcenter">
            <div class='col-12 col-sm-7 order-sm-2 verticalcenter bottompadd'>
                <div id='activeservice'>
                    <img src="Images/canon.jpg" class="d-block w-100 h-100 activeimg" alt="Canon Products"/>
                </div>
            </div>
            <div class='col-12 col-sm-5 order-sm-1 bottompadd'>
                <div id='serviceheader' class="h3_2 allproduct red bold">Canon Products</div>
                <div id='servicetext' class="h3_2 w-8">Photocopier, Multifunction printers, scanners, and faxes.</div>
                <div id='servicea' class='right w-8'><a href='products' class='read bold'>Shop.</a></div>
            </div>
        </div>
        <div class='row padd'>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='canonproduct' class='relativecontainer'>
                    <img src="Images/canon.jpg" class="d-block w-100 h-100 otherimg" alt="Canon Products"/>
                    <div class='absolutecaption w-8 red bold'>Canon Products</div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='maintenance' class='relativecontainer'>
                    <img src="Images/printer-repair.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Maintenance"/>
                    <div class='absolutecaption w-8 red bold'>Maintenance</div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='repairvisit' class='relativecontainer'>
                    <img src="Images/MW-RCF-13-3.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Repair Visit"/>
                    <div class='absolutecaption w-8 red bold'>Repair Visit</div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='rentservice' class='relativecontainer'>
                    <img src="Images/work-secretary.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Rent Service"/>
                    <div class='absolutecaption w-8 red bold'>Rent Service</div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    //toggle between services
    const relativecontainer = document.getElementsByClassName('relativecontainer');
    const activeserviceheader = document.getElementById('serviceheader');
    const activeservicetext = document.getElementById('servicetext');
    const activeservicea =document.getElementById('servicea');
    const activeimg = document.getElementById('activeservice');
    const maint = document.getElementById('maintenance')
    const repairvisit = document.getElementById('repairvisit')
    const rentservice = document.getElementById('rentservice')
    
    function maintenance(){
        activeserviceheader.innerHTML = 'Maintenanace';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'Long-term maintenance contracts with the provision of appropriate spare parts and inks for all Canon products, and HP printers where we do periodic maintenance at least once a month with dealing with any machine multifunctions with a maximum period of 24 hours from the date of reporting.';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">Request.</a>';
        activeimg.innerHTML = '<img src="Images/printer-repair.jpg" class="d-block w-100 h-100 activeimg" alt="Maintenance"/>'; 
    }
    
    function repair(){
        activeserviceheader.innerHTML = 'Repair Visit';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'The company makes a repair visit where the maintenance engineer inspects the machines and does the necessary maintenance for it and writes the comprehensive report on the machines and makes repair measurements if necessary, and receives the maintenance for individuals at our company headquarter.';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">Request.</a>';
        activeimg.innerHTML = '<img src="Images/MW-RCF-13-3.jpg" class="d-block w-100 h-100 activeimg" alt="Repair Visit"/>';
    }
    
    function rent(){
        activeserviceheader.innerHTML = 'Rent Service';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'A photocopier is offered for rent depending on the customer\'s needs, and a monthly fee is received following an agreement. <br> Where the company carries out maintenance work and provides the necessary spare parts and inks during this period.';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">Request.</a>';
        activeimg.innerHTML = '<img src="Images/work-secretary.jpg" class="d-block w-100 h-100 activeimg" alt="Rent Service"/>';
    }
    
    function changeService(event){
        let img = event.path[0];
        let parent = event.path[1];
        
        if (img.classList.contains('passiveservice')){
            for(let i=0 ; i<relativecontainer.length ; i++){
                relativecontainer[i].firstElementChild.classList.add('passiveservice');
            }
            img.classList.remove('passiveservice');
            if(parent.id == 'canonproduct'){
                activeserviceheader.innerHTML = 'Canon Products';
                activeserviceheader.classList.add('allproduct');
                activeservicetext.innerHTML = 'Photocopier, Multifunction printers, scanners, and faxes.';
                activeservicetext.classList.remove('smallsize');
                activeservicetext.classList.add('h3_2');
                activeservicea.innerHTML = '<a href="products" class="read bold">Shop.</a>';
                activeimg.innerHTML = '<img src="Images/canon.jpg" class="d-block w-100 h-100 activeimg" alt="Canon Products"/>';
            }else if (parent.id == 'maintenance'){
                maintenance();
                
            }else if (parent.id == 'repairvisit'){
                repair();
                
            }else if (parent.id == 'rentservice'){
                rent();
            }
            
        }
    }
    
    for(let i=0 ; i<relativecontainer.length ; i++){
        relativecontainer[i].addEventListener('click', changeService);
    }
</script>
<?php
    if(isset($_GET['service']) && $_GET['service'] == 2){
?>
    <script>
        for(let i=0 ; i<relativecontainer.length ; i++){
            relativecontainer[i].firstElementChild.classList.add('passiveservice');
        }
        maint.firstElementChild.classList.remove('passiveservice')
        maintenance();
    </script>
<?php
    }
    elseif(isset($_GET['service']) && $_GET['service'] == 3){
?>
    <script>
        for(let i=0 ; i<relativecontainer.length ; i++){
            relativecontainer[i].firstElementChild.classList.add('passiveservice');
        }
        repairvisit.firstElementChild.classList.remove('passiveservice')
        repair();
    </script>
<?php
    }
    elseif(isset($_GET['service']) && $_GET['service'] == 4){
?>
    <script>
        for(let i=0 ; i<relativecontainer.length ; i++){
            relativecontainer[i].firstElementChild.classList.add('passiveservice');
        }
        rentservice.firstElementChild.classList.remove('passiveservice')
        rent();
    </script>
<?php
    }
?>