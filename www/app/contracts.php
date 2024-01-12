<?php

interface UrlWatcher
{
    public function addUrlToWatchList(Url $url);
    public function addUserAsWatcher(Url $url, User $user);
    public function getEmailCandidatesList();
    public function updatePrice($id, $price);
}

interface CanBeEmailed
{
    public function getUserByEmail(string $email);
}
interface Emailer
{
    public function notify($email, $message);
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