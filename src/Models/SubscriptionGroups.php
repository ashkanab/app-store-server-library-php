<?php

namespace AshkanAb\AppStore\Models;

class SubscriptionGroups extends BaseModel
{
    private array $items;


    public function __construct(array $data = [])
    {
        foreach ($data as $value) {
            $this->items[] = new SubscriptionGroupIdentifierItem($value);
        }

        parent::__construct([]);
    }

    /**
     * @return SubscriptionGroupIdentifierItem[]
     */
    public function getSubscriptionGroups(): array
    {
        return $this->items;
    }


    /**
     * @param string $groupIdentifier
     * @return LastTransactionsItem[]
     */
    public function getLastTransactions(string $groupIdentifier): array
    {
        foreach ($this->items as $item) {
            if ($item->getSubscriptionGroupIdentifier() === $groupIdentifier) {
                return $item->getLastTransactions();
            }
        }
    }
}
