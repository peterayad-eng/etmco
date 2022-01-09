        <footer>
            <div class="row d-flex flex-row-reverse nopad right"> 
                <div class="col-6 col-md-2 bottompadd">
                    <h2 class="navheadersize bold">منتجاتنا</h2>
                    <?php
                        $queryf = $connec->query('SELECT * FROM categories')->fetchAll();
                        foreach($queryf as $category){
                    ?>
                        <div class='foodiv smallsize'><a href="products?filter=<?=$category['id']?>" class="a1"><?=$category['button_ar']?></a><i class="fas fa-caret-left arrow"></i></div>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-6 col-md-2 bottompadd">
                   <h2 class="navheadersize bold">خدماتنا</h2>
                    <div class='foodiv smallsize'><a href="services" class="a1">منتجاتنا</a><i class="fas fa-caret-left arrow"></i></div>
                    <div class='foodiv smallsize'><a href="services?service=2" class="a1">الاصلاح</a><i class="fas fa-caret-left arrow"></i></div>
                    <div class='foodiv smallsize'><a href="services?service=3" class="a1">زيارة</a><i class="fas fa-caret-left arrow"></i></div>
                    <div class='foodiv smallsize'><a href="services?service=4" class="a1">تأجير</a><i class="fas fa-caret-left arrow"></i></div>
                </div>
                <div class="col-6 col-md-2 bottompadd">
                    <h2 class="navheadersize bold">عن الشركة</h2>
                    <div class='foodiv smallsize'><a href="aboutus" class="a1">هدف الشركة</a><i class="fas fa-caret-left arrow"></i></div>
                    <div class='foodiv smallsize'><a href="aboutus" class="a1">عن الشركة</a><i class="fas fa-caret-left arrow"></i></div>
                </div>
                <div class="col-6 col-md-2 bottompadd">
                    <h2 class="navheadersize bold">اتصل بنا</h2>
                    <div class='foodiv addr'> ١٠ شارع رفيق وصفى من شارع عبد العزيز فهمى</div> 
                    <div class='foodiv a2'>info@etmcoeg.com</div>
                    <div class='foodiv a2'>+20 1090305188</div>
                    <div class='foodiv a2'>+02 22404344</div>
                </div>
                <div id='foofollow' class="col-12 col-md-4 bottompadd center">
                    <div><img class='foologo' src='../Images/logo.png' alt='ETMCO'/></div>
                    <div class='followsize center'>تابعنا</div>
                    <div class="center">
                        <a href='https://api.whatsapp.com/send?phone=+201090305188' target="_blank"><img class='socialfooico' src='../Images/whats.svg' alt='Whatsapp'/></a>
                        <a href='#'><img class='socialfooico' src='../Images/twitter.svg' alt='Twitter'/></a>
                        <a href='https://www.facebook.com/ETMCO.Canon/' target="_blank"><img class='facefooico' src='../Images/facebook.svg' alt='Facebook'/></a>
                        <a href='https://www.instagram.com/etmco.print.canon' target="_blank"><img class='socialfooico' src='../Images/insta.png' alt='Instagram'/></a>
                    </div>
                </div>
            </div>
            <div class='w-10 center'>
                <a href='https://persona-eg.com/' target="_blank" class="center copy">Copyright © 2021 Persona-eg. All rights reserved</a>
            </div>
        </footer>
    </div>
		
        <script src="../Bootstrap5.1.3/jquery-3.6.0.min.js"></script>
        <script src="../Bootstrap5.1.3/js/bootstrap.min.js"></script>
		<script src="../JS/wow.min.js"></script>

		<script>
            //Initiate WOW Plugin
              new WOW().init();
        </script>

		<script>
            //Toggle navbar active item when clicking
			var items = $(".ntab");
			items.on("click",function(){
			  items.removeClass("activ");
			  $(this).toggleClass("activ");
			});
		</script>

        <script>
            //arabic numbers ٠١٢٣٤٥٦٧٨٩
            // Navbar change active class between pages
            var home = $("#home-nav");
            var products = $("#products-nav");
            var services = $("#services-nav");
            var aboutus = $("#aboutus-nav");
            var contacts = $("#contacts-nav");
            var items = $(".nav-item")
            var path = window.location.pathname;
            var page = path.split("/").pop();
            $(document).ready(function() {
                if(page=="index"){
                    items.removeClass("activ_ar");
                    home.addClass("activ_ar");
                }
                else if(page==""){
                    items.removeClass("activ_ar");
                    home.addClass("activ_ar");
                }
                else if(page=="products" || page=="product" || page=="searchresults"){
                    items.removeClass("activ_ar");
                    products.addClass("activ_ar");
                }
                else if(page=="services"){
                    items.removeClass("activ_ar");
                    services.addClass("activ_ar");
                }
                else if(page=="aboutus"){
                    items.removeClass("activ_ar");
                    aboutus.addClass("activ_ar");
                }
                else if(page=="contacts"){
                    items.removeClass("activ_ar");
                    contacts.addClass("activ_ar");
                }
            })
		</script>

        <script>
            //English Redirection
            var langbutton = document.getElementById('lang');
            
            if(page=="index"){
                langbutton.setAttribute('href','../index');
            }
            else if(page==""){
                langbutton.setAttribute('href','../index');
            }
            else if(page=="products"){
                langbutton.setAttribute('href','../products');
            }
            else if(page=="product"){
                <?php
                    if(isset($_GET['id'])){
                ?>
                langbutton.setAttribute('href','../product?id=<?=$id?>');
                <?php
                    }
                ?>
            }
            else if(page=="searchresults"){
                <?php
                    if(isset($_GET['resultq'])){
                ?>
                langbutton.setAttribute('href','../searchresults?resultq=<?=$_GET['resultq']?>');
                <?php
                    }
                ?>
            }
            else if(page=="services"){
                langbutton.setAttribute('href','../services');
            }
            else if(page=="aboutus"){
                langbutton.setAttribute('href','../aboutus');
            }
            else if(page=="contacts"){
                langbutton.setAttribute('href','../contacts');
            }
        </script>

        <script>
            (function() {
                var hidden = "hidden";

                // Standards:
                if (hidden in document)
                    document.addEventListener("visibilitychange", onchange);
                else if ((hidden = "mozHidden") in document)
                    document.addEventListener("mozvisibilitychange", onchange);
                else if ((hidden = "webkitHidden") in document)
                    document.addEventListener("webkitvisibilitychange", onchange);
                else if ((hidden = "msHidden") in document)
                    document.addEventListener("msvisibilitychange", onchange);
                // IE 9 and lower:
                else if ('onfocusin' in document)
                    document.onfocusin = document.onfocusout = onchange;
                // All others:
                else
                    window.onpageshow = window.onpagehide 
                        = window.onfocus = window.onblur = onchange;

                function onchange (evt) {
                    var v = 'sg-tab-bust-visible', h = 'sg-tab-bust-hidden',
                        evtMap = { 
                            focus:v, focusin:v, pageshow:v, blur:h, focusout:h, pagehide:h 
                        };

                    evt = evt || window.event;
                    if (evt.type in evtMap)
                        document.body.className = evtMap[evt.type];
                    else        
                        document.body.className = this[hidden] ? "sg-tab-bust-hidden" : "sg-tab-bust-visible";
                }
                
                // set the initial state (but only if browser supports the Page Visibility API)
                if( document[hidden] !== undefined )
                    onchange({type: document[hidden] ? "blur" : "focus"});
                })();
        </script>
	</body>
</html>