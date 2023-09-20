<?php
    if(!Auth::instance()->logged_in())
    {
        echo "<a href=". URL::site('/login').">LOGIN</a> / <a href=". URL::site('/register').">REGISTER</a>";
    } else {
         echo "Hello, " .Auth::instance()->get_user()->username;
        echo '<br /><a href='.URL::site('member/logout').'>logout</a>';
    }
?>
