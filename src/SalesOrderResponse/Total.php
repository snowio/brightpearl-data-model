<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

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

    public static function create(): ModelInterface
    {
        return new self();
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
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'gross' => $this->getGross(),
            'baseNet' => $this->getBaseNet(),
            'baseTax' => $this->getBaseTax(),
            'baseGross' => $this->getBaseGross()
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

    public function withNet(string $net): self
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    public function withTax(string $tax): self
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    public function withGross(string $gross): self
    {
        $result = clone $this;
        $result->gross = $gross;
        return $result;
    }

    public function withBaseNet(string $baseNet): self
    {
        $result = clone $this;
        $result->baseNet = $baseNet;
        return $result;
    }

    public function withBaseTax(string $baseTax): self
    {
        $result = clone $this;
        $result->baseTax = $baseTax;
        return $result;
    }

    public function withBaseGross(string $baseGross): self
    {
        $result = clone $this;
        $result->baseGross = $baseGross;
        return $result;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function getGross(): ?string
    {
        return $this->gross;
    }

    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    public function getBaseTax(): ?string
    {
        return $this->baseTax;
    }

    public function getBaseGross(): ?string
    {
        return $this->baseGross;
    }
}
