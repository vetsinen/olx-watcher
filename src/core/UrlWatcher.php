<?php

interface UrlWatcher
{
    public function addUrlToWatchList(Url $url);
    public function addUserAsWatcher(Url $url, User $user);
    public function getEmailCandidatesList();
}

interface CanBeEmailed
{
    public function getUserByEmail(string $email);
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

    public function getEmailCandidatesList()
    {
        $query = 'SELECT url, price, title, email FROM urls JOIN watchers ON urls.id = watchers.urlid JOIN users ON watchers.userid = users.id ORDER BY url';
        return $this->connection->fetch($query);
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
class User implements CanBeEmailed
{
    private $connection;
    public $id;
    public $email;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getUserByEmail(string $email)
    {
        $query = "SELECT id FROM users WHERE email='$email' LIMIT 1";
        $rez = $this->connection->fetch($query);
        if ($rez)
        {
            print_r($rez); echo '<br>';
            $this->id = $rez[0]['id'];
            $this->email = $email;
        }
        else
        {
            $query = "INSERT INTO `users`(`email`) VALUES ('$email')";
            $rez = $this->connection->execute($query);

            $query = "SELECT id FROM users WHERE email='$email' LIMIT 1";
            $rez = $this->connection->fetch($query);
            echo ' new user added <br>';
            $this->id = $rez[0]['id'];
            $this->email = $email;
        }
    }
}

