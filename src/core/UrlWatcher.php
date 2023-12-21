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
        $query = "INSERT INTO `urls`(`id`, `url` , `price` ) VALUES ($url->id, '$url->url', '$url->price')";
        echo $query;
        $this->connection->execute($query);
    }
    public function addUserAsWatcher(Url $url, User $user)
    {
        $query = "INSERT INTO `watchers`(`urlid`,`userid`) VALUES ($url->id, $user-id)";
    }
}

class Url
{
    public int $id;
    public string $url;
    public string $price;

    /**
     * @param int $id
     * @param string $url
     * @param string $price
     */
    public function __construct(int $id, string $url, string $price)
    {
        $this->id = $id;
        $this->url = $url;
        $this->price = $price;
    }

}
class User
{
    public int $userid;
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
    function __construct()
    {

    }
    public function addUrlToWatch($id, $url)
    {

    }
}