<?php

namespace Przelewy24\Api\Responses\Card;

use Przelewy24\Api\Responses\AbstractResponse;

class ChargeCardWith3dsResponse extends AbstractResponse
{
    public function orderId(): int
    {
        return $this->parameters['data']['orderId'];
    }

    public function redirectUrl(): string
    {
        return $this->parameters['data']['redirectUrl'];
    }
}
