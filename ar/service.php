<main lang="ar" dir="rtl" class='verticalcenter'>
    <div id='services' class=''>
        <div class="row padd verticalcenter">
            <div class='col-12 col-sm-7 order-sm-2 verticalcenter bottompadd'>
                <div id='activeservice'>
                    <img src="../Images/canon.jpg" class="d-block w-100 h-100 activeimg" alt="Canon Products"/>
                </div>
            </div>
            <div class='col-12 col-sm-5 order-sm-1 bottompadd'>
                <div id='serviceheader' class="h3_2 allproduct red bold">موزع معتمد لدى <span class='red'>كانون</span></div>
                <div id='servicetext' class="h3_2 w-8 justify">ماكينات تصوير , طابعات متعدده الوظائف , ماسح ضوئى و فاكس.</div>
                <div id='servicea' class='left w-8'><a href='products' class='read bold'>تسوق الآن.</a></div>
            </div>
        </div>
        <div class='row padd'>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='canonproduct' class='relativecontainer'>
                    <img src="../Images/canon.jpg" class="d-block w-100 h-100 otherimg" alt="Canon Products"/>
                    <div class='absolutecaption_ar w-8 red bold rightpadd'>موزع معتمد لدى <span class='red'>كانون</span></div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='maintenance' class='relativecontainer'>
                    <img src="../Images/printer-repair.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Maintenance"/>
                    <div class='absolutecaption_ar w-8 red bold rightpadd'>الصيانة</div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='repairvisit' class='relativecontainer'>
                    <img src="../Images/MW-RCF-13-3.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Repair Visit"/>
                    <div class='absolutecaption_ar w-8 red bold rightpadd'>زيارة الإصلاح</div>
                </div>
            </div>
            <div class='col-12 col-sm-6 col-md-3 bottompadd'>
                <div id='rentservice' class='relativecontainer'>
                    <img src="../Images/work-secretary.jpg" class="d-block w-100 h-100 otherimg passiveservice" alt="Rent Service"/>
                    <div class='absolutecaption_ar w-8 red bold rightpadd'>تأجير الماكينات</div>
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
        activeserviceheader.innerHTML = 'الصيانة';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'عقود صيانة طويلة الأجل مع توفير قطع غيار وأحبار مناسبة لجميع منتجات كانون ، وطابعات HP حيث نقوم بإجراء صيانة دورية مرة واحدة على الأقل شهريًا للتعامل مع أي آلة متعددة الوظائف لمدة أقصاها ٢٤ ساعة من تاريخ الإبلاغ .';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">اطلب الان.</a>';
        activeimg.innerHTML = '<img src="../Images/printer-repair.jpg" class="d-block w-100 h-100 activeimg" alt="Maintenance"/>'; 
    }
    
    function repair(){
        activeserviceheader.innerHTML = 'زيارة الإصلاح';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'تقوم الشركة بزيارة الإصلاح حيث يقوم مهندس الصيانة بفحص الماكينات وإجراء الصيانة اللازمة لها وكتابة تقرير شامل عن الماكينات وإجراء قياسات الإصلاح إذا لزم الأمر ، ويتلقى الصيانة للأفراد بمقر الشركة.';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">اطلب الان.</a>';
        activeimg.innerHTML = '<img src="../Images/MW-RCF-13-3.jpg" class="d-block w-100 h-100 activeimg" alt="Repair Visit"/>';
    }
    
    function rent(){
        activeserviceheader.innerHTML = 'تأجير الماكينات';
        activeserviceheader.classList.remove('allproduct');
        activeservicetext.innerHTML = 'يتم تقديم آلة تصوير للإيجار بناءً على احتياجات العميل ، ويتم استلام رسوم شهرية بناء على الاتفاق. <br> حيث تقوم الشركة بأعمال الصيانة وتوفر قطع الغيار والأحبار اللازمة خلال هذه الفترة.';
        activeservicetext.classList.remove('h3_2');
        activeservicetext.classList.add('smallsize');
        activeservicea.innerHTML = '<a href="contacts" class="read bold">اطلب الان.</a>';
        activeimg.innerHTML = '<img src="../Images/work-secretary.jpg" class="d-block w-100 h-100 activeimg" alt="Rent Service"/>';
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
                activeserviceheader.innerHTML = 'موزع معتمد لدى <span class="red">كانون';
                activeserviceheader.classList.add('allproduct');
                activeservicetext.innerHTML = 'ماكينات تصوير , طابعات متعدده الوظائف , ماسح ضوئى و فاكس.';
                activeservicetext.classList.remove('smallsize');
                activeservicetext.classList.add('h3_2');
                activeservicea.innerHTML = '<a href="products" class="read bold">تسوق الآن.</a>';
                activeimg.innerHTML = '<img src="../Images/canon.jpg" class="d-block w-100 h-100 activeimg" alt="Canon Products"/>';
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