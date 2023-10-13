<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate\Communication;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails\Email;
use SnowIO\BrightpearlDataModel\ModelInterface;

class Emails implements ModelInterface
{
    /** @var Email|null $PRI */
    private $PRI;
    /** @var Email|null $SEC */
    private $SEC;
    /** @var Email|null $TER */
    private $TER;

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
        $result->PRI = Email::fromJson($json['PRI']) ?? null;
        $result->SEC = Email::fromJson($json['SEC']) ?? null;
        $result->TER = Email::fromJson($json['TER']) ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'PRI' => $this->PRI->toJson(),
            'SEC' => $this->SEC->toJson(),
            'TER' => $this->TER->toJson()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Emails &&
            $this->getSEC()->equals($other->getSEC()) &&
            $this->getPRI()->equals($other->getPRI()) &&
            $this->getTER()->equals($other->getTER());
    }

    public function getPRI(): ?Email
    {
        return $this->PRI;
    }

    public function withPRI(Email $PRI): self
    {
        $clone = clone $this;
        $clone->PRI = $PRI;
        return $clone;
    }

    public function getSEC(): ?Email
    {
        return $this->SEC;
    }

    public function withSEC(?Email $SEC): Emails
    {
        $clone = clone $this;
        $clone->SEC = $SEC;
        return $clone;
    }

    public function getTER(): ?Email
    {
        return $this->TER;
    }

    public function withTER(?Email $TER): Emails
    {
        $clone = clone $this;
        $clone->TER = $TER;
        return $clone;
    }
}
