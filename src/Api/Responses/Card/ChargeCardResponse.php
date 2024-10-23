<?php

namespace Przelewy24\Api\Responses\Card;

use Przelewy24\Api\Responses\AbstractResponse;

class ChargeCardResponse extends AbstractResponse
{
    public function orderId(): int
    {
        return $this->parameters['data']['orderId'];
    }
}
