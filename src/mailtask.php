<?php
require_once ('./core/UrlWatcher.php');
require_once ('./Emailer.php');
require_once ('./parser.php');
require_once ('./dependency-container.php');
require_once ('./core/Price.php');

$urlWatcher = getDependency(UrlWatcher::class);
$emailer = new MockEmailer();

$list = $urlWatcher->getEmailCandidatesList();
$lastUrl = '';
$emailSending = false;
$message = '';
foreach ($list as $item)
{
    echo " checking item $item[title] for $item[email] <br>";
    if ($item['url']!==$lastUrl)
    {
        echo 'checking price <br>';
        $lastPrice = new Price($item['price']);
        $lastUrl = $item['url'];
        $rez = processPage ($lastUrl);
        $actualPrice = new Price($rez['price']);
        if (!$lastPrice.isEqual($actualPrice)) {
                $emailSending = true;
                $message = "hello, new price for $item[title] is rez[price], you can see it on $item[url]";
                $emailer->notify($item['email'], $message);
                //TODO: update url price in table
            }

    }
    elseif ($emailSending) $emailer->notify($item['email'], $message);

}