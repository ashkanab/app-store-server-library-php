<?php

namespace AshkanAb\AppStore\Models;

use DateTime;

class JWSTransactionDecoded extends BaseModel
{
    private ?string $appAccountToken;

    private string $currency;

    private string $bundleId;

    private string $environment;

    private ?DateTime $expiresDate;

    private string $inAppOwnershipType;

    private bool $isUpgraded = false;

    private ?string $offerDiscountType;

    private ?string $offerIdentifier;

    private ?string $offerType;

    private DateTime $originalPurchaseDate;

    private string $originalTransactionId;

    private int $price;

    private string $productId;

    private DateTime $purchaseDate;

    private int $quantity;

    private ?DateTime $revocationDate;

    private ?int $revocationReason;

    private DateTime $signedDate;

    private string $storefront;

    private string $storefrontId;

    private string $subscriptionGroupIdentifier;

    private string $transactionId;

    private string $transactionReason;

    private string $type;


    public function __construct(string $signedTransactionInfo)
    {
        parent::__construct(
            json_decode(base64UrlDecode(explode('.', $signedTransactionInfo)[1]), true)
        );
    }

    public function isSubscription(): bool
    {
        return $this->type === 'Auto-Renewable Subscription' || $this->type === 'Non-Renewing Subscription';
    }

    public function isConsumable(): bool
    {
        return $this->type === 'Consumable';
    }

    public function isNonConsumable(): bool
    {
        return $this->type === 'Non-Consumable';
    }

    public function isExpired(): bool
    {
        if($this->expiresDate) {
            return $this->expiresDate < new DateTime();
        }

        return false;
    }


    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
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
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getInAppOwnershipType(): string
    {
        return $this->inAppOwnershipType;
    }

    /**
     * @param string $inAppOwnershipType
     */
    public function setInAppOwnershipType(string $inAppOwnershipType): void
    {
        $this->inAppOwnershipType = $inAppOwnershipType;
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
    public function getTransactionReason(): string
    {
        return $this->transactionReason;
    }

    /**
     * @param string $transactionReason
     */
    public function setTransactionReason(string $transactionReason): void
    {
        $this->transactionReason = $transactionReason;
    }

    /**
     * @return string
     */
    public function getStorefront(): string
    {
        return $this->storefront;
    }

    /**
     * @param string $storefront
     */
    public function setStorefront(string $storefront): void
    {
        $this->storefront = $storefront;
    }

    /**
     * @return string
     */
    public function getStorefrontId(): string
    {
        return $this->storefrontId;
    }

    /**
     * @param string $storefrontId
     */
    public function setStorefrontId(string $storefrontId): void
    {
        $this->storefrontId = $storefrontId;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getAppAccountToken(): string|null
    {
        return $this->appAccountToken;
    }

    /**
     * @param string $appAccountToken
     */
    public function setAppAccountToken(?string $appAccountToken): void
    {
        $this->appAccountToken = $appAccountToken;
    }

    /**
     * @return DateTime
     */
    public function getExpiresDate(): ?DateTime
    {
        return $this->expiresDate;
    }

    /**
     * @param int $expiresDate
     */
    public function setExpiresDate(?int $expiresDate): void
    {
        if ($expiresDate) {
            $this->expiresDate = (new DateTime())->setTimestamp($expiresDate / 1000);
            return;
        }
        $this->expiresDate = null;
    }

    /**
     * @return string
     */
    public function getOfferDiscountType(): string|null
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
     * @return string
     */
    public function getOfferIdentifier(): string|null
    {
        return $this->offerIdentifier;
    }

    /**
     * @param string $offerIdentifier
     */
    public function setOfferIdentifier(?string $offerIdentifier): void
    {
        $this->offerIdentifier = $offerIdentifier;
    }

    /**
     * @return string
     */
    public function getOfferType(): string|null
    {
        return $this->offerType;
    }

    /**
     * @param string $offerType
     */
    public function setOfferType(?string $offerType): void
    {
        $this->offerType = $offerType;
    }

    /**
     * @return DateTime
     */
    public function getRevocationDate(): DateTime|null
    {
        return $this->revocationDate;
    }

    /**
     * @param int|null $revocationDate
     */
    public function setRevocationDate(?int $revocationDate): void
    {
        if ($revocationDate) {
            $this->revocationDate = (new DateTime())->setTimestamp($revocationDate / 1000);
            return;
        }

        $this->revocationDate = null;
    }

    /**
     * @return int
     */
    public function getRevocationReason(): ?int
    {
        return $this->revocationReason;
    }

    /**
     * @param int|null $revocationReason
     */
    public function setRevocationReason(?int $revocationReason): void
    {
        $this->revocationReason = $revocationReason;
    }

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
     * @return DateTime
     */
    public function getOriginalPurchaseDate(): DateTime
    {
        return $this->originalPurchaseDate;
    }

    /**
     * @param int $originalPurchaseDate
     */
    public function setOriginalPurchaseDate(int $originalPurchaseDate): void
    {
        $this->originalPurchaseDate = (new DateTime())->setTimestamp($originalPurchaseDate / 1000);
    }

    /**
     * @return DateTime
     */
    public function getPurchaseDate(): DateTime
    {
        return $this->purchaseDate;
    }

    /**
     * @param int $purchaseDate
     */
    public function setPurchaseDate(int $purchaseDate): void
    {
        $this->purchaseDate = (new DateTime())->setTimestamp($purchaseDate / 1000);
    }

    /**
     * @return DateTime
     */
    public function getSignedDate(): DateTime
    {
        return $this->signedDate;
    }

    /**
     * @param int $signedDate
     */
    public function setSignedDate(int $signedDate): void
    {
        $this->signedDate = (new DateTime())->setTimestamp($signedDate / 1000);
    }

    /**
     * @return bool|null
     */
    public function getIsUpgraded(): bool
    {
        return $this->isUpgraded;
    }

    /**
     * @param bool|null $isUpgraded
     */
    public function setIsUpgraded(bool $isUpgraded = false): void
    {
        $this->isUpgraded = $isUpgraded;
    }
}
