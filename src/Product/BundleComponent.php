<?php

namespace SnowIO\BrightpearlDataModel\Product;

class BundleComponent
{
    /** @var int $productId  */
    private $productId;
    /** @var int $productQuantity */
    private $productQuantity;
    /** @var string $sku */
    private $sku;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->productId = $json['productId'];
        $result->productQuantity = $json['productQuantity'];
        $result->sku = $json['sku'] ?? null;
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['productId'] = $this->productId;
        $json['productQuantity'] = $this->productQuantity;
        $json['sku'] = $this->sku;
        return $json;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return BundleComponent
     */
    public function withProductId(int $productId): BundleComponent
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    /**
     * @return int
     */
    public function getProductQuantity(): int
    {
        return $this->productQuantity;
    }

    /**
     * @param int $productQuantity
     * @return BundleComponent
     */
    public function withProductQuantity(int $productQuantity): BundleComponent
    {
        $clone = clone $this;
        $clone->productQuantity = $productQuantity;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return BundleComponent
     */
    public function withSku(string $sku): BundleComponent
    {
        $clone = clone $this;
        $clone->sku = $sku;
        return $clone;
    }
}
