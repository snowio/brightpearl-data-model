<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Total
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

        $result->net = is_string($json['net']) ? $json['net'] : null;
        $result->tax = is_string($json['tax']) ? $json['tax'] : null;
        $result->gross = is_string($json['gross']) ? $json['gross'] : null;
        $result->baseNet = is_string($json['baseNet']) ? $json['baseNet'] : null;
        $result->baseTax = is_string($json['baseTax']) ? $json['baseTax'] : null;
        $result->baseGross = is_string($json['baseGross']) ? $json['baseGross'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @param string|null $net
     * @return $this
     */
    public function withNet(?string $net): Total
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @param string|null $tax
     * @return $this
     */
    public function withTax(?string $tax): Total
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getGross(): ?string
    {
        return $this->gross;
    }

    /**
     * @param string|null $gross
     * @return $this
     */
    public function withGross(?string $gross): Total
    {
        $clone = clone $this;
        $clone->gross = $gross;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    /**
     * @param string|null $baseNet
     * @return $this
     */
    public function withBaseNet(?string $baseNet): Total
    {
        $clone = clone $this;
        $clone->baseNet = $baseNet;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseTax(): ?string
    {
        return $this->baseTax;
    }

    /**
     * @param string|null $baseTax
     * @return $this
     */
    public function withBaseTax(?string $baseTax): Total
    {
        $clone = clone $this;
        $clone->baseTax = $baseTax;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseGross(): ?string
    {
        return $this->baseGross;
    }

    /**
     * @param string|null $baseGross
     * @return $this
     */
    public function withBaseGross(?string $baseGross): Total
    {
        $clone = clone $this;
        $clone->baseGross = $baseGross;
        return $clone;
    }
}
