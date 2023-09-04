<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate\Communication;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails\Email;

class Emails
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
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->PRI = Email::fromJson($json['PRI']);
        $result->SEC = isset($json['SEC']) ? Email::fromJson($json['SEC']) : null;
        $result->TER = isset($json['TER']) ? Email::fromJson($json['TER']) : null;
        return $result;
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        $json = [];
        $json['PRI'] = $this->PRI->toJson();
        $json['SEC'] = $this->SEC !== null ? $this->SEC->toJson() : null;
        $json['TER'] = $this->TER !== null ? $this->TER->toJson() : null;
        return array_filter($json);
    }

    public function equals(Emails $emailToCompare): bool
    {
        return ($this->getPRI() === $emailToCompare->getPRI()) &&
            ($this->getSEC() === $emailToCompare->getSEC()) &&
            ($this->getTER() === $emailToCompare->getTER());
    }

    /**
     * @return Email|null
     */
    public function getPRI(): Email
    {
        return $this->PRI;
    }

    public function withPRI(Email $PRI): Emails
    {
        $clone = clone $this;
        $clone->PRI = $PRI;
        return $clone;
    }

    /**
     * @return Email|null
     */
    public function getSEC(): ?Email
    {
        return $this->SEC;
    }

    /**
     * @param Email|null $SEC
     */
    public function withSEC(?Email $SEC): Emails
    {
        $clone = clone $this;
        $clone->SEC = $SEC;
        return $clone;
    }

    /**
     * @return Email|null
     */
    public function getTER(): ?Email
    {
        return $this->TER;
    }

    /**
     * @param Email|null $TER
     * @return Emails
     */
    public function withTER(?Email $TER): Emails
    {
        $clone = clone $this;
        $clone->TER = $TER;
        return $clone;
    }
}