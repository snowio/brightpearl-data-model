<?php

namespace SnowIO\BrightpearlDataModel\Order;

use Iterator;
use IteratorAggregate;

class RowCollection implements IteratorAggregate
{
    /** @var Row[] $items */
    private $items = [];

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $key => $order) {
            if ($order instanceof Row) {
                $result->items[$key] = $order;
            }
        }
        return $result;
    }

    public function toJson(): array
    {
        $json = [];
        foreach ($this->items as $key => $item) {
            $json[$key] = $item->toJson();
        }
        return $json;
    }

    public static function fromJson(array $json): self
    {
        $result = new self();

        foreach ($json as $key => $item) {
            if (!is_array($item)) {
                continue;
            }
            $result->items[$key] = Row::create()->fromJson($item);
        }
        return $result;
    }

    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
}
