<?php

namespace SnowIO\BrightpearlDataModel\Product\Composition;

use SnowIO\BrightpearlDataModel\ModelInterface;

class BundleComponent implements ModelInterface
{
    /** @var int|null $productId */
    private $productId;
    /** @var int|null $productQuantity */
    private $productQuantity;
    /** @var string|null $sku */
    private $sku;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->productId = $json['productId'] ?? null;
        $result->productQuantity = $json['productQuantity'] ?? null;
        $result->sku = $json['sku'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'productQuantity' => $this->getProductQuantity(),
            'sku' => $this->getSku()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof BundleComponent &&
            $this->productId === $other->productId &&
            $this->productQuantity === $other->productQuantity &&
            $this->sku === $other->sku;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function withProductId(int $productId): BundleComponent
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    public function getProductQuantity(): ?int
    {
        return $this->productQuantity;
    }

    public function withProductQuantity(int $productQuantity): BundleComponent
    {
        $clone = clone $this;
        $clone->productQuantity = $productQuantity;
        return $clone;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function withSku(string $sku): BundleComponent
    {
        $clone = clone $this;
        $clone->sku = $sku;
        return $clone;
    }
}
