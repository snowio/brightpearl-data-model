<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate;

use SnowIO\BrightpearlDataModel\ModelInterface;

class PostAddressIds implements ModelInterface
{
    /** @var int|null $DEF */
    private $DEF;
    /** @var int|null $BIL */
    private $BIL;
    /** @var int|null $DEL */
    private $DEL;

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
        $result->DEF = is_numeric($json['DEF']) ? (int)$json['DEF'] : null;
        $result->BIL = is_numeric($json['BIL']) ? (int)$json['BIL'] : null;
        $result->DEL = is_numeric($json['DEL']) ? (int)$json['DEL'] : null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'DEF' => $this->DEF,
            'BIL' => $this->BIL,
            'DEL' => $this->DEL
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof PostAddressIds &&
            $this->getDEF() === $other->getDEF() &&
            $this->getBIL() === $other->getBIL() &&
            $this->getDEL() === $other->getDEL();
    }

    public function getDEF(): ?int
    {
        return $this->DEF;
    }

    public function withDEF(int $DEF): self
    {
        $clone = clone $this;
        $clone->DEF = $DEF;
        return $clone;
    }

    public function getBIL(): ?int
    {
        return $this->BIL;
    }

    public function withBIL(int $BIL): self
    {
        $clone = clone $this;
        $clone->BIL = $BIL;
        return $clone;
    }

    public function getDEL(): ?int
    {
        return $this->DEL;
    }

    public function withDEL(int $DEL): self
    {
        $clone = clone $this;
        $clone->DEL = $DEL;
        return $clone;
    }
}