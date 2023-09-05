<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Reporting
{
    /** @var int|null $categoryId */
    private $categoryId;
    /** @var int|null $subCategoryId */
    private $subCategoryId;
    /** @var int|null $seasonId */
    private $seasonId;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->categoryId = $json['categoryId'] ?? null;
        $result->subCategoryId = $json['subCategoryId'] ?? null;
        $result->seasonId = $json['seasonId'] ?? null;
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        if ($this->categoryId) {
            $json['categoryId'] = $this->categoryId;
        }

        if ($this->subCategoryId) {
            $json['subCategoryId'] = $this->subCategoryId;
        }

        if ($this->seasonId) {
            $json['seasonId'] = $this->seasonId;
        }

        return $json;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return Reporting
     */
    public function withCategoryId(?int $categoryId): Reporting
    {
        $clone = clone $this;
        $clone->categoryId = $categoryId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getSubCategoryId(): ?int
    {
        return $this->subCategoryId;
    }

    /**
     * @param int|null $subCategoryId
     * @return Reporting
     */
    public function withSubCategoryId(?int $subCategoryId): Reporting
    {
        $clone = clone $this;
        $clone->subCategoryId = $subCategoryId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getSeasonId(): ?int
    {
        return $this->seasonId;
    }

    /**
     * @param int|null $seasonId
     * @return Reporting
     */
    public function withSeasonId(?int $seasonId): Reporting
    {
        $clone = clone $this;
        $clone->seasonId = $seasonId;
        return $clone;
    }
}
