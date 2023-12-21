<?php

interface UrlWatcher
{
    public function addUrlToWatchList(Url $url);
    public function addUserAsWatcher(Url $url, User $user);
}
class MySQLUrlWatcher implements UrlWatcher
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function addUrlToWatchList(Url $url)
    {
        $query = "INSERT INTO `urls`(`id`, `url` , `price`, `title` ) VALUES ($url->id, '$url->url', '$url->price', '$url->title')";
        try{ $this->connection->execute($query);} catch (Exception $e) {}

    }
    public function addUserAsWatcher(Url $url, User $user)
    {
        $query = "INSERT INTO `watchers`(`urlid`,`userid`) VALUES ($url->id, $user->id)";
        echo $query;
        $this->connection->execute($query);
    }
}

class Url
{
    public int $id;
    public string $url;
    public string $price;
    public string $title;

    /**
     * @param int $id
     * @param string $url
     * @param string $price
     * @param string $title
     */
    public function __construct(int $id, string $url, string $price, string $title)
    {
        $this->id = $id;
        $this->url = $url;
        $this->price = $price;
        $this->title = $title;
    }

}
class User
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function userById(int $id)
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
    function __construct()
    {

    }
    public function addUrlToWatch($id, $url)
    {

    }
}