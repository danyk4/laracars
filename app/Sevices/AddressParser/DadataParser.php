<?php

namespace App\Sevices\AddressParser;

use Dadata\DadataClient;

class DadataParser implements ParserInterface
{
    public function __construct(protected DadataClient $dadata)
    {
    }

    public function clean(string $address): array
    {
        // try catch have to
        return $this->dadata->clean("address", $address);
    }
}
