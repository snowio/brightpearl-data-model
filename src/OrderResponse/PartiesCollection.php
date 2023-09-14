<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use Iterator;
use IteratorAggregate;

class PartiesCollection implements IteratorAggregate
{
    const SUPPLIER = 'supplier';
    const BILLING = 'billing';
    const DELIVERY = 'delivery';

    /** @var Parties[] */
    private $items = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param Parties[] $items
     */
    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $order) {
            if ($order instanceof Parties) {
                $result->items[] = $order;
            }
        }

        return $result;
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
        return  array_map(static function (Parties $row): array {
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
            $result->items[] = Parties::fromJson($row);
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
