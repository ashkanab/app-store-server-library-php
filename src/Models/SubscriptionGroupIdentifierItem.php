<?php

namespace AshkanAb\AppStore\Models;


class SubscriptionGroupIdentifierItem extends BaseModel
{
    private int $subscriptionGroupIdentifier;

    private array $lastTransactions;

    /**
     * @return int
     */
    public function getSubscriptionGroupIdentifier(): int
    {
        return $this->subscriptionGroupIdentifier;
    }

    /**
     * @param int $subscriptionGroupIdentifier
     */
    public function setSubscriptionGroupIdentifier(int $subscriptionGroupIdentifier): void
    {
        $this->subscriptionGroupIdentifier = $subscriptionGroupIdentifier;
    }

    /**
     * @return LastTransactionsItem[]
     */
    public function getLastTransactions(): array
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