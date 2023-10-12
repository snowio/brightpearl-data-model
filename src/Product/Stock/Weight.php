<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

class Weight
{
    /** @var float|null $magnitude */
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

        $result->magnitude = is_numeric($json['magnitude']) ? (float) $json['magnitude'] : null;

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

    public function equals($other): bool
    {
        return $other instanceof Weight &&
            $this->magnitude === $other->magnitude;
    }

    /**
     * @return float|null
     */
    public function getMagnitude(): ?float
    {
        return $this->magnitude;
    }

    /**
     * @param float $magnitude
     * @return Weight
     */
    public function withMagnitude(float $magnitude): Weight
    {
        $clone = clone $this;
        $clone->magnitude = $magnitude;
        return $clone;
    }
}
