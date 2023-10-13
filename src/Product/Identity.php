<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Identity implements ModelInterface
{
    /** @var string|null $sku */
    private $sku;
    /** @var string|null $isbn */
    private $isbn;
    /** @var string|null $ean */
    private $ean;
    /** @var string|null $upc */
    private $upc;
    /** @var string|null $mpn */
    private $mpn;
    /** @var string|null $barcode */
    private $barcode;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->sku = $json['sku'] ?? null;
        $result->isbn = $json['isbn'] ?? null;
        $result->ean = $json['ean'] ?? null;
        $result->upc = $json['upc'] ?? null;
        $result->mpn =  $json['mpn'] ?? null;
        $result->barcode =$json['barcode'] ?? null;
        return $result;
    }

    public function equals($other): bool
    {
        return $other instanceof Identity &&
            $this->sku === $other->sku &&
            $this->isbn === $other->isbn &&
            $this->ean === $other->ean &&
            $this->upc === $other->upc &&
            $this->mpn === $other->mpn &&
            $this->barcode === $other->barcode;
    }

    public function toJson(): array
    {
        return [
            'sku' => $this->getSku(),
            'isbn' => $this->getIsbn(),
            'ean' => $this->getEan(),
            'upc' => $this->getUpc(),
            'mpn' => $this->getMpn(),
            'barcode' => $this->getBarcode()
        ];
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function withSku(string $sku): Identity
    {
        $clone = clone $this;
        $clone->sku = $sku;
        return $clone;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function withIsbn(string $isbn): Identity
    {
        $clone = clone $this;
        $clone->isbn = $isbn;
        return $clone;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function withEan(string $ean): Identity
    {
        $clone = clone $this;
        $clone->ean = $ean;
        return $clone;
    }

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function withUpc(string $upc): Identity
    {
        $clone = clone $this;
        $clone->upc = $upc;
        return $clone;
    }

    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    public function withMpn(string $mpn): Identity
    {
        $clone = clone $this;
        $clone->mpn = $mpn;
        return $clone;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function withBarcode(string $barcode): Identity
    {
        $clone = clone $this;
        $clone->barcode = $barcode;
        return $clone;
    }
}
