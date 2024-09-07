<?php

namespace AshkanAb\AppStore\Models;

use DateTime;

class JWSRenewalDecoded extends BaseModel
{
    private string $autoRenewProductId;

    private int $autoRenewStatus;

    private ?string $currency;

    private ?array $eligibleWinBackOfferIds;

    private string $environment;

    private int $expirationIntent;

    private ?DateTime $gracePeriodExpiresDate;

    private bool $isInBillingRetryPeriod;

    private ?string $offerDiscountType;

    private ?string $offerIdentifier;

    private ?int $offerType;

    private string $originalTransactionId;

    private ?int $priceIncreaseStatus;

    private string $productId;

    private DateTime $recentSubscriptionStartDate;

    private DateTime $renewalDate;

    private ?int $renewalPrice;

    private DateTime $signedDate;


    public function __construct(string $signedRenewalInfo)
    {
        parent::__construct(
            json_decode(base64UrlDecode(explode('.', $signedRenewalInfo)[1]), true)
        );
    }


    /**
     * @return string
     */
    public function getOriginalTransactionId(): string
    {
        return $this->originalTransactionId;
    }

    /**
     * @param string $originalTransactionId
     */
    public function setOriginalTransactionId(string $originalTransactionId): void
    {
        $this->originalTransactionId = $originalTransactionId;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

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
    public function getCurrency(): string | null
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getAutoRenewProductId(): string
    {
        return $this->autoRenewProductId;
    }

    /**
     * @param string $autoRenewProductId
     */
    public function setAutoRenewProductId(string $autoRenewProductId): void
    {
        $this->autoRenewProductId = $autoRenewProductId;
    }

    /**
     * @return int
     */
    public function getAutoRenewStatus(): int
    {
        return $this->autoRenewStatus;
    }

    /**
     * @param int $autoRenewStatus
     */
    public function setAutoRenewStatus(int $autoRenewStatus): void
    {
        $this->autoRenewStatus = $autoRenewStatus;
    }

    /**
     * @return array
     */
    public function getEligibleWinBackOfferIds(): array | null
    {
        return $this->eligibleWinBackOfferIds;
    }

    /**
     * @param array $eligibleWinBackOfferIds
     */
    public function setEligibleWinBackOfferIds(?array $eligibleWinBackOfferIds): void
    {
        $this->eligibleWinBackOfferIds = $eligibleWinBackOfferIds;
    }

    /**
     * @return int
     */
    public function getExpirationIntent(): int
    {
        return $this->expirationIntent;
    }

    /**
     * @param int $expirationIntent
     */
    public function setExpirationIntent(int $expirationIntent): void
    {
        $this->expirationIntent = $expirationIntent;
    }

    /**
     * @return DateTime
     */
    public function getGracePeriodExpiresDate(): DateTime | null
    {
        return $this->gracePeriodExpiresDate;
    }

    /**
     * @param DateTime $gracePeriodExpiresDate
     */
    public function setGracePeriodExpiresDate(?int $gracePeriodExpiresDate): void
    {
        if($gracePeriodExpiresDate) {
            $this->gracePeriodExpiresDate = (new DateTime())->setTimestamp($gracePeriodExpiresDate/ 1000);
            return;
        }

        $this->gracePeriodExpiresDate = null;
    }

    /**
     * @return bool
     */
    public function isInBillingRetryPeriod(): bool
    {
        return $this->isInBillingRetryPeriod;
    }

    /**
     * @param bool $isInBillingRetryPeriod
     */
    public function setIsInBillingRetryPeriod(bool $isInBillingRetryPeriod): void
    {
        $this->isInBillingRetryPeriod = $isInBillingRetryPeriod;
    }

    /**
     * @return string|null
     */
    public function getOfferDiscountType(): string | null
    {
        return $this->offerDiscountType;
    }

    /**
     * @param string|null $offerDiscountType
     */
    public function setOfferDiscountType(?string $offerDiscountType): void
    {
        $this->offerDiscountType = $offerDiscountType;
    }

    /**
     * @return string|null
     */
    public function getOfferIdentifier(): string | null
    {
        return $this->offerIdentifier;
    }

    /**
     * @param string|null $offerIdentifier
     */
    public function setOfferIdentifier(?string $offerIdentifier): void
    {
        $this->offerIdentifier = $offerIdentifier;
    }

    /**
     * @return int|null
     */
    public function getOfferType(): ?int
    {
        return $this->offerType;
    }

    /**
     * @param int|null $offerType
     */
    public function setOfferType(?int $offerType): void
    {
        $this->offerType = $offerType;
    }

    /**
     * @return int|null
     */
    public function getPriceIncreaseStatus(): ?int
    {
        return $this->priceIncreaseStatus;
    }

    /**
     * @param int|null $priceIncreaseStatus
     */
    public function setPriceIncreaseStatus(?int $priceIncreaseStatus): void
    {
        $this->priceIncreaseStatus = $priceIncreaseStatus;
    }

    /**
     * @return DateTime
     */
    public function getRecentSubscriptionStartDate(): DateTime
    {
        return $this->recentSubscriptionStartDate;
    }

    /**
     * @param DateTime $recentSubscriptionStartDate
     */
    public function setRecentSubscriptionStartDate(int $recentSubscriptionStartDate): void
    {
        $this->recentSubscriptionStartDate = (new DateTime())->setTimestamp($recentSubscriptionStartDate/ 1000);
    }

    /**
     * @return DateTime
     */
    public function getRenewalDate(): DateTime
    {
        return $this->renewalDate;
    }

    /**
     * @param DateTime $renewalDate
     */
    public function setRenewalDate(int $renewalDate): void
    {
        $this->renewalDate = (new DateTime())->setTimestamp($renewalDate/ 1000);
    }

    /**
     * @return int|null
     */
    public function getRenewalPrice(): ?int
    {
        return $this->renewalPrice;
    }

    /**
     * @param int|null $renewalPrice
     */
    public function setRenewalPrice(?int $renewalPrice): void
    {
        $this->renewalPrice = $renewalPrice;
    }

    /**
     * @return DateTime
     */
    public function getSignedDate(): DateTime
    {
        return $this->signedDate;
    }

    /**
     * @param DateTime $signedDate
     */
    public function setSignedDate(int $signedDate): void
    {
        $this->signedDate = (new DateTime())->setTimestamp($signedDate/ 1000);
    }
}
