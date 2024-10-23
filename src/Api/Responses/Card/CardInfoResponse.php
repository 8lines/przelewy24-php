<?php

namespace Przelewy24\Api\Responses\Card;

use Przelewy24\Api\Responses\AbstractResponse;

class CardInfoResponse extends AbstractResponse
{
    public function refId(): string
    {
        return $this->parameters['data']['refId'];
    }

    public function bin(): int
    {
        return $this->parameters['data']['bin'];
    }

    public function mask(): string
    {
        return $this->parameters['data']['mask'];
    }

    public function cardType(): string
    {
        return $this->parameters['data']['cardType'];
    }

    public function cardDate(): string
    {
        return $this->parameters['data']['cardDate'];
    }

    public function hash(): string
    {
        return $this->parameters['data']['hash'];
    }
}
