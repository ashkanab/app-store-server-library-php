<?php

namespace AshkanAb\AppStore\Models;

class LastTransactionsItem extends BaseModel
{
    private string $originalTransactionId;

    private int $status;

    private string $signedTransactionInfo;

    private string $signedRenewalInfo;


    public function getDecodedTransactionInfo() : JWSTransactionDecoded
    {
        return new JWSTransactionDecoded($this->getSignedTransactionInfo());
    }

    public function getDecodedRenewalInfo(): JWSRenewalDecoded
    {
        return new JWSRenewalDecoded($this->getSignedRenewalInfo());
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSignedTransactionInfo(): string
    {
        return $this->signedTransactionInfo;
    }

    /**
     * @param string $signedTransactionInfo
     */
    public function setSignedTransactionInfo(string $signedTransactionInfo): void
    {
        $this->signedTransactionInfo = $signedTransactionInfo;
    }

    /**
     * @return string
     */
    public function getSignedRenewalInfo(): string
    {
        return $this->signedRenewalInfo;
    }

    /**
     * @param string $signedRenewalInfo
     */
    public function setSignedRenewalInfo(string $signedRenewalInfo): void
    {
        $this->signedRenewalInfo = $signedRenewalInfo;
    }


    public function isActive(): bool
    {
        return $this->status === 1;
    }
}