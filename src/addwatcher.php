<?php
session_start();
//unset($_SESSION['userid']);
$_SESSION['userid'] = 1;
require_once ('./core/UrlWatcher.php');
require_once ('./core/Price.php');
require_once ('parser.php');
require_once ('./MySQLConnection.php');
require_once ('dependency-container.php');

if (isset($_SESSION['userid'])) {
    $_SESSION['userid'] = 1;


    $user = new User($_SESSION['userid']);
    echo 'hello,' . $_SESSION['userid'] . ' you want ' . $_POST['url'] . '<br>';
    $urlWatcher = getDependency(UrlWatcher::class);

    try {
        $rez = processPage(file_get_contents('./bike.html'));
        $rez = processPage(file_get_contents($_POST['url']));

        if ($rez) {
            $rez['url'] = $_POST['url'];
            print_r($rez); echo '<br>';
            $url = new Url($rez['id'], $rez['url'], $rez['price'], $rez['title']);
        } else {
            throw new Exception();
        }

        $urlWatcher->addUrlToWatchList($url);
        $urlWatcher->addUserAsWatcher($url, $user);

        //echo "$_POST[url] added successfully, current price is $rez[price]";
    } catch (Exception $err) {
        echo 'something wrong with an url';
    }
}
else
{
    echo 'sorry, but we cannot notify anonymous users, please login or register to be notified';
}