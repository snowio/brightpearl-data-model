<?php

namespace SnowIO\BrightpearlDataModel;

interface ModelInterface
{
    public static function create(): self;

    public static function fromJson(array $json): self;

    public function toJson(): array;

    public function equals($other): bool;
}
