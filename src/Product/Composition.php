<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\Composition\BundleComponent;

class Composition
{
    public static function create(): Composition
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();
        $bundle = is_bool($json['bundle']) && $json['bundle'];
        $result->bundle = $bundle;
        $bundleComponents = $bundle && is_array($json['bundleComponents']) ? $json['bundleComponents'] : [];
        foreach ($bundleComponents as $bundleComponent) {
            $bundleComponent = is_array($bundleComponent) ? $bundleComponent : [];
            $result->bundleComponents[] = BundleComponent::fromJson($bundleComponent);
        }

        return $result;
    }

    public function toJson(): array
    {
        $bundleComponents = [];
        foreach ($this->getBundleComponents() as $bundleComponent) {
            $bundleComponents[] = $bundleComponent->toJson();
        }

        return [
            'bundle' => $this->isBundle(),
            'bundleComponents' => $bundleComponents
        ];
    }

    /** @var bool|null $bundle */
    private $bundle;
    /** @var BundleComponent[] $bundleComponents */
    private $bundleComponents = [];

    public function equals($other): bool
    {
        return $this->toJson() === $other->toJson();
    }

    public function isBundle(): ?bool
    {
        return $this->bundle;
    }

    public function withBundle(bool $bundle): Composition
    {
        $clone = clone $this;
        $clone->bundle = $bundle;
        return $clone;
    }

    public function getBundleComponents(): array
    {
        return $this->bundleComponents;
    }

    public function withBundleComponents(array $bundleComponents): Composition
    {
        $clone = clone $this;
        $clone->bundleComponents = $bundleComponents;
        return $clone;
    }
}
