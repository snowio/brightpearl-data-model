<?php

namespace SnowIO\BrightpearlDataModel\Api;

interface ModelInterface
{
    /**
     * @return self
     */
    public static function create(): self;

    /**
     * @param array<mixed> $json
     * @return static
     */
    public static function fromJson(array $json): self;

    /**
     * @return array<mixed>
     */
    public function toJson(): array;

    /**
     * @param mixed $other
     * @return bool
     */
    public function equals($other): bool;
}
