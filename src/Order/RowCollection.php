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

        foreach ($items as $order) {
            if ($order instanceof Row) {
                $result->items[] = $order;
            }
        }
        return $result;
    }

    public function toJson(): array
    {
        return array_map(static function (Row $row): array {
            return $row->toJson();
        }, $this->items);
    }

    public static function fromJson(array $json): self
    {
        $result = new self();

        foreach ($json as $item) {
            if (!is_array($item)) {
                continue;
            }
            $result->items[] = Row::create()->fromJson($item);
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
