<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

class Category
{
    /** @var string|null $categoryCode */
    private $categoryCode;

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

        $result->categoryCode = is_string($json['categoryCode']) ? $json['categoryCode'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'categoryCode' => $this->getCategoryCode()
        ];
    }

    /**
     * @return string|null
     */
    public function getCategoryCode(): ?string
    {
        return $this->categoryCode;
    }

    /**
     * @param string $categoryCode
     * @return Category
     */
    public function withCategoryCode(string $categoryCode): Category
    {
        $clone = clone $this;
        $clone->categoryCode = $categoryCode;
        return $clone;
    }
}
