<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use Iterator;
use IteratorAggregate;

class InvoiceCollection implements IteratorAggregate
{
    /** @var Invoice[] */
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
        return array_map(static function (Invoice $row): array {
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
