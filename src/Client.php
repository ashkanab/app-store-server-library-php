<?php

namespace AppStore;


use AppStore\Models\TransactionInfoResponse;

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

    public function transactionInfo(string $transactionId): TransactionInfoResponse
    {
        return new TransactionInfoResponse(
            $this->http->get('inApps/v1/transactions/'. $transactionId)
        );
    }

    public function subscriptions(string $transactionId, array $options = [])
    {
        return $this->http->get('inApps/v1/subscriptions/'. $transactionId, $options);
    }
}
