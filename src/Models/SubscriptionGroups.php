<?php

namespace AshkanAb\AppStore\Models;

class SubscriptionGroups extends BaseModel
{
    /**
     * @var SubscriptionGroupIdentifierItem[]
     */
    private ?array $items = null;


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

    /**
     * @param array|null $items
     */
    public function setItems(?array $items): void
    {
        if(is_null($items)) {
            return;
        }
        foreach ($items as $value) {
            $this->items[] = new SubscriptionGroupIdentifierItem($value);
        }
    }
}
