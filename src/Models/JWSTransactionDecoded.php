<?php

namespace AppStore\Models;

class JWSTransactionDecoded extends BaseModel
{
    private string $transactionId;
    private string $originalTransactionId;
    private string $bundleId;
    private string $productId;
    private int $purchaseDate;
    private int $originalPurchaseDate;
    private int $quantity;
    private string $type;
    private string $inAppOwnershipType;
    private int $signedDate;
    private string $environment;
    private string $transactionReason;
    private string $storefront;
    private string $storefrontId;
    private int $price;
    private string $currency;


    public function __construct(string $signedTransactionInfo)
    {
        parent::__construct(
            json_decode(base64UrlDecode(explode('.', $signedTransactionInfo)[1]), true)
        );
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
    public function getPurchaseDate(): int
    {
        return $this->purchaseDate;
    }

    /**
     * @param int $purchaseDate
     */
    public function setPurchaseDate(int $purchaseDate): void
    {
        $this->purchaseDate = $purchaseDate;
    }

    /**
     * @return int
     */
    public function getOriginalPurchaseDate(): int
    {
        return $this->originalPurchaseDate;
    }

    /**
     * @param int $originalPurchaseDate
     */
    public function setOriginalPurchaseDate(int $originalPurchaseDate): void
    {
        $this->originalPurchaseDate = $originalPurchaseDate;
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
     * @return int
     */
    public function getSignedDate(): int
    {
        return $this->signedDate;
    }

    /**
     * @param int $signedDate
     */
    public function setSignedDate(int $signedDate): void
    {
        $this->signedDate = $signedDate;
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
}
