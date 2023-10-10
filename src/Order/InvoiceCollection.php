<?php

namespace SnowIO\BrightpearlDataModel\Order;

use Iterator;
use IteratorAggregate;
use SnowIO\BrightpearlDataModel\Api\ModelInterface;

class InvoiceCollection implements IteratorAggregate
{
    /** @var \SnowIO\BrightpearlDataModel\Order\Invoice[]|\SnowIO\BrightpearlDataModel\Api\ModelInterface[] */
    private $items = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param Invoice[] $items
     */
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

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return array_map(static function (ModelInterface $row): array {
            return $row->toJson();
        }, $this->items);
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $item) {
            $row = is_array($item) ? $item : [];
            $result->items[] = Invoice::fromJson($row);
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
