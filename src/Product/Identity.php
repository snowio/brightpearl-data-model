<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Identity
{
    /** @var string $sku */
    private $sku = '';
    /** @var string $isbn */
    private $isbn = '';
    /** @var string $ean */
    private $ean = '';
    /** @var string $upc */
    private $upc = '';
    /** @var string $mpn */
    private $mpn = '';
    /** @var string $barcode */
    private $barcode = '';

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->sku = $json['sku'] ?? '';
        $result->isbn = $json['isbn'] ?? '';
        $result->ean = $json['ean'] ?? '';
        $result->upc = $json['upc'] ?? '';
        $result->mpn = $json['mpn'] ?? '';
        $result->barcode = $json['barcode'] ?? '';

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['sku'] = $this->sku;
        $json['isbn'] = $this->isbn;
        $json['ean'] = $this->ean;
        $json['upc'] = $this->upc;
        $json['mpn'] = $this->mpn;
        $json['barcode'] = $this->barcode;

        return $json;
    }

    /**
     * @return string
     */
    public function getSku(): string
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
     * @return string
     */
    public function getIsbn(): string
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
     * @return string
     */
    public function getEan(): string
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
     * @return string
     */
    public function getUpc(): string
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
     * @return string
     */
    public function getMpn(): string
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
     * @return string
     */
    public function getBarcode(): string
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
