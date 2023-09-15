<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

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
     * @param string $net
     * @return $this
     */
    public function withNet(string $net): self
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    /**
     * @param string $tax
     * @return $this
     */
    public function withTax(string $tax): self
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    /**
     * @param string $gross
     * @return $this
     */
    public function withGross(string $gross): self
    {
        $result = clone $this;
        $result->gross = $gross;
        return $result;
    }

    /**
     * @param string $baseNet
     * @return $this
     */
    public function withBaseNet(string $baseNet): self
    {
        $result = clone $this;
        $result->baseNet = $baseNet;
        return $result;
    }

    /**
     * @param string $baseTax
     * @return $this
     */
    public function withBaseTax(string $baseTax): self
    {
        $result = clone $this;
        $result->baseTax = $baseTax;
        return $result;
    }

    /**
     * @param string $baseGross
     * @return $this
     */
    public function withBaseGross(string $baseGross): self
    {
        $result = clone $this;
        $result->baseGross = $baseGross;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @return string|null
     */
    public function getGross(): ?string
    {
        return $this->gross;
    }

    /**
     * @return string|null
     */
    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    /**
     * @return string|null
     */
    public function getBaseTax(): ?string
    {
        return $this->baseTax;
    }

    /**
     * @return string|null
     */
    public function getBaseGross(): ?string
    {
        return $this->baseGross;
    }
}
