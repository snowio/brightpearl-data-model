<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Category implements ModelInterface
{
    /** @var string|null $categoryCode */
    private $categoryCode;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->categoryCode = $json['categoryCode'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'categoryCode' => $this->getCategoryCode()
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Category &&
            $this->categoryCode === $other->categoryCode;
    }

    public function getCategoryCode(): ?string
    {
        return $this->categoryCode;
    }

    public function withCategoryCode(string $categoryCode): Category
    {
        $clone = clone $this;
        $clone->categoryCode = $categoryCode;
        return $clone;
    }
}
