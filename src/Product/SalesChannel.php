<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\SalesChannel\Category;
use SnowIO\BrightpearlDataModel\Product\SalesChannel\Description;

class SalesChannel
{
    /** @var string|null $salesChannelName */
    private $salesChannelName;
    /** @var string|null $productName */
    private $productName;
    /** @var string|null $productCondition */
    private $productCondition;
    /** @var Category[] $categories */
    private $categories = [];
    /** @var Description|null $description */
    private $description;
    /** @var Description|null $shortDescription */
    private $shortDescription;

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

        $categories = is_array($json['categories']) ? $json['categories'] : [];
        $description = is_array($json['description']) ? $json['description'] : [];
        $shortDescription = is_array($json['shortDescription']) ? $json['shortDescription'] : [];

        $result->salesChannelName = is_string($json['salesChannelName']) ? $json['salesChannelName'] : null;
        $result->productName = is_string($json['productName']) ? $json['productName'] : null;
        $result->productCondition = is_string($json['productCondition']) ? $json['productCondition'] : null;
        $result->categories = array_map(function (array $json): Category {
            return Category::fromJson($json);
        }, $categories);
        $result->description = Description::fromJson($description);
        $result->shortDescription = Description::fromJson($shortDescription);

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $categories = array_map(static function (Category $category): array {
            return $category->toJson();
        }, $this->categories);

        $description = is_null($this->getDescription()) ? [] : $this->getDescription()->toJson();
        $shortDescription = is_null($this->getShortDescription()) ? [] : $this->getShortDescription()->toJson();

        return [
            'salesChannelName' => $this->getSalesChannelName(),
            'productName' => $this->getProductName(),
            'productCondition' => $this->getProductCondition(),
            'categories' => $categories,
            'description' => $description,
            'shortDescription' => $shortDescription
        ];
    }

    /**
     * @return string|null
     */
    public function getSalesChannelName(): ?string
    {
        return $this->salesChannelName;
    }

    /**
     * @param string $salesChannelName
     * @return SalesChannel
     */
    public function withSalesChannelName(string $salesChannelName): SalesChannel
    {
        $clone = clone $this;
        $clone->salesChannelName = $salesChannelName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return SalesChannel
     */
    public function withProductName(string $productName): SalesChannel
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getProductCondition(): ?string
    {
        return $this->productCondition;
    }

    /**
     * @param string $productCondition
     * @return SalesChannel
     */
    public function withProductCondition(string $productCondition): SalesChannel
    {
        $clone = clone $this;
        $clone->productCondition = $productCondition;
        return $clone;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return SalesChannel
     */
    public function withCategories(array $categories): SalesChannel
    {
        $clone = clone $this;
        $clone->categories = $categories;
        return $clone;
    }

    /**
     * @return Description|null
     */
    public function getDescription(): ?Description
    {
        return $this->description;
    }

    /**
     * @param Description $description
     * @return SalesChannel
     */
    public function withDescription(Description $description): SalesChannel
    {
        $clone = clone $this;
        $clone->description = $description;
        return $clone;
    }

    /**
     * @return Description|null
     */
    public function getShortDescription(): ?Description
    {
        return $this->shortDescription;
    }

    /**
     * @param Description $shortDescription
     * @return SalesChannel
     */
    public function withShortDescription(Description $shortDescription): SalesChannel
    {
        $clone = clone $this;
        $clone->shortDescription = $shortDescription;
        return $clone;
    }
}
