<?php
require_once ('./core/UrlWatcher.php');
require_once ('./Emailer.php');
$urlWatcher = new MySQLUrlWatcher();
$emailer = new MockEmailer();

foreach ($urlWatcher as $url)
{
    echo 'checking ';

    echo 'sending';

}