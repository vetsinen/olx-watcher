<?php

require_once ('./core/contracts.php');
require_once ('./core/Price.php');
require_once ('./dependency-container.php');

require_once ('./parser.php');

$urlWatcher = getDependency(UrlWatcher::class);
$emailer = getDependency(Emailer::class);

$list = $urlWatcher->getEmailCandidatesList();
$lastUrl = '';
$emailSending = false;
$message = '';
foreach ($list as $item)
{
    echo " checking item $item[title] ".PHP_EOL;
    if ($item['url']!==$lastUrl)
    {
        $emailSending = false;
        $lastUrl = $item['url'];
        $actualPrice = processOnlyPrice(file_get_contents($lastUrl));

        $lastPriceObj = new Price($item['price']);
        $actualPriceObj = new Price($actualPrice);

        if (!$lastPriceObj->isEqual($actualPriceObj)) {
                $emailSending = true;
                $message = "hello, new price for $item[title] is $actualPrice, you can see it on $item[url]";
                $emailer->notify($item['email'], $message);
                $urlWatcher->updatePrice($item['id'], $actualPrice);
            }

    }
    elseif ($emailSending) $emailer->notify($item['email'], $message);

}