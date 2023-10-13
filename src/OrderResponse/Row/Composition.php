<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Composition implements ModelInterface
{
    /** @var bool|null $bundleParent */
    private $bundleParent;
    /** @var bool|null $bundleChild */
    private $bundleChild;
    /** @var int|null $parentOrderRowId */
    private $parentOrderRowId;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->bundleParent = $json['bundleParent'] ?? null;
        $result->bundleChild = $json['bundleChild'] ?? null;
        $result->parentOrderRowId = $json['parentOrderRowId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'bundleParent' => $this->isBundleParent(),
            'bundleChild' => $this->isBundleChild(),
            'parentOrderRowId' => $this->getParentOrderRowId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Composition &&
            $this->bundleParent === $other->bundleParent &&
            $this->bundleChild === $other->bundleChild &&
            $this->parentOrderRowId === $other->parentOrderRowId;
    }

    public function isBundleParent(): ?bool
    {
        return $this->bundleParent;
    }

    public function withBundleParent(bool $bundleParent): Composition
    {
        $clone = clone $this;
        $clone->bundleParent = $bundleParent;
        return $clone;
    }

    public function isBundleChild(): ?bool
    {
        return $this->bundleChild;
    }

    public function withBundleChild(bool $bundleChild): Composition
    {
        $clone = clone $this;
        $clone->bundleChild = $bundleChild;
        return $clone;
    }

    public function getParentOrderRowId(): ?int
    {
        return $this->parentOrderRowId;
    }

    public function withParentOrderRowId(int $parentOrderRowId): Composition
    {
        $clone = clone $this;
        $clone->parentOrderRowId = $parentOrderRowId;
        return $clone;
    }
}
