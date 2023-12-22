<?php

require_once ('./core/contracts.php');

require_once ('services.php');
require_once ('MySQLConnection.php');

function getDependency($s)
{
    $connection = new MySQLConnection();
    $dependencyContainer = [
        UrlWatcher::class => new MySQLUrlWatcher($connection),
        CanBeEmailed::class => new User($connection),
        Emailer::class => new SystemEmailer()
    ];
    return $dependencyContainer[$s];
}
