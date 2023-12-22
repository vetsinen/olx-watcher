<?php
require_once ('./core/UrlWatcher.php');
require_once ('./Emailer.php');
require_once ('./parser.php');
require_once ('./dependency-container.php');
require_once ('./core/Price.php');

$urlWatcher = getDependency(UrlWatcher::class);
//$emailer = getDependency(Emailer::class);
$emailer = new SystemEmailer();

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
        $lastUrl = $item['url'];
        $actualPrice = processOnlyPrice(file_get_contents($lastUrl));
        echo " $item[price] --- $actualPrice for $lastUrl <br>";

        $lastPriceObj = new Price($item['price']);
        $actualPriceObj = new Price($actualPrice);

        if (!$lastPriceObj->isEqual($actualPriceObj)) {
                $emailSending = true;
                $message = "hello, new price for $item[title] is $actualPrice, you can see it on $item[url]";
                $emailer->notify($item['email'], $message);
                //TODO: update url price in table
            }

    }
    elseif ($emailSending) $emailer->notify($item['email'], $message);

}