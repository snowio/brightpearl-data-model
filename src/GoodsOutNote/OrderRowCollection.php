<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use Iterator;
use IteratorAggregate;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Row\Order;

class OrderRowCollection implements IteratorAggregate
{
    /** @var Order[] */
    private $items = [];

    public static function create(): self
    {
        return new self();
    }

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $order) {
            if ($order instanceof Order) {
                $result->items[] = $order;
            }
        }

        return $result;
    }

    public function toJson(): array
    {
        $json = [];
        foreach ($this->items as $order) {
            $json[] = $order->toJson();
        }

        return $json;
    }

    public static function fromJson(array $json): self
    {
        $result = new self();

        foreach ($json as $item) {
            if (!is_array($item)) {
                continue;
            }
            $result->items[] = Order::create()->fromJson($item);
        }

        return $result;
    }

    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
    public function equals(OrderRowCollection $compare): bool
    {
        if (count($this->items) !== count(iterator_to_array($compare->getIterator()))) {
            return false;
        }
        $foundItems = [];
        foreach ($this->items as $item) {
            foreach ($compare->getIterator() as $compareItem) {
                if ($item->equals($compareItem)) {
                    $foundItems[] = $item;
                }
            }
        }
        if (count($foundItems) !== count($this->items)) {
            return false;
        }
        return true;
    }
}
