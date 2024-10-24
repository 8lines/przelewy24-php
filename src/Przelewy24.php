<?php

namespace Przelewy24;

use Przelewy24\Api\Requests\CardRequests;
use Przelewy24\Api\Requests\PaymentRequests;
use Przelewy24\Api\Requests\TestRequests;
use Przelewy24\Api\Requests\TransactionRequests;
use Przelewy24\Enums\Environment;

class Przelewy24
{
    private Config $config;

    public function __construct(
        int $merchantId,
        string $reportsKey,
        string $crc,
        Environment $environment = Environment::SANDBOX,
        ?string $posId = null,
    ) {
        $this->config = new Config(
            merchantId: $merchantId,
            reportsKey: $reportsKey,
            crc: $crc,
            environment: $environment,
            posId: $posId,
        );
    }

    public static function createSignature(array $parameters): string
    {
        $json = json_encode($parameters, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return hash('sha384', $json);
    }

    public function tests(): TestRequests
    {
        return new TestRequests($this->config);
    }

    public function payments(): PaymentRequests
    {
        return new PaymentRequests($this->config);
    }

    public function transactions(): TransactionRequests
    {
        return new TransactionRequests($this->config);
    }

    public function cards(): CardRequests
    {
        return new CardRequests($this->config);
    }

    public function handleWebhook(array $requestData): TransactionStatusNotification
    {
        return new TransactionStatusNotification($this->config, $requestData);
    }

    public function handleRefundWebhook(array $requestData): RefundNotification
    {
        return new RefundNotification($this->config, $requestData);
    }
}
