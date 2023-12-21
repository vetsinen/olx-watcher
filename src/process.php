<?php
require_once ('./core/UrlWatcher.php');
require_once ('./core/Price.php');
require_once ('parser.php');
require_once ('./MySQLConnection.php');

$user = (new User())->userById(1);
echo 'hello, you want '.$_POST['url'].'<br>';
$urlWatcher=new MySQLUrlWatcher(new MySQLConnection());

try
{
    //$rez = processPage(file_get_contents('./bike.html'));
    $rez = processPage(file_get_contents($_POST['url']));

    if ($rez)
    {
        $rez['url'] = $_POST['url'];
        $price = new Price($rez['price']);
        $url = new Url($rez['id'], $rez['url'], $rez['price']);
    }
    else {
        throw new Exception();
    }

    $urlWatcher->addUrlToWatchList($url);
    $urlWatcher->addUserAsWatcher($url, $user);

    //echo "$_POST[url] added successfully, current price is $rez[price]";
}
catch (Exception $err){
    echo 'something wrong with an url';
}