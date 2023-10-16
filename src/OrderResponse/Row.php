<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\Amount;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\Composition;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\Quantity;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\RowValue;

class Row implements ModelInterface
{
    /** @var string|null $orderRowSequence */
    private $orderRowSequence;
    /** @var int|null $productId */
    private $productId;
    /** @var string|null $productName */
    private $productName;
    /** @var string|null $productSku */
    private $productSku;
    /** @var Quantity|null */
    private $quantity;
    /** @var Amount|null $itemCost */
    private $itemCost;
    /** @var Amount|null $productPrice */
    private $productPrice;
    /** @var string|null $discountPercentage */
    private $discountPercentage;
    /** @var RowValue|null $rowValue */
    private $rowValue;
    /** @var string|null $nominalCode */
    private $nominalCode;
    /** @var Composition|null $composition */
    private $composition;
    /** @var null|string $externalRef */
    private $externalRef;
    /** @var int|null $clonedFromId */
    private $clonedFromId;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->quantity = Quantity::create();
        $this->itemCost = Amount::create();
        $this->productPrice = Amount::create();
        $this->rowValue = RowValue::create();
        $this->composition = Composition::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->orderRowSequence = $json['orderRowSequence'] ?? null;
        $result->productId = $json['productId'] ?? null;
        $result->productName = $json['productName'] ?? null;
        $result->productSku = $json['productSku'] ?? null;
        $result->quantity = Quantity::fromJson($json['quantity'] ?? []);
        $result->itemCost = Amount::fromJson($json['itemCost'] ?? []);
        $result->productPrice = Amount::fromJson($json['productPrice'] ?? []);
        $result->discountPercentage = $json['discountPercentage'] ?? null;
        $result->rowValue = RowValue::fromJson($json['rowValue'] ?? []);
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->composition = Composition::fromJson($json['composition'] ?? []);
        $result->externalRef = $json['externalRef'] ?? null;
        $result->clonedFromId = $json['clonedFromId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderRowSequence' => $this->getOrderRowSequence(),
            'productId' => $this->getProductId(),
            'productName' => $this->getProductName(),
            'productSku' => $this->getProductSku(),
            'quantity' => $this->getQuantity() ? $this->getQuantity()->toJson() : null,
            'itemCost' => $this->getItemCost() ? $this->getItemCost()->toJson() : null,
            'productPrice' => $this->getProductPrice() ? $this->getProductPrice()->toJson() : null,
            'discountPercentage' => $this->getDiscountPercentage(),
            'rowValue' => $this->getRowValue() ? $this->getRowValue()->toJson() : null,
            'nominalCode' => $this->getNominalCode(),
            'composition' => $this->getComposition() ? $this->getComposition()->toJson() : null,
            'externalRef' => $this->getExternalRef(),
            'clonedFromId' => $this->getClonedFromId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Row &&
            $this->orderRowSequence === $other->orderRowSequence &&
            $this->productId === $other->productId &&
            $this->productName === $other->productName &&
            $this->productSku === $other->productSku &&
            $this->quantity->equals($other->quantity) &&
            $this->itemCost->equals($other->itemCost) &&
            $this->productPrice->equals($other->productPrice) &&
            $this->discountPercentage === $other->discountPercentage &&
            $this->rowValue->equals($other->rowValue) &&
            $this->nominalCode === $other->nominalCode &&
            $this->composition->equals($other->composition) &&
            $this->externalRef === $other->externalRef &&
            $this->clonedFromId === $other->clonedFromId;
    }

    public function getOrderRowSequence(): ?string
    {
        return $this->orderRowSequence;
    }

    public function withOrderRowSequence(string $orderRowSequence): Row
    {
        $clone = clone $this;
        $clone->orderRowSequence = $orderRowSequence;
        return $clone;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function withProductId(int $productId): Row
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function withProductName(string $productName): Row
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    public function getProductSku(): ?string
    {
        return $this->productSku;
    }

    public function withProductSku(string $productSku): Row
    {
        $clone = clone $this;
        $clone->productSku = $productSku;
        return $clone;
    }

    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    public function withQuantity(Quantity $quantity): Row
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    public function getItemCost(): ?Amount
    {
        return $this->itemCost;
    }

    public function withItemCost(Amount $itemCost): Row
    {
        $clone = clone $this;
        $clone->itemCost = $itemCost;
        return $clone;
    }

    public function getProductPrice(): ?Amount
    {
        return $this->productPrice;
    }

    public function withProductPrice(Amount $productPrice): Row
    {
        $clone = clone $this;
        $clone->productPrice = $productPrice;
        return $clone;
    }

    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    public function withDiscountPercentage(string $discountPercentage): Row
    {
        $clone = clone $this;
        $clone->discountPercentage = $discountPercentage;
        return $clone;
    }

    public function getRowValue(): ?RowValue
    {
        return $this->rowValue;
    }

    public function withRowValue(RowValue $rowValue): Row
    {
        $clone = clone $this;
        $clone->rowValue = $rowValue;
        return $clone;
    }

    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    public function withNominalCode(string $nominalCode): Row
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function withComposition(Composition $composition): Row
    {
        $clone = clone $this;
        $clone->composition = $composition;
        return $clone;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function withExternalRef(?string $externalRef): Row
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function getClonedFromId(): ?int
    {
        return $this->clonedFromId;
    }

    public function withClonedFromId(?int $clonedFromId): Row
    {
        $clone = clone $this;
        $clone->clonedFromId = $clonedFromId;
        return $clone;
    }
}
