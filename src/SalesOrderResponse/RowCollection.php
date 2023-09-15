<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use Iterator;
use IteratorAggregate;

class RowCollection implements IteratorAggregate
{
    /** @var Row[] $items */
    private $items = [];

    /**
     * @param Row[] $items
     */
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

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        $json = [];
        foreach ($this->items as $order) {
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

        foreach ($json as $item) {
            if (!is_array($item)) {
                continue;
            }
            $result->items[] = Row::create()->fromJson($item);
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
