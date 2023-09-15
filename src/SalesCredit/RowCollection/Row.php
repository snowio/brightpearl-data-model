<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit\RowCollection;

class Row
{
    /** @var int|null $productId */
    private $productId;
    /** @var string|null $name */
    private $name;
    /** @var string|null $quantity */
    private $quantity;
    /** @var string|null $taxCode */
    private $taxCode;
    /** @var string|null $net */
    private $net;
    /** @var string|null $tax */
    private $tax;
    /** @var string|null $nominalCode */
    private $nominalCode;
    /** @var string|null $externalRef */
    private $externalRef;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->productId = is_int($json['productId']) ? $json['productId'] : null;
        $result->name = is_string($json['name']) ? $json['name'] : null;
        $result->quantity = is_string($json['quantity']) ? $json['quantity'] : null;
        $result->taxCode = is_string($json['taxCode']) ? $json['taxCode'] : null;
        $result->net = is_string($json['net']) ? $json['net'] : null;
        $result->tax = is_string($json['tax']) ? $json['tax'] : null;
        $result->nominalCode = is_string($json['nominalCode']) ? $json['nominalCode'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'nominalCode' => $this->getNominalCode(),
            'externalRef' => $this->getExternalRef()
        ];
    }

    /**
     * @param int|null $productId
     * @return Row
     */
    public function withProductId(?int $productId): Row
    {
        $result = clone $this;
        $result->productId = $productId;
        return $result;
    }

    /**
     * @param string|null $name
     * @return Row
     */
    public function withName(?string $name):  Row
    {
        $result = clone $this;
        $result->name = $name;
        return $result;
    }

    /**
     * @param string|null $quantity
     * @return Row
     */
    public function withQuantity(?string $quantity):  Row
    {
        $result = clone $this;
        $result->quantity = $quantity;
        return $result;
    }

    /**
     * @param string|null $taxCode
     * @return Row
     */
    public function withTaxCode(?string $taxCode):  Row
    {
        $result = clone $this;
        $result->taxCode = $taxCode;
        return $result;
    }

    /**
     * @param string|null $net
     * @return Row
     */
    public function withNet(?string $net):  Row
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    /**
     * @param string|null $tax
     * @return Row
     */
    public function withTax(?string $tax):  Row
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    /**
     * @param string|null $nominalCode
     * @return Row
     */
    public function withNominalCode(?string $nominalCode):  Row
    {
        $result = clone $this;
        $result->nominalCode = $nominalCode;
        return $result;
    }

    /**
     * @param string|null $externalRef
     * @return Row
     */
    public function withExternalRef(?string $externalRef):  Row
    {
        $result = clone $this;
        $result->externalRef = $externalRef;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @return string|null
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @return string|null
     */
    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }
}
