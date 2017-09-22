<?php
    session_start();
    session_destroy();
    echo "<script type='text/javascript'>alert('Logged out.');</script>";
    echo('end');
    header("refresh:0;url=index.html");
