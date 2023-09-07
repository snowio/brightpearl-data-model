<?php

namespace SnowIO\BrightpearlDataModel\Product\Composition;

class BundleComponent
{
    /** @var int|null $productId  */
    private $productId;
    /** @var int|null $productQuantity */
    private $productQuantity;
    /** @var string|null $sku */
    private $sku;

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

        $result->productId = is_numeric($json['productId']) ? (int) $json['productId'] : null;
        $result->productQuantity = is_numeric($json['productQuantity']) ? (int) $json['productQuantity'] : null;
        $result->sku = is_string($json['sku']) ? $json['sku'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'productQuantity' => $this->getProductQuantity(),
            'sku' => $this->getSku()
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
     * @return BundleComponent
     */
    public function withProductId(int $productId): BundleComponent
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getProductQuantity(): ?int
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
