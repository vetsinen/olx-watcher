<?php
require_once ('./core/UrlWatcher.php');
require_once ('./core/Price.php');
require_once ('parser.php');

$user = (new User())->userById(1);
echo 'hello, you want '.$_POST['url'].'<br>';
$urlWatcher=new MySQLUrlWatcher();
try
{
    $rez = processPage(file_get_contents('./bike.html'));
    //$rez = processPage(file_get_contents($_POST['url']));

    if ($rez)
    {
        $rez['url'] = $_POST['url'];
        $price = new Price($rez['price']);
    }
    else {
        throw new Exception();
    }

    $watchedUrl = $urlWatcher->addUrlToWatchList(new Url($rez['id'], $rez['url']));
    $urlWatcher->addUserAsWatcher($watchedUrl, $user);

    echo "$_POST[url] added successfully, current price is $rez[price]";
}
catch (Exception $err){
    echo 'something wrong with an url';
}