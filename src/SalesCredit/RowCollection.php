<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit;

use Iterator;
use SnowIO\BrightpearlDataModel\SalesCredit\RowCollection\Row;

class RowCollection
{
    /** @var Row[] */
    private $items = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $row) {
            if ($row instanceof Row) {
                $result->items[] = $row;
            }
        }

        return $result;
    }

    public function toJson(): array
    {
        $json = [];
        foreach ($this->items as $row) {
            $json[] = $row->toJson();
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

    public function equals(RowCollection $compare): bool
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
