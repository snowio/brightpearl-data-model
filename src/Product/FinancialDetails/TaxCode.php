<?php

namespace SnowIO\BrightpearlDataModel\Product\FinancialDetails;

use SnowIO\BrightpearlDataModel\ModelInterface;

class TaxCode implements ModelInterface
{
    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->code = $json['code'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode(),
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof TaxCode &&
            $this->id === $other->id &&
            $this->code === $other->code;
    }

    /** @var int|null $id */
    private $id;
    /** @var string|null $code */
    private $code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): TaxCode
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function withCode(string $code): TaxCode
    {
        $clone = clone $this;
        $clone->code = $code;
        return $clone;
    }
}
