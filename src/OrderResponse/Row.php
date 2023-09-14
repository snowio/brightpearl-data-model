<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\OrderResponse\Row\Amount;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\Composition;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\Quantity;
use SnowIO\BrightpearlDataModel\OrderResponse\Row\RowValue;

class Row
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

        $quantity = is_array($json['quantity']) ? $json['quantity'] : [];
        $itemCost = is_array($json['itemCost']) ? $json['itemCost'] : [];
        $productPrice = is_array($json['productPrice']) ? $json['productPrice'] : [];
        $rowValue = is_array($json['rowValue']) ? $json['rowValue'] : [];
        $composition = is_array($json['composition']) ? $json['composition'] : [];

        $result->orderRowSequence = is_string($json['orderRowSequence']) ? $json['orderRowSequence'] : null;
        $result->productId = is_numeric($json['productId']) ? (int) $json['productId'] : null;
        $result->productName = is_string($json['productName']) ? $json['productName'] : null;
        $result->productSku = is_string($json['productSku']) ? $json['productSku'] : null;
        $result->quantity = Quantity::fromJson($quantity);
        $result->itemCost = Amount::fromJson($itemCost);
        $result->productPrice = Amount::fromJson($productPrice);
        $result->discountPercentage = is_string($json['discountPercentage']) ? $json['discountPercentage'] : null;
        $result->rowValue = RowValue::fromJson($rowValue);
        $result->nominalCode = is_string($json['nominalCode']) ? $json['nominalCode'] : null;
        $result->composition = Composition::fromJson($composition);
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->clonedFromId = is_numeric($json['clonedFromId']) ? (int) $json['clonedFromId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $quantity = is_null($this->getQuantity()) ? [] : $this->getQuantity()->toJson();
        $itemCost = is_null($this->getItemCost()) ? [] : $this->getItemCost()->toJson();
        $productPrice = is_null($this->getProductPrice()) ? [] : $this->getProductPrice()->toJson();
        $rowValue = is_null($this->getRowValue()) ? [] : $this->getRowValue()->toJson();
        $composition = is_null($this->getComposition()) ? [] : $this->getComposition()->toJson();

        return [
            'orderRowSequence' => $this->getOrderRowSequence(),
            'productId' => $this->getProductId(),
            'productName' => $this->getProductName(),
            'productSku' => $this->getProductSku(),
            'quantity' => $quantity,
            'itemCost' => $itemCost,
            'productPrice' => $productPrice,
            'discountPercentage' => $this->getDiscountPercentage(),
            'rowValue' => $rowValue,
            'nominalCode' => $this->getNominalCode(),
            'composition' => $composition,
            'externalRef' => $this->getExternalRef(),
            'clonedFromId' => $this->getClonedFromId()
        ];
    }

    /**
     * @return string|null
     */
    public function getOrderRowSequence(): ?string
    {
        return $this->orderRowSequence;
    }

    /**
     * @param string $orderRowSequence
     * @return Row
     */
    public function withOrderRowSequence(string $orderRowSequence): Row
    {
        $clone = clone $this;
        $clone->orderRowSequence = $orderRowSequence;
        return $clone;
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
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return Row
     */
    public function withProductName(string $productName): Row
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getProductSku(): ?string
    {
        return $this->productSku;
    }

    /**
     * @param string $productSku
     * @return Row
     */
    public function withProductSku(string $productSku): Row
    {
        $clone = clone $this;
        $clone->productSku = $productSku;
        return $clone;
    }

    /**
     * @return Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @param Quantity $quantity
     * @return Row
     */
    public function withQuantity(Quantity $quantity): Row
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    /**
     * @return Amount|null
     */
    public function getItemCost(): ?Amount
    {
        return $this->itemCost;
    }

    /**
     * @param Amount $itemCost
     * @return Row
     */
    public function withItemCost(Amount $itemCost): Row
    {
        $clone = clone $this;
        $clone->itemCost = $itemCost;
        return $clone;
    }

    /**
     * @return Amount|null
     */
    public function getProductPrice(): ?Amount
    {
        return $this->productPrice;
    }

    /**
     * @param Amount $productPrice
     * @return Row
     */
    public function withProductPrice(Amount $productPrice): Row
    {
        $clone = clone $this;
        $clone->productPrice = $productPrice;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    /**
     * @param string $discountPercentage
     * @return Row
     */
    public function withDiscountPercentage(string $discountPercentage): Row
    {
        $clone = clone $this;
        $clone->discountPercentage = $discountPercentage;
        return $clone;
    }

    /**
     * @return RowValue|null
     */
    public function getRowValue(): ?RowValue
    {
        return $this->rowValue;
    }

    /**
     * @param RowValue $rowValue
     * @return Row
     */
    public function withRowValue(RowValue $rowValue): Row
    {
        $clone = clone $this;
        $clone->rowValue = $rowValue;
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
     * @param string $nominalCode
     * @return Row
     */
    public function withNominalCode(string $nominalCode): Row
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    /**
     * @return Composition|null
     */
    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    /**
     * @param Composition $composition
     * @return Row
     */
    public function withComposition(Composition $composition): Row
    {
        $clone = clone $this;
        $clone->composition = $composition;
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

    /**
     * @return int|null
     */
    public function getClonedFromId(): ?int
    {
        return $this->clonedFromId;
    }

    /**
     * @param int|null $clonedFromId
     * @return Row
     */
    public function withClonedFromId(?int $clonedFromId): Row
    {
        $clone = clone $this;
        $clone->clonedFromId = $clonedFromId;
        return $clone;
    }
}
