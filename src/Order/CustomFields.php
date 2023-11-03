<?php

namespace SnowIO\BrightpearlDataModel\Order;

use Iterator;
use IteratorAggregate;

class CustomFields implements IteratorAggregate
{
    /** @var CustomField[] $items */
    private $items = [];

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $customField) {
            if ($customField instanceof CustomField) {
                $result->items[] = $customField;
            }
        }
        return $result;
    }

    public function toJson(): array
    {
        return array_map(static function (CustomField $row): array {
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
            $result->items[] = CustomField::create()->fromJson($item);
        }
        return $result;
    }

    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }

    public function removeItemByIndex(int $index)
    {
        unset($this->items[$index]);
    }

    public function sortArrayValues()
    {
        $this->items = array_values($this->items);
    }
}
