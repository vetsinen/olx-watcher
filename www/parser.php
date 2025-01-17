<?php

/**
 * @param string $html
 * @return array|bool
 * [id] => 718431692
 * [price] => 1 850 $
 */
function processPage(string $html):array|bool
{
    $dom = new DOMDocument;
    @$dom->loadHTML($html);
    @$xpath = new DOMXPath($dom);

    // getting id
    $selector = "/html/body/div/div[2]/div[2]/div[3]/div[1]/div[2]/div[5]/div/span[1]";
    $elements = $xpath->query($selector);
    if ($elements && $elements->length > 0) {
        $content = $elements->item(0)->textContent;
        $s = trim($content);
        $array = explode(" ",$s);
        $id = strval($array[1]);
    } else {
        return false;
    }

    // getting title
    $selector = "/html/body/div/div[2]/div[2]/div[3]/div[2]/div[1]/div[2]/h4";
    $elements = $xpath->query($selector);
    if ($elements && $elements->length > 0) {
        $content = $elements->item(0)->textContent;
        $title = $content;
    }

    //gettig price
    $selector = "/html/body/div[1]/div[2]/div[2]/div[3]/div[2]/div[1]/div[3]/div/div/h3";
    $elements = $xpath->query($selector);
    if ($elements && $elements->length > 0) {
        $content = $elements->item(0)->textContent;
        return [
            "id"=> $id,
            "title"=> $title,
            "price" => trim($content),
            ];
    } else {
        return false;
    }
}

function processOnlyPrice($html): string|bool
{

    $dom = new DOMDocument;
    @$dom->loadHTML($html);
    @$xpath = new DOMXPath($dom);

    $selector = "/html/body/div[1]/div[2]/div[2]/div[3]/div[2]/div[1]/div[3]/div/div/h3";
    $elements = $xpath->query($selector);
    if ($elements && $elements->length > 0) {
        $content = $elements->item(0)->textContent;
        return trim($content);
    } else {
        return false;
    }
}

//echo processOnlyPrice(file_get_contents('https://www.olx.ua/d/uk/obyavlenie/mototsikl-tekken-250-IDMCsTV.html'))
?>
