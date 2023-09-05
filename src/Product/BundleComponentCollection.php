<?php

namespace SnowIO\BrightpearlDataModel\Product;

class BundleComponentCollection implements \IteratorAggregate
{
    /** @var BundleComponent[] */
    private $items;

    private function __construct()
    {
    }

    public static function create(): self
    {
        return new static();
    }

    public static function of(array $items): self
    {
        return new self($items);
    }

    public function map(callable $function)
    {
        return array_map($function, $this->items);
    }

    public function toJson(): array
    {
        return  array_map(static function (BundleComponent $bundleComponent) {
            return $bundleComponent->toJson();
        }, $this->items);
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $item) {
            $result->items[] = BundleComponent::fromJson($item);
        }
        return $result;
    }

    public function getIterator(): \Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
}
