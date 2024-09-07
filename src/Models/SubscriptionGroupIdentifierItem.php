<?php

namespace AshkanAb\AppStore\Models;


class SubscriptionGroupIdentifierItem extends BaseModel
{
    private string $subscriptionGroupIdentifier;

    private array $lastTransactions;

    /**
     * @return string
     */
    public function getSubscriptionGroupIdentifier(): string
    {
        return $this->subscriptionGroupIdentifier;
    }

    /**
     * @param string $subscriptionGroupIdentifier
     */
    public function setSubscriptionGroupIdentifier(string $subscriptionGroupIdentifier): void
    {
        $this->subscriptionGroupIdentifier = $subscriptionGroupIdentifier;
    }

    /**
     * @return LastTransactionsItem[]
     */
    public function getLastTransactions(): LastTransactionsItem
    {
        return $this->lastTransactions;
    }

    /**
     * @param array $lastTransactions
     */
    public function setLastTransactions(array $lastTransactions): void
    {
        foreach ($lastTransactions as $lastTransaction) {
            $this->lastTransactions[] = new LastTransactionsItem($lastTransaction);
        }
    }
}