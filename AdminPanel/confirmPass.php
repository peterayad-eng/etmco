<?php

	session_start();
	if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
		if(!isset($_COOKIE['user'])){
			header("location: page-login");
			exit;
		}
	}
    require_once "session.php";
?>
<!DOCTYPE html>
<html lang="en">	
	<head>
		<title>ETMCO</title>
		<meta charset="utf-8" />
        <meta name="keywords" content="printer, photocopier, canon, cartridge, hp, i-SENSYS, i sensys, ir3026, ir2600i, laser printer">
		<meta name="author" content="Persona, info@persona-eg.com" />
		<meta name="publisher" content="Persona eg" />
        <meta name="language" content="en">
        <meta name="description" content="We are a group of experienced engineers, and The company is an authorized and official distributer for Canon. We offers low-cost and cost-saving solutions for companies, providing photocopiers such as printers, scanners, and faxes while maintaining high capacity for periodic maintenance and providing spare parts in addition to connecting those devices to the server and sending email from them and vice versa." />
        
        <meta name="DC.creator" content="https://www.persona-eg.com">
		<meta name="DC.Publisher" content="Persona eg" />
		<meta name="DC.Rights" content="Copyright 2021, Persona Team. All rights reserved." />
		<meta name="DC.Type" content="text/html" />
		<meta name="DC.Language" content="en" />
		<meta name="DC.Title" lang="en" content="ETMCO" />
		<meta name="DC.Description" xml:lang="en" content="We are a group of experienced engineers, and The company is an authorized and official distributer for Canon. We offers low-cost and cost-saving solutions for companies, providing photocopiers such as printers, scanners, and faxes while maintaining high capacity for periodic maintenance and providing spare parts in addition to connecting those devices to the server and sending email from them and vice versa." />
		<meta name="DC.Identifier" schema="DCterms:URI" content="https://www.persona-eg.com/index" />
        
        <meta property="og:type" content="website" />
		<meta property="og:title" content="ETMCO" />
		<meta property="og:url" content="https://www.etmcoeg.com" />
		<meta property="og:description" content="We are a group of experienced engineers, and The company is an authorized and official distributer for Canon. We offers low-cost and cost-saving solutions for companies, providing photocopiers such as printers, scanners, and faxes while maintaining high capacity for periodic maintenance and providing spare parts in addition to connecting those devices to the server and sending email from them and vice versa." />
		<meta property="og:site_name" content="ETMCO" />
        <meta property="og:image" content="Images/logo.png" />
        
        <meta property="twitter:card" content="website" />
		<meta property="twitter:title" content="ETMCO" />
		<meta property="twitter:creator" content="https://www.etmcoeg.com" />
		<meta property="twitter:description" content="We are a group of experienced engineers, and The company is an authorized and official distributer for Canon. We offers low-cost and cost-saving solutions for companies, providing photocopiers such as printers, scanners, and faxes while maintaining high capacity for periodic maintenance and providing spare parts in addition to connecting those devices to the server and sending email from them and vice versa." />
		<meta property="twitter:site" content="ETMCO" />
        <meta property="twitter:image" content="../Images/logo.png" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        
        
        <link rel="canonical" href="https://www.etmcoeg.com/index" />
		<link rel="shortcut icon" href="../Images/logo.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="../Bootstrap5.1.3/css/bootstrap.min.css">
        <link href="../fontawesome5.15.4/css/fontawesome.css" rel="stylesheet">
        <link href="../fontawesome5.15.4/css/brands.css" rel="stylesheet">
        <link href="../fontawesome5.15.4/css/solid.css" rel="stylesheet">
        <link href="../fontawesome5.15.4/css/regular.css" rel="stylesheet">
		<link rel="stylesheet" href="../CSS/animate.css">
		<link rel="stylesheet" href="../CSS/CSS.css">
        <link rel="stylesheet" href="CSS/CSS.css">
	</head>
	<body>
            <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container logincontainer">
                <div class="login-content">
                    <div class="login-logo center">
                        <a href="index">
                            <img class="align-content imgSize roundborder" src="../Images/logo.png" alt="ETMCO">
                        </a>
                        <h1 class="logo-header"> Hello, <?=$_SESSION['user']?> </h1>
                    </div>
                    <?php
                        $id = $_GET['id'];

                        if(isset($_GET['error']) && $_GET['error'] == 1){
                            echo "<div style='color:red'>The username or password isn't correct</div>";
                        }if(isset($_GET['error']) && $_GET['error'] == 2){
                            echo "<div style='color:red'>You have exceeded the number of attempts. Please, try again later</div>";
                        }

                        function get_client_ip(){
                            $str="Unknown";
                            foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
                                if (array_key_exists($key, $_SERVER) === true){
                                    foreach (explode(',', $_SERVER[$key]) as $ip){
                                        $ip = trim($ip); 

                                        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                                            $str = $key." is ".$ip."    ";;
                                        }
                                    }
                                }
                            }
                            return $str;
                        }

                        $ip = get_client_ip();
                    ?>
                    <div class="login-form roundborder">
                        <div class="login-logo">
                            <h2> Please, Confirm Your Password </h2>
                        </div>
                        
                        <form  action="confirmPassSubmit" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$id?>"/>
                            <input id='ip' name='ip' value='<?=$ip?>' type='hidden'/>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="pass">
                            </div>

                            <button type="submit" class="btn backblue btn-success btn-flat m-b-30 m-t-30">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <footer class="backwhite bottom adminpanelfooter">
            <div class='w-10 center'>
                <a href='https://persona-eg.com/' target="_blank" class="center copy">Copyright © 2021 Persona-eg. All rights reserved</a>
            </div>
        </footer>	
		
		<script src="../Bootstrap5.1.3/jquery-3.6.0.min.js"></script>
        <script src="../Bootstrap5.1.3/js/bootstrap.min.js"></script>
		<script src="../JS/wow.min.js"></script>
        
    </body>
</html>
