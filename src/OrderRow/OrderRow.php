<?php

namespace SnowIO\BrightpearlDataModel\OrderRow;

use SnowIO\BrightpearlDataModel\ModelInterface;

class OrderRow implements ModelInterface
{
    /** @var int|null $productId */
    protected $productId;
    /** @var string|null $productName */
    protected $productName;
    /** @var string|null $quantity */
    protected $quantity;
    /** @var string|null $nominalCode */
    protected $nominalCode;
    /** @var RowValue|null $rowValue */
    protected $rowValue;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->rowValue = RowValue::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->productId = $json['productId'] ?? null;
        $result->productName = $json['productName'] ?? null;
        $result->quantity = $json['quantity']['magnitude'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->rowValue = RowValue::fromJson($json['rowValue'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'productName' => $this->getProductName(),
            'quantity' => $this->quantity ? ["magnitude" => $this->quantity] : null,
            'nominalCode' => $this->getNominalCode(),
            'rowValue' => $this->rowValue ? $this->rowValue->toJson() : null,
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof OrderRow &&
            $this->productId === $other->productId &&
            $this->productName === $other->productName &&
            $this->quantity === $other->quantity &&
            $this->rowValue->equals($other->rowValue) &&
            $this->nominalCode === $other->nominalCode;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function withProductId(int $productId): OrderRow
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function withProductName(?string $productName): OrderRow
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function withQuantity(string $quantity): OrderRow
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    public function withNominalCode(?string $nominalCode): OrderRow
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    public function getRowValue(): ?RowValue
    {
        return $this->rowValue;
    }

    public function withRowValue(?RowValue $rowValue): OrderRow
    {
        $clone = clone $this;
        $clone->rowValue = $rowValue;
        return $clone;
    }
}
