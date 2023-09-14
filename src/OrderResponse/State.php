<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

class State
{
    /** @var string|null $tax */
    private $tax;

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
        $result->tax = is_string($json['tax']) ? $json['tax'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'tax' => $this->getTax()
        ];
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
     * @return State
     */
    public function withTax(?string $tax): State
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }
}
