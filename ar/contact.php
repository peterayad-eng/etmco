<main lang="ar" dir="rtl" class='verticalcenter'>
    <h2 class='red right bold modelh h3_2'>إتصل بنا</h2>
    <div class='row'>
        <div class="col-12 col-md-7 order-md-2 leftpadd bottompadd">
            <div class="mapouter w-100 h-10">
                <div class="gmap_canvas w-100 h-100">
                    <iframe id="gmap_canvas" class='w-100 h-100' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.4200373448057!2d31.33269111567516!3d30.11079202238905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14581590ca957a95%3A0x9b5c2ac348e72a7c!2z2KfZhNi02LHZg9ipINin2YTZh9mG2K_Ys9mK2Kkg2YTZhNiq2KzYp9ix2Kkg2YjYp9mE2LXZitin2YbYqSDZg9in2YbZiNmGIEVUTUNPIENhbm9u!5e0!3m2!1sen!2seg!4v1638629804571!5m2!1sen!2seg" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div id='contactNumbers' class="col-12 col-md-5 order-md-1 leftpadd bottompadd">
            <div class='contacts h3_2'>
                <div class='bold'>رقم التليفون</div>
                <div class='leftpadd'>22404344 20+</div>
                <div class='leftpadd'>22404342 20+</div>
                <div class='bold'>رقم الموبايل</div>
                <div class='leftpadd'>1090305188 20+</div>
                <div class='bold'>العنوان</div>
                <div class='leftpadd'>١٠ شارع رفيق وصفى من شارع عبد العزيز فهمى مصر الجديدة</div>
            </div>
        </div>
    </div>
    <div class=row>
        <div class="col-1 col-md-2"></div>
        <div class='sendm center col-10 col-md-8 bottompadd'>
            <h2 class='red right h3_2'>تواصل معنا</h2>
            <?php
                if(isset($_GET['serror']) && $_GET['serror'] == 1){
                    echo "<div style='color:green' class='leftpadd'>لقد تم استلام رسالتك , سيتم التواصل معك قريبا</div>";
                }
                elseif(isset($_GET['serror']) && $_GET['serror'] == 2){
                    echo "<div style='color:red' class='leftpadd'>لم نستطيع تلقى رسالتك الآن, من فضلك حاول لاحقا</div>";
                }elseif(isset($_GET['serror']) && $_GET['serror'] == 3){
                    echo "<div style='color:red' class='leftpadd'>من فضلك ادخل ايميل صحيح </div>";
                }
            ?>
            <form id="requestform" class="row navheadersize" action="../requestAfterSubmit" method="POST" enctype="multipart/form-data">
                <input id='lang' name='lang' value='ar' type='hidden'/>
                <input id='ip' name='ip' value='<?=$ip?>' type='hidden'/>
                <div class='col-12 col-md-6'><input id="name" name="name" type="text" maxlength="25" placeholder="الاسم" class="forminput navheadersize" required/></div>
                <div class='col-12 col-md-6'><input id="mail" name="mail" type="email" placeholder="الإيميل" class="forminput navheadersize" required/></div>
                <div class='col-12 col-md-6'><input id="mobile" name="mobile" type="text" maxlength="13" placeholder="رقم التليفون" class="forminput navheadersize" required/></div>
                <div class='col-12 col-md-6'><input id="ser" name="ser" type="text" maxlength="25" placeholder="الخدمة المطلوبة" class="forminput navheadersize" required/></div>
                <div class='col-12'><textarea id="req" name="req" placeholder="تفاصيل الطلب" rows="3" class="forminput navheadersize"></textarea></div>
                <div class="verifyingcode"><input id="verifyingcode" name="verifyingcode" type="text" placeholder='التحقق' class="verifyingcode"/></div>
                <div class='row nopadd'>
                    <div class='col-8 col-md-9'></div>
                    <button type="submit" class="btn btn-lg applybutton reqbtn navheadersize col-4 col-md-3">ارسل</button>
                </div>
            </form>
        </div>
    </div>
</main>