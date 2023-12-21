<?php
require_once ('core/UrlWatcher.php');
require_once ('MySQLConnection.php');

function getDependency($s)
{
    $dependencyContainer = [
        UrlWatcher::class => new MySQLUrlWatcher(new MySQLConnection())
    ];
    return $dependencyContainer[$s];
}
