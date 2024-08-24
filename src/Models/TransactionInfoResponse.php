<?php

namespace AppStore\Models;

class TransactionInfoResponse extends BaseModel
{
    private string $signedTransactionInfo;

    public function getDecodedTransactionInfo() : JWSTransactionDecoded
    {
        return new JWSTransactionDecoded($this->getSignedTransactionInfo());
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
}
