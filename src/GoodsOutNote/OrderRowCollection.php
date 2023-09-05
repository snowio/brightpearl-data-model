<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use SnowIO\BrightpearlDataModel\GoodsOutNote\Row\Order;

class OrderRowCollection implements \IteratorAggregate
{
    public static function create(): self
    {
        return new self();
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
        return array_map(function (array $orders) {
            return array_map(function (Order $order) {
                return $order->toJson();
            }, $orders);
        }, $this->items);
    }

    public static function fromJson(array $json): self
    {
        return new self(array_map(function (array $orderRow) {
            return array_map(function (array $item) {
                return Order::fromJson($item);
            }, $orderRow);
        }, $json));
    }

    public function getIterator(): \Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }

    /** @var Order[][] */
    private $items = [];

    private function __construct(array $items = [])
    {
        $this->items = $items;
    }
}