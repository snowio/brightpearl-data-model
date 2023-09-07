<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use Iterator;
use IteratorAggregate;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Row\Order;

class OrderRowCollection implements IteratorAggregate
{
    /** @var Order[] */
    private $items = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param Order[] $items
     */
    public static function of(array $items): self
    {
        $result = new self();

        foreach($items as $order) {
            if ($order instanceof Order) {
                $result->items[] = $order;
            }
        }

        return $result;
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
        $json = [];
        foreach($this->items as $order) {
            $json[] = $order->toJson();
        }

        return $json;
    }

    /**
     * @param array<mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        foreach($json as $item) {
            if (!is_array($item)) {
                continue;
            }
            $result->items[] = Order::create()->fromJson($item);
        }

        return $result;
    }

    /**
     * @return Iterator
     */
    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
}