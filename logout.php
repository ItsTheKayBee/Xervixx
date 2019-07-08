<?php
    $logout=$_REQUEST['q'];
    session_start();
    if($logout=='true'){
        session_unset();
        session_destroy();
    }

