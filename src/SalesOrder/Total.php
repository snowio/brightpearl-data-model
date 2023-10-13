<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Total implements ModelInterface
{
    /** @var string|null $net */
    private $net;
    /** @var string|null $tax */
    private $tax;
    /** @var string|null $gross */
    private $gross;
    /** @var string|null $baseNet */
    private $baseNet;
    /** @var string|null $baseTax */
    private $baseTax;
    /** @var string|null $baseGross */
    private $baseGross;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public function hasData()
    {
        return count(array_filter($this->toJson()));
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->net = $json['net'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->gross = $json['gross'] ?? null;
        $result->baseNet = $json['baseNet'] ?? null;
        $result->baseTax = $json['baseTax'] ?? null;
        $result->baseGross = $json['baseGross'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'net' => $this->net,
            'tax' => $this->tax,
            'gross' => $this->gross,
            'baseNet' => $this->baseNet,
            'baseTax' => $this->baseTax,
            'baseGross' => $this->baseGross,
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Total &&
            ($this->net === $other->net) &&
            ($this->tax === $other->tax) &&
            ($this->gross === $other->gross) &&
            ($this->baseNet === $other->baseNet) &&
            ($this->baseTax === $other->baseTax) &&
            ($this->baseGross === $other->baseGross);
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function withNet(?string $net): self
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function withTax(?string $tax): self
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }

    public function getGross(): ?string
    {
        return $this->gross;
    }

    public function withGross(?string $gross): self
    {
        $clone = clone $this;
        $clone->gross = $gross;
        return $clone;
    }

    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    public function withBaseNet(?string $baseNet): self
    {
        $clone = clone $this;
        $clone->baseNet = $baseNet;
        return $clone;
    }

    public function getBaseTax(): ?string
    {
        return $this->baseTax;
    }

    public function withBaseTax(?string $baseTax): self
    {
        $clone = clone $this;
        $clone->baseTax = $baseTax;
        return $clone;
    }

    public function getBaseGross(): ?string
    {
        return $this->baseGross;
    }

    public function withBaseGross(?string $baseGross): self
    {
        $clone = clone $this;
        $clone->baseGross = $baseGross;
        return $clone;
    }
}
