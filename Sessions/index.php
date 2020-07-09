<?php
 /**
 * Created by PhpStorm.
 * User: Martin
 * Date: 5/13/2018
 * Time: 8:36 PM
 */
    session_start();

    if( isset( $_SESSION['counter'] ) ) {
        $counter = $_SESSION['counter'] += 1;
    }else {
        $counter = $_SESSION['counter'] = 1;
    }

    echo "You have visited this page $counter";

?>
