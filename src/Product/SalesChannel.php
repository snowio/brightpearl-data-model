<?php

namespace SnowIO\BrightpearlDataModel\Product;

use Online4Baby\Brightpearl\Product\SalesChannel\Category;
use Online4Baby\Brightpearl\Product\SalesChannel\Description;

class SalesChannel
{
    /** @var string $salesChannelName */
    private $salesChannelName;
    /** @var string $productName */
    private $productName;
    /** @var string $productCondition */
    private $productCondition;
    /** @var Category[] $categories */
    private $categories;
    /** @var Description $description */
    private $description;
    /** @var Description $shortDescription */
    private $shortDescription;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->salesChannelName = $json['salesChannelName'];
        $result->productName = $json['productName'];
        $result->productCondition = $json['productCondition'];
        $result->categories = array_map([Category::class, "fromJson"], $json['categories']);
        $result->description = Description::fromJson($json['description']);
        $result->shortDescription = Description::fromJson($json['shortDescription']);

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['salesChannelName'] = $this->salesChannelName;
        $json['productName'] = $this->productName;
        $json['productCondition'] = $this->productCondition;
        $json['categories'] = array_map(static function (Category $category) {
            return $category->toJson();
        }, $this->categories);
        $json['description'] = $this->description->toJson();
        $json['shortDescription'] = $this->shortDescription->toJson();

        return $json;
    }

    /**
     * @return string
     */
    public function getSalesChannelName(): string
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
     * @return string
     */
    public function getProductName(): string
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
     * @return string
     */
    public function getProductCondition(): string
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
     * @return Description
     */
    public function getDescription(): Description
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
     * @return Description
     */
    public function getShortDescription(): Description
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
