<?php

namespace AshkanAb\AppStore\Models;



class Subscriptions extends BaseModel
{
    private string $environment;

    private string $bundleId;

    private ?int $appAppleId;

    private SubscriptionGroups $data;

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    /**
     * @return string
     */
    public function getBundleId(): string
    {
        return $this->bundleId;
    }

    /**
     * @param string $bundleId
     */
    public function setBundleId(string $bundleId): void
    {
        $this->bundleId = $bundleId;
    }

    /**
     * @return string
     */
    public function getAppAppleId(): ?int
    {
        return $this->appAppleId;
    }

    /**
     * @param int|null $appAppleId
     */
    public function setAppAppleId(?int $appAppleId): void
    {
        $this->appAppleId = $appAppleId;
    }

    /**
     * @return array
     */
    public function getData(): SubscriptionGroups
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = new SubscriptionGroups($data);
    }



    public function hasActiveSubscription(): bool
    {
        foreach ($this->data->getSubscriptionGroups() as $subscriptionGroup) {
            foreach ($subscriptionGroup->getLastTransactions() as $lastTransaction) {
                if ($lastTransaction->isActive()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @return SubscriptionGroupIdentifierItem[]
     */
    public function getActiveSubscriptions(): array
    {
        $activeSubs = [];

        foreach ($this->data->getSubscriptionGroups() as $subscriptionGroup) {
            foreach ($subscriptionGroup->getLastTransactions() as $lastTransaction) {
                if ($lastTransaction->isActive()) {
                    $activeSubs[] = $subscriptionGroup;
                }
            }
        }

        return $activeSubs;
    }
}