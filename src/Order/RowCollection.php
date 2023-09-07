<?php

namespace SnowIO\BrightpearlDataModel\Order;

use Iterator;
use IteratorAggregate;

class RowCollection implements IteratorAggregate
{
    /** @var Row[] $items */
    private $items = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param callable $function
     * @return array<mixed>
     */
    public function map(callable $function): array
    {
        return array_map($function, $this->items);
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return array_map(static function (Row $row): array {
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
            $result->items[] = Row::fromJson($row);
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
