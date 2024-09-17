<?php

namespace AshkanAb\AppStore\Models;

class SubscriptionGroups
{

    public function __construct(array $data = [])
    {
        foreach ($data as $value) {
            $this->items[] = new SubscriptionGroupIdentifierItem($value);
        }
    }

    /**
     * @var SubscriptionGroupIdentifierItem[]
     */
    private ?array $items = [];


    /**
     * @return SubscriptionGroupIdentifierItem[]
     */
    public function getSubscriptionGroups(): array
    {
        return $this->items;
    }


    /**
     * @param string $groupIdentifier
     * @return LastTransactionsItem[]|null
     */
    public function getLastTransactions(string $groupIdentifier): ?array
    {
        foreach ($this->items as $item) {
            if ($item->getSubscriptionGroupIdentifier() === $groupIdentifier) {
                return $item->getLastTransactions();
            }
        }

        return null;
    }

}
