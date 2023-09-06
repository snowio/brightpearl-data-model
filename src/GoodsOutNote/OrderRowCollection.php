<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use SnowIO\BrightpearlDataModel\GoodsOutNote\Row\Order;

class OrderRowCollection implements \IteratorAggregate
{
    /** @var Order[][] */
    private $items = [];

    /**
     * @param Order[][] $items
     */
    private function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param Order[][] $items
     */
    public static function of(array $items): self
    {
        return new self($items);
    }

    /**
     * @param callable $function
     * @return array<mixed>
     */
    public function map(callable $function) : array
    {
        return array_map($function, $this->items);
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        return array_map(function (array $orders) {
            return array_map(function (Order $order) {
                return $order->toJson();
            }, $orders);
        }, $this->items);
    }

    /**
     * @param array<mixed> $json
     * TODO : look at this
     */
    public static function fromJson(array $json): self
    {
        return new self(array_map(function (array $orderRow) {
            return array_map(function (array $item) {
                return Order::fromJson($item);
            }, $orderRow);
        }, $json));
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
}