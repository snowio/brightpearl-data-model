<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Product\Composition\BundleComponent;

class Composition implements ModelInterface
{
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->bundle = $json['bundle'] ?? null;
        $bundleComponents = $json['bundleComponents'] ?? [];
        foreach ($bundleComponents as $bundleComponent) {
            $bundleComponent = $bundleComponent ?? [];
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
