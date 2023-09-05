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
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->PRI = is_array($json['PRI']) ? Email::fromJson($json['PRI']) : null;
        $result->SEC = is_array($json['SEC']) ? Email::fromJson($json['SEC']) : null;
        $result->TER = is_array($json['TER']) ? Email::fromJson($json['TER']) : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'PRI' => $this->PRI !== null ? $this->PRI->toJson() : null,
            'SEC' => $this->SEC !== null ? $this->SEC->toJson() : null,
            'TER' => $this->TER !== null ? $this->TER->toJson() : null
        ];
    }

    /**
     * @param Emails $emailsToCompare
     * @return bool
     */
    public function equals(Emails $emailsToCompare): bool
    {
        if (!is_null($this->getPRI())
            && !is_null($emailsToCompare->getPRI())
            && !$this->getPRI()->equals($emailsToCompare->getPRI())) {
            return false;
        }

        if (is_null($this->getSEC())) {
            return !(!is_null($this->getTER()) && !is_null($emailsToCompare->getTER()) && !$this->getTER()->equals($emailsToCompare->getTER()));
        }
        if (is_null($emailsToCompare->getSEC())) {
            return !(!is_null($this->getTER()) && !is_null($emailsToCompare->getTER()) && !$this->getTER()->equals($emailsToCompare->getTER()));
        }
        if ($this->getSEC()->equals($emailsToCompare->getSEC())) {
            return !(!is_null($this->getTER()) && !is_null($emailsToCompare->getTER()) && !$this->getTER()->equals($emailsToCompare->getTER()));
        }
        return false;
    }

    /**
     * @return Email|null
     */
    public function getPRI(): ?Email
    {
        return $this->PRI;
    }

    /**
     * @param Email $PRI
     * @return self
     */
    public function withPRI(Email $PRI): self
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
     * @return Emails
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
