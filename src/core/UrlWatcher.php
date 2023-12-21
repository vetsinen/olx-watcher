<?php

interface UrlWatcher
{
    public function addUrlToWatchList(Url $url);
    public function addUserAsWatcher(Url $url, User $user);
}
class MySQLUrlWatcher implements UrlWatcher
{
    public function addUrlToWatchList(Url $url):Url {return $url;}
    public function addUserAsWatcher(Url $url, User $user){}
}
class Url
{
    private int $id;
    private string $url;
    public function __construct(int $id, string $url)
    {

    }

}
class User
{
    private User $user;

    public function userById(int $id)
    {
        return $this;
    }
    public function __invoke(int $id)
    {
        return $this;
    }
}
class ItemWatcher
{
    private $id;
    private $url;
    private $watchers;
    public function __construct(int $id,string $url,Array $watchers)
    {

    }

    public function addWatcher($id, $watcher)
    {

    }
}
class WatchRegistry
{
    private array $items;
    function __construct()
    {

    }
    public function addUrlToWatch($id, $url)
    {

    }
}