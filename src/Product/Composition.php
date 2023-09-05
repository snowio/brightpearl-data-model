<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Composition
{
    /** @var bool $bundle */
    private $bundle;

    /** @var BundleComponentCollection $bundleComponents */
    private $bundleComponents;

    public static function create(): Composition
    {
        return new self();
    }

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->bundle = $json['bundle'] ?? null;
        $result->bundleComponents = $json['bundle'] === true ?
            BundleComponentCollection::fromJson($json['bundleComponents'] ?? []) :
            BundleComponentCollection::create();
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['bundle'] = $this->bundle;
        $json['bundleComponents'] = $this->getBundleComponents()->toJson();
        return $json;
    }

    /**
     * @return bool
     */
    public function isBundle(): bool
    {
        return $this->bundle;
    }

    /**
     * @param bool $bundle
     * @return Composition
     */
    public function withBundle(bool $bundle): Composition
    {
        $clone = clone $this;
        $clone->bundle = $bundle;
        return $clone;
    }

    /**
     * @return BundleComponentCollection
     */
    public function getBundleComponents(): BundleComponentCollection
    {
        return $this->bundleComponents;
    }

    /**
     * @param BundleComponent[] $bundleComponents
     * @return Composition
     */
    public function withBundleComponents(array $bundleComponents): Composition
    {
        $clone = clone $this;
        $clone->bundleComponents = $bundleComponents;
        return $clone;
    }
}
