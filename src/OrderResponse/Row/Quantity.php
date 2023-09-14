<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

class Quantity
{
    /** @var string|null $magnitude */
    private $magnitude;

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

        $result->magnitude = is_string($json['magnitude']) ? $json['magnitude'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'magnitude' => $this->getMagnitude()
        ];
    }

    /**
     * @return string|null
     */
    public function getMagnitude(): ?string
    {
        return $this->magnitude;
    }

    /**
     * @param string $magnitude
     * @return Quantity
     */
    public function withMagnitude(string $magnitude): Quantity
    {
        $clone = clone $this;
        $clone->magnitude = $magnitude;
        return $clone;
    }
}
