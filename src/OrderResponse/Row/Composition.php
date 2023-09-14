<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

class Composition
{
    /** @var bool|null $bundleParent */
    private $bundleParent;
    /** @var bool|null $bundleChild */
    private $bundleChild;
    /** @var int|null $parentOrderRowId */
    private $parentOrderRowId;

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

        $result->bundleParent = is_bool($json['bundleParent']) && $json['bundleParent'];
        $result->bundleChild = is_bool($json['bundleChild']) && $json['bundleChild'];
        $result->parentOrderRowId = is_numeric($json['parentOrderRowId']) ? (int)$json['parentOrderRowId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'bundleParent' => $this->isBundleParent(),
            'bundleChild' => $this->isBundleChild(),
            'parentOrderRowId' => $this->getParentOrderRowId()
        ];
    }

    /**
     * @return bool|null
     */
    public function isBundleParent(): ?bool
    {
        return $this->bundleParent;
    }

    /**
     * @param bool $bundleParent
     * @return Composition
     */
    public function withBundleParent(bool $bundleParent): Composition
    {
        $clone = clone $this;
        $clone->bundleParent = $bundleParent;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function isBundleChild(): ?bool
    {
        return $this->bundleChild;
    }

    /**
     * @param bool $bundleChild
     * @return Composition
     */
    public function withBundleChild(bool $bundleChild): Composition
    {
        $clone = clone $this;
        $clone->bundleChild = $bundleChild;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getParentOrderRowId(): ?int
    {
        return $this->parentOrderRowId;
    }

    /**
     * @param int $parentOrderRowId
     * @return Composition
     */
    public function withParentOrderRowId(int $parentOrderRowId): Composition
    {
        $clone = clone $this;
        $clone->parentOrderRowId = $parentOrderRowId;
        return $clone;
    }
}
