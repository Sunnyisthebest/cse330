<?php
class Alert
{

    public function _construct()
    {
    }

    public function alert($msg, $url = "index.html", $timeout = 5)
    {
        echo "<script>(function(){alert('$msg');})();</script>";
        echo "<meta http-equiv='refresh' content='$timeout;$url' />";
    }
}
