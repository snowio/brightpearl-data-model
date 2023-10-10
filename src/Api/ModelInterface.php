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
     * @return self
     */
    public static function fromJson(array $json): self;

    /**
     * @return array<mixed>
     */
    public function toJson(): array;

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool;
}