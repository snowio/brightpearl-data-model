<?php

namespace SnowIO\BrightpearlDataModel\Order;

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
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->productId = is_numeric($json['productId']) ? (int)$json['productId'] : null;
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
            'name' => $this->getExternalRef(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'nominalCode' => $this->getNominalCode(),
            'externalRef' => $this->getExternalRef()
        ];
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return Row
     */
    public function withProductId(int $productId): Row
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Row
     */
    public function withName(string $name): Row
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     * @return Row
     */
    public function withQuantity(string $quantity): Row
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @param string $taxCode
     * @return Row
     */
    public function withTaxCode(string $taxCode): Row
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @param string|null $net
     * @return Row
     */
    public function withNet(?string $net): Row
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @param string|null $tax
     * @return Row
     */
    public function withTax(?string $tax): Row
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    /**
     * @param string|null $nominalCode
     * @return Row
     */
    public function withNominalCode(?string $nominalCode): Row
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    /**
     * @param string|null $externalRef
     * @return Row
     */
    public function withExternalRef(?string $externalRef): Row
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }
}
