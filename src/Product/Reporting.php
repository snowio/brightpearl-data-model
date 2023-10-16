<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Reporting implements ModelInterface
{
    /** @var int|null $categoryId */
    private $categoryId;
    /** @var int|null $subCategoryId */
    private $subCategoryId;
    /** @var int|null $seasonId */
    private $seasonId;

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
        $result->categoryId = $json['categoryId'] ?? null;
        $result->subCategoryId = $json['subCategoryId'] ?? null;
        $result->seasonId = $json['seasonId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'categoryId' => $this->getCategoryId(),
            'subCategoryId' => $this->getSubCategoryId(),
            'seasonId' => $this->getSeasonId()
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Reporting &&
            $this->categoryId === $other->categoryId &&
            $this->subCategoryId === $other->subCategoryId &&
            $this->seasonId === $other->seasonId;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function withCategoryId(?int $categoryId): Reporting
    {
        $clone = clone $this;
        $clone->categoryId = $categoryId;
        return $clone;
    }

    public function getSubCategoryId(): ?int
    {
        return $this->subCategoryId;
    }

    public function withSubCategoryId(?int $subCategoryId): Reporting
    {
        $clone = clone $this;
        $clone->subCategoryId = $subCategoryId;
        return $clone;
    }

    public function getSeasonId(): ?int
    {
        return $this->seasonId;
    }

    public function withSeasonId(?int $seasonId): Reporting
    {
        $clone = clone $this;
        $clone->seasonId = $seasonId;
        return $clone;
    }
}
