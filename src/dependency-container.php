<?php
require_once ('core/UrlWatcher.php');
require_once ('MySQLConnection.php');
require_once ('Emailer.php');

function getDependency($s)
{
    $connection = new MySQLConnection();
    $dependencyContainer = [
        UrlWatcher::class => new MySQLUrlWatcher($connection),
        CanBeEmailed::class => new User($connection)
    ];
    return $dependencyContainer[$s];
}
