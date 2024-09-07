<?php

namespace AshkanAb\AppStore;

use AshkanAb\AppStore\Models\Subscriptions;
use AshkanAb\AppStore\Models\TransactionInfo;

readonly class Client
{
    public function __construct(private Http $http)
    {
    }


    public function transactionHistory(string $transactionId, array $options = [])
    {
        return $this->http->get(
            'inApps/v2/history/'. $transactionId,
            $options
        );
    }

    public function getTransactionInfo(string $transactionId): TransactionInfo
    {
        return new TransactionInfo(
            $this->http->get('inApps/v1/transactions/'. $transactionId)
        );
    }

    public function getSubscriptions(string $transactionId, array $options = []): Subscriptions
    {
        return new Subscriptions(
            $this->http->get('inApps/v1/subscriptions/'. $transactionId, $options)
        );
    }
}
