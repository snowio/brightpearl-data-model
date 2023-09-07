<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

class Status
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
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->shipped = is_bool($json['shipped']) && $json['shipped'];
        $result->packed = is_bool($json['packed']) && $json['packed'];
        $result->picked = is_bool($json['picked']) && $json['picked'];
        $result->printed = is_bool($json['printed']) && $json['printed'];
        $result->pickedOn = is_string($json['pickedOn']) ? $json['pickedOn'] : null;
        $result->packedOn = is_string($json['packedOn']) ? $json['packedOn'] : null;
        $result->shippedOn = is_string($json['shippedOn']) ? $json['shippedOn'] : null;
        $result->printedOn = is_string($json['printedOn']) ? $json['printedOn'] : null;
        $result->pickedById = is_int($json['pickedById']) ? $json['pickedById'] : null;
        $result->packedById = is_int($json['packedById']) ? $json['packedById'] : null;
        $result->shippedById = is_int($json['shippedById']) ? $json['shippedById'] : null;
        $result->printedById = is_int($json['printedById']) ? $json['printedById'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @param Status $statusToCompare
     * @return bool
     */
    public function equals(Status $statusToCompare): bool
    {
        if ($this->isShipped() !== $statusToCompare->isShipped()) {
            return false;
        }

        if ($this->isPacked() !== $statusToCompare->isPacked()) {
            return false;
        }

        if ($this->isPicked() !== $statusToCompare->isPicked()) {
            return false;
        }

        if ($this->getPackedOn() !== $statusToCompare->getPackedOn()) {
            return false;
        }

        if ($this->getShippedOn() !== $statusToCompare->getShippedOn()) {
            return false;
        }

        if ($this->getPrintedOn() !== $statusToCompare->getPrintedOn()) {
            return false;
        }

        if ($this->getPickedById() !== $statusToCompare->getPickedById()) {
            return false;
        }

        if ($this->getPackedById() !== $statusToCompare->getPackedById()) {
            return false;
        }

        if ($this->getShippedById() !== $statusToCompare->getShippedById()) {
            return false;
        }

        return $this->getPrintedById() === $statusToCompare->getPrintedById();
    }

    /**
     * @param bool|null $shipped
     * @return Status
     */
    public function withShipped(?bool $shipped): Status
    {
        $clone = clone $this;
        $clone->shipped = $shipped;
        return $clone;
    }

    /**
     * @param bool|null $packed
     * @return Status
     */
    public function withPacked(?bool $packed): Status
    {
        $clone = clone $this;
        $clone->packed = $packed;
        return $clone;
    }

    /**
     * @param bool|null $picked
     * @return Status
     */
    public function withPicked(?bool $picked): Status
    {
        $clone = clone $this;
        $clone->picked = $picked;
        return $clone;
    }

    /**
     * @param bool|null $printed
     * @return Status
     */
    public function withPrinted(?bool $printed): Status
    {
        $clone = clone $this;
        $clone->printed = $printed;
        return $clone;
    }

    /**
     * @param string|null $pickedOn
     * @return Status
     */
    public function withPickedOn(?string $pickedOn): Status
    {
        $clone = clone $this;
        $clone->pickedOn = $pickedOn;
        return $clone;
    }

    /**
     * @param string|null $packedOn
     * @return Status
     */
    public function withPackedOn(?string $packedOn): Status
    {
        $clone = clone $this;
        $clone->packedOn = $packedOn;
        return $clone;
    }

    /**
     * @param string|null $shippedOn
     * @return Status
     */
    public function withShippedOn(?string $shippedOn): Status
    {
        $clone = clone $this;
        $clone->shippedOn = $shippedOn;
        return $clone;
    }

    /**
     * @param string|null $printedOn
     * @return Status
     */
    public function withPrintedOn(?string $printedOn): Status
    {
        $clone = clone $this;
        $clone->printedOn = $printedOn;
        return $clone;
    }

    /**
     * @param int|null $pickedById
     * @return Status
     */
    public function withPickedById(?int $pickedById): Status
    {
        $clone = clone $this;
        $clone->pickedById = $pickedById;
        return $clone;
    }

    /**
     * @param int|null $packedById
     * @return Status
     */
    public function withPackedById(?int $packedById): Status
    {
        $clone = clone $this;
        $clone->packedById = $packedById;
        return $clone;
    }

    /**
     * @param int|null $shippedById
     * @return Status
     */
    public function withShippedById(?int $shippedById): Status
    {
        $clone = clone $this;
        $clone->shippedById = $shippedById;
        return $clone;
    }

    /**
     * @param int|null $printedById
     * @return Status
     */
    public function withPrintedById(?int $printedById): Status
    {
        $clone = clone $this;
        $clone->printedById = $printedById;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function isShipped(): ?bool
    {
        return $this->shipped;
    }

    /**
     * @return bool|null
     */
    public function isPacked(): ?bool
    {
        return $this->packed;
    }

    /**
     * @return bool|null
     */
    public function isPicked(): ?bool
    {
        return $this->picked;
    }

    /**
     * @return bool|null
     */
    public function isPrinted(): ?bool
    {
        return $this->printed;
    }

    /**
     * @return string|null
     */
    public function getPickedOn(): ?string
    {
        return $this->pickedOn;
    }

    /**
     * @return string|null
     */
    public function getPackedOn(): ?string
    {
        return $this->packedOn;
    }

    /**
     * @return string|null
     */
    public function getShippedOn(): ?string
    {
        return $this->shippedOn;
    }

    /**
     * @return string|null
     */
    public function getPrintedOn(): ?string
    {
        return $this->printedOn;
    }

    /**
     * @return int|null
     */
    public function getPickedById(): ?int
    {
        return $this->pickedById;
    }

    /**
     * @return int|null
     */
    public function getPackedById(): ?int
    {
        return $this->packedById;
    }

    /**
     * @return int|null
     */
    public function getShippedById(): ?int
    {
        return $this->shippedById;
    }

    /**
     * @return int|null
     */
    public function getPrintedById(): ?int
    {
        return $this->printedById;
    }
}
