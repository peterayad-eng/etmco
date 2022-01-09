	<footer class="backwhite bottom adminpanelfooter">
		<div class='w-10 center'>
            <a href='https://persona-eg.com/' target="_blank" class="center copy">Copyright © 2021 Persona-eg. All rights reserved</a>
        </div>
	</footer>	
		
		<script src="../Bootstrap5.1.3/jquery-3.6.0.min.js"></script>
        <script src="../Bootstrap5.1.3/popper.min.js"></script>
        <script src="../Bootstrap5.1.3/js/bootstrap.min.js"></script>
		<script src="../JS/wow.min.js"></script>

		<script>
            //Initiate WOW plugin
            new WOW().init();
        </script>

		<script>
            // Navbar change active class between pages
            var home = $("#home-nav");
            var users = $("#users-nav");
            var items = $(".nav-item")
            var path = window.location.pathname;
            var page = path.split("/").pop();
            $(document).ready(function() {
                if(page=="index"){
                    items.removeClass("activ");
                    home.addClass("activ");
                }
                else if(page==""){
                    items.removeClass("activ");
                    home.addClass("activ");
                }
                else if(page=="users"){
                    items.removeClass("activ");
                    users.addClass("activ");
                }
            })
		</script>

        <script>
            // Submit Form before delete item
            var d = document.getElementsByClassName('deleteButton');
            var confirmIt = function (e) {
                if (!confirm('Do you want to delete this item?')) e.preventDefault();
                };
            for (var i = 0, l = d.length; i < l; i++) {
                d[i].addEventListener('click', confirmIt, false);
                }
        </script>
	</body>
</html> 