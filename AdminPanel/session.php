<?php

    //Expire the session if user is inactive for 30
    //minutes or more.
    $expireAfter = 15;

    //Check to see if our "last action" session
    //variable has been set.
    if(isset($_SESSION['last_action'])){

        //Figure out how many seconds have passed
        //since the user was last active.
        $secondsInactive = time() - $_SESSION['last_action'];

        //Convert our minutes into seconds.
        $expireAfterSeconds = $expireAfter * 60;

        //Check to see if they have been inactive for too long.
        if($secondsInactive >= $expireAfterSeconds){
            //User has been inactive for too long.
            //Kill their session.
            $log = "2203\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_SESSION['user']." \tThe user has logged out after an inactive time \n";
            file_put_contents('../Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            require_once "logout.php";
        }

    }

    //Assign the current timestamp as the user's
    //latest activity
    $_SESSION['last_action'] = time();
?>
