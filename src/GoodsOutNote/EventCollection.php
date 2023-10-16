<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use Iterator;
use IteratorAggregate;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Event\Event;

class EventCollection implements IteratorAggregate
{
    /** @var Event[] */
    private $items = [];

    public static function create(): self
    {
        return new self();
    }

    public static function of(array $items): self
    {
        $result = new self();

        foreach ($items as $event) {
            if ($event instanceof Event) {
                $result->items[] = $event;
            }
        }

        return $result;
    }

    public function toJson(): array
    {
        $json = [];
        foreach ($this->items as $event) {
            $json[] = $event->toJson();
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
            $result->items[] = Event::create()->fromJson($item);
        }
        return $result;
    }

    public function getIterator(): Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }

    public function equals(EventCollection $compare): bool
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
