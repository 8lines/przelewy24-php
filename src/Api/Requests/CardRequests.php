<?php

namespace Przelewy24\Api\Requests;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use Przelewy24\Api\Api;
use Przelewy24\Api\Responses\Card\CardInfoResponse;
use Przelewy24\Api\Responses\Card\ChargeCardResponse;
use Przelewy24\Api\Responses\Card\ChargeCardWith3dsResponse;
use Przelewy24\Exceptions\Przelewy24Exception;

class CardRequests extends Api
{
    public function info(int $orderId): CardInfoResponse
    {
        try {
            $response = $this->client()->get("api/v1/card/info/{$orderId}");

            return CardInfoResponse::fromResponse($response);
        } catch (BadResponseException $exception) {
            throw Przelewy24Exception::fromBadResponseException($exception);
        }
    }

    public function charge(string $token): ChargeCardResponse
    {
        try {
            $response = $this->client()->post('api/v1/card/charge', [
                RequestOptions::JSON => ['token' => $token],
            ]);

            return ChargeCardResponse::fromResponse($response);
        } catch (BadResponseException $exception) {
            throw Przelewy24Exception::fromBadResponseException($exception);
        }
    }

    public function chargeWith3ds(string $token): ChargeCardWith3dsResponse
    {
        try {
            $response = $this->client()->post('api/v1/card/chargeWith3ds', [
                RequestOptions::JSON => ['token' => $token],
            ]);

            return ChargeCardWith3dsResponse::fromResponse($response);
        } catch (BadResponseException $exception) {
            throw Przelewy24Exception::fromBadResponseException($exception);
        }
    }
}
