<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Identity
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

        $result->sku = is_string($json['sku']) ? $json['sku'] : null;
        $result->isbn = is_string($json['isbn']) ? $json['isbn'] : null;
        $result->ean = is_string($json['ean']) ? $json['ean'] : null;
        $result->upc = is_string($json['upc']) ? $json['upc'] : null;
        $result->mpn = is_string($json['mpn']) ? $json['mpn'] : null;
        $result->barcode = is_string($json['barcode']) ? $json['barcode'] : null;

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

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Identity
     */
    public function withSku(string $sku): Identity
    {
        $clone = clone $this;
        $clone->sku = $sku;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     * @return Identity
     */
    public function withIsbn(string $isbn): Identity
    {
        $clone = clone $this;
        $clone->isbn = $isbn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     * @return Identity
     */
    public function withEan(string $ean): Identity
    {
        $clone = clone $this;
        $clone->ean = $ean;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getUpc(): ?string
    {
        return $this->upc;
    }

    /**
     * @param string $upc
     * @return Identity
     */
    public function withUpc(string $upc): Identity
    {
        $clone = clone $this;
        $clone->upc = $upc;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    /**
     * @param string $mpn
     * @return Identity
     */
    public function withMpn(string $mpn): Identity
    {
        $clone = clone $this;
        $clone->mpn = $mpn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     * @return Identity
     */
    public function withBarcode(string $barcode): Identity
    {
        $clone = clone $this;
        $clone->barcode = $barcode;
        return $clone;
    }
}
