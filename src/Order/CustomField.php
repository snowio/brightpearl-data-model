<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class CustomField implements ModelInterface
{
    /** @var string|null $op */
    private $op;
    /** @var string|null $path */
    private $path;
    /** @var ?string|null $value */
    private $value;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->op = $json['op'] ?? null;
        $result->path = $json['path'] ?? null;
        $result->value = $json['value'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'op' => $this->getOp(),
            'path' => $this->getPath(),
            'value' => $this->getValue(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof CustomField &&
            $this->op === $other->op &&
            $this->path === $other->path &&
            $this->value === $other->value;
    }

    public function getOp(): ?string
    {
        return $this->op;
    }

    public function withOp(?string $op): CustomField
    {
        $clone = clone $this;
        $clone->op = $op;
        return $clone;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function withPath(string $path): CustomField
    {
        $clone = clone $this;
        $clone->path = $path;
        return $clone;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function withValue(?string $value): CustomField
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
}
