<?php

class Price
{
    private string $rawPrice;
    private string $currency;
    private string $amount;

    function __construct(string $rawPrice)
    {
        $rawPrice = trim($rawPrice);
        $this->rawPrice = $rawPrice;
        $array = explode(" ", $rawPrice);
        $this->currency = $array[sizeof($array) - 1];
        array_pop($array);
        $this->amount = implode("", $array);
    }

    function __invoke()
    {
        return $this->rawPrice;
    }

    function isEqual(Price $b): bool
    {
        if ($this->rawPrice === $b()) return true;
        return false;
    }
}

//new Price('120 000 $');