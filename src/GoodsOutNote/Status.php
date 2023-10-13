<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Status implements ModelInterface
{
    /** @var bool|null $shipped */
    private $shipped;
    /** @var bool|null $packed */
    private $packed;
    /** @var bool|null $picked */
    private $picked;
    /** @var bool|null $printed */
    private $printed;
    /** @var string|null $pickedOn */
    private $pickedOn;
    /** @var string|null $packedOn */
    private $packedOn;
    /** @var string|null $shippedOn */
    private $shippedOn;
    /** @var string|null $printedOn */
    private $printedOn;
    /** @var int|null $pickedById */
    private $pickedById;
    /** @var int|null $packedById */
    private $packedById;
    /** @var int|null $shippedById */
    private $shippedById;
    /** @var int|null $printedById */
    private $printedById;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->shipped = $json['shipped'] ?? null;
        $result->packed = $json['packed'] ?? null;
        $result->picked = $json['picked'] ?? null;
        $result->printed = $json['printed'] ?? null;
        $result->pickedOn = $json['pickedOn'] ?? null;
        $result->packedOn = $json['packedOn'] ?? null;
        $result->shippedOn = $json['shippedOn'] ?? null;
        $result->printedOn = $json['printedOn'] ?? null;
        $result->pickedById = $json['pickedById'] ?? null;
        $result->packedById = $json['packedById'] ?? null;
        $result->shippedById = $json['shippedById'] ?? null;
        $result->printedById = $json['printedById'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'shipped' => $this->isShipped(),
            'packed' => $this->isPacked(),
            'picked' => $this->isPicked(),
            'printed' => $this->isPrinted(),
            'pickedOn' => $this->getPickedOn(),
            'packedOn' => $this->getPackedOn(),
            'shippedOn' => $this->getShippedOn(),
            'printedOn' => $this->getPrintedOn(),
            'pickedById' => $this->getPickedById(),
            'packedById' => $this->getPackedById(),
            'shippedById' => $this->getShippedById(),
            'printedById' => $this->getPrintedById()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Status &&
            $this->shipped === $other->shipped &&
            $this->packed === $other->packed &&
            $this->picked === $other->picked &&
            $this->printed === $other->printed &&
            $this->packed === $other->printed &&
            $this->pickedOn === $other->pickedOn &&
            $this->packedOn === $other->packedOn &&
            $this->shippedOn === $other->shippedOn &&
            $this->pickedById === $other->pickedById &&
            $this->packedById === $other->packedById &&
            $this->shippedById === $other->shippedById &&
            $this->printedById === $other->printedById;
    }

    public function withShipped(?bool $shipped): Status
    {
        $clone = clone $this;
        $clone->shipped = $shipped;
        return $clone;
    }

    public function withPacked(?bool $packed): Status
    {
        $clone = clone $this;
        $clone->packed = $packed;
        return $clone;
    }

    public function withPicked(?bool $picked): Status
    {
        $clone = clone $this;
        $clone->picked = $picked;
        return $clone;
    }

    public function withPrinted(?bool $printed): Status
    {
        $clone = clone $this;
        $clone->printed = $printed;
        return $clone;
    }

    public function withPickedOn(?string $pickedOn): Status
    {
        $clone = clone $this;
        $clone->pickedOn = $pickedOn;
        return $clone;
    }

    public function withPackedOn(?string $packedOn): Status
    {
        $clone = clone $this;
        $clone->packedOn = $packedOn;
        return $clone;
    }

    public function withShippedOn(?string $shippedOn): Status
    {
        $clone = clone $this;
        $clone->shippedOn = $shippedOn;
        return $clone;
    }

    public function withPrintedOn(?string $printedOn): Status
    {
        $clone = clone $this;
        $clone->printedOn = $printedOn;
        return $clone;
    }

    public function withPickedById(?int $pickedById): Status
    {
        $clone = clone $this;
        $clone->pickedById = $pickedById;
        return $clone;
    }

    public function withPackedById(?int $packedById): Status
    {
        $clone = clone $this;
        $clone->packedById = $packedById;
        return $clone;
    }

    public function withShippedById(?int $shippedById): Status
    {
        $clone = clone $this;
        $clone->shippedById = $shippedById;
        return $clone;
    }

    public function withPrintedById(?int $printedById): Status
    {
        $clone = clone $this;
        $clone->printedById = $printedById;
        return $clone;
    }

    public function isShipped(): ?bool
    {
        return $this->shipped;
    }

    public function isPacked(): ?bool
    {
        return $this->packed;
    }

    public function isPicked(): ?bool
    {
        return $this->picked;
    }

    public function isPrinted(): ?bool
    {
        return $this->printed;
    }

    public function getPickedOn(): ?string
    {
        return $this->pickedOn;
    }

    public function getPackedOn(): ?string
    {
        return $this->packedOn;
    }

    public function getShippedOn(): ?string
    {
        return $this->shippedOn;
    }

    public function getPrintedOn(): ?string
    {
        return $this->printedOn;
    }

    public function getPickedById(): ?int
    {
        return $this->pickedById;
    }

    public function getPackedById(): ?int
    {
        return $this->packedById;
    }

    public function getShippedById(): ?int
    {
        return $this->shippedById;
    }

    public function getPrintedById(): ?int
    {
        return $this->printedById;
    }
}
