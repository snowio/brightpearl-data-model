<?php

namespace SnowIO\BrightpearlDataModel\Product\FinancialDetails;

class TaxCode
{
    /** @var int|null $id */
    private $id;
    /** @var string|null $code */
    private $code;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->id = is_numeric($json['id']) ? (int) $json['id'] : null;
        $result->code = is_string($json['code']) ? $json['code'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode(),
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TaxCode
     */
    public function withId(int $id): TaxCode
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return TaxCode
     */
    public function withCode(string $code): TaxCode
    {
        $clone = clone $this;
        $clone->code = $code;
        return $clone;
    }
}
