<?php

namespace App\Sevices\AddressParser;

interface ParserInterface
{
    public function clean(string $address): array;
}
