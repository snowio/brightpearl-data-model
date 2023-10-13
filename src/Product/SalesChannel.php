<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Product\SalesChannel\Category;
use SnowIO\BrightpearlDataModel\Product\SalesChannel\Description;

class SalesChannel implements ModelInterface
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

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->salesChannelName = $json['salesChannelName'] ?? null;
        $result->productName = $json['productName'] ?? null;
        $result->productCondition = $json['productCondition'] ?? null;
        $result->categories = array_map(function (array $json): ModelInterface {
            return Category::fromJson($json);
        }, $json['categories'] ?? []);
        $result->description = Description::fromJson($json['description'] ?? []);
        $result->shortDescription = Description::fromJson($json['shortDescription'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        $categories = array_map(static function (Category $category): array {
            return $category->toJson();
        }, $this->categories);
        return [
            'salesChannelName' => $this->getSalesChannelName(),
            'productName' => $this->getProductName(),
            'productCondition' => $this->getProductCondition(),
            'categories' => $categories,
            'description' => $this->getDescription()->toJson(),
            'shortDescription' => $this->getShortDescription()->toJson()
        ];
    }


    public function equals(ModelInterface $other): bool
    {
        return $other instanceof SalesChannel &&
            $this->salesChannelName === $other->salesChannelName &&
            $this->productName === $other->productName &&
            $this->productCondition === $other->productCondition &&
            $this->categories === $other->categories &&
            $this->description->equals($other->description) &&
            $this->shortDescription->equals($other->shortDescription);
    }

    public function getSalesChannelName(): ?string
    {
        return $this->salesChannelName;
    }

    public function withSalesChannelName(string $salesChannelName): SalesChannel
    {
        $clone = clone $this;
        $clone->salesChannelName = $salesChannelName;
        return $clone;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function withProductName(string $productName): SalesChannel
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    public function getProductCondition(): ?string
    {
        return $this->productCondition;
    }

    public function withProductCondition(string $productCondition): SalesChannel
    {
        $clone = clone $this;
        $clone->productCondition = $productCondition;
        return $clone;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function withCategories(array $categories): SalesChannel
    {
        $clone = clone $this;
        $clone->categories = $categories;
        return $clone;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function withDescription(Description $description): SalesChannel
    {
        $clone = clone $this;
        $clone->description = $description;
        return $clone;
    }

    public function getShortDescription(): ?Description
    {
        return $this->shortDescription;
    }

    public function withShortDescription(Description $shortDescription): SalesChannel
    {
        $clone = clone $this;
        $clone->shortDescription = $shortDescription;
        return $clone;
    }
}
