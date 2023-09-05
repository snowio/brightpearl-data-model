<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use SnowIO\BrightpearlDataModel\GoodsOutNote\Event\Event;

class EventCollection
{
    private function __construct()
    {
    }

    /** @var Event[] $items */
    private $items;

    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed>$items
     */
    public static function of(array $items): self
    {
        return new self($items);
    }

    /**
     * @param callable $function
     * @return array<string, mixed>
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
        return array_map(static function (Event $event) {
            return $event->toJson();
        }, $this->items);
    }

    /**
     * @param array<mixed> $json
     * todo: this
     */
    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $item) {
            $result->items[] = Event::fromJson($item);
        }
        return $result;
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }

}