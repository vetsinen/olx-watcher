<?php

class Price
{
    public string $rawPrice;
    public string $currency;
    public string $amount;

    function __construct(string $rawPrice)
    {
        $rawPrice = trim($rawPrice);
        $this->rawPrice = $rawPrice;
        $array = explode(" ", $rawPrice);
        $this->currency = $array[sizeof($array) - 1];
        array_pop($array);
        $this->amount = implode("", $array);
    }

    function isEqual(Price $b): bool
    {
        if ($this->rawPrice === $b->rawPrice) return true;
        if ($this->currency!==$b->currency) return false;
        if ($this->amount===$b->amount AND $this->currency===$b->currency) return true;
        return false;
    }

    function __invoke()
    {
        return $this->rawPrice;
    }
}