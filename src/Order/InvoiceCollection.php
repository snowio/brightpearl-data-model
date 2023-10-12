<?php

namespace SnowIO\BrightpearlDataModel\Order;

use Iterator;
use IteratorAggregate;
use SnowIO\BrightpearlDataModel\ModelInterface;

class InvoiceCollection implements IteratorAggregate
{
    /** @var \SnowIO\BrightpearlDataModel\Order\Invoice[]|\SnowIO\BrightpearlDataModel\ModelInterface[] */
    private $items = [];

    public static function create(): self
    {
        return new self();
    }

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $order) {
            if ($order instanceof Invoice) {
                $result->items[] = $order;
            }
        }

        return $result;
    }

    public function toJson(): array
    {
        return array_map(static function (ModelInterface $row): array {
            return $row->toJson();
        }, $this->items);
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $item) {
            $row = is_array($item) ? $item : [];
            $result->items[] = Invoice::fromJson($row);
        }
        return $result;
    }

    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }
    public function equals(InvoiceCollection $compare): bool
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
