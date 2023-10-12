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

        $result->categoryId = is_numeric($json['categoryId']) ? (int) $json['categoryId'] : null;
        $result->subCategoryId = is_numeric($json['subCategoryId']) ? (int) $json['subCategoryId'] : null;
        $result->seasonId = is_numeric($json['seasonId']) ? (int) $json['seasonId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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
