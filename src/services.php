<?php

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
        $this->connection->execute($query);
    }

    public function getEmailCandidatesList()
    {
        $query = 'SELECT urls.id, email, price, url,  title FROM urls JOIN watchers ON urls.id = watchers.urlid JOIN users ON watchers.userid = users.id ORDER BY url';
        return $this->connection->fetch($query);
    }

    public function updatePrice($id, $price)
    {
        $query = "UPDATE `urls` SET price='$price' WHERE id=$id";
        echo $query;
        $this->connection->execute($query);
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

class SystemEmailer
{
    public function notify($email, $message)
    {
        @mail($email, 'price was changed', $message);
    }
}
