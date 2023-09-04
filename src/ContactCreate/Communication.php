<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;

class Communication
{
    /** @var Emails|null $id */
    private $emails;

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
        $result->emails = Emails::fromJson($json['emails']);
        return $result;
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        $json = [];
        $json['emails'] = $this->getEmails();
        return $json;
    }

    public function equals(Communication $communicationToCompare): bool
    {
        return ($this->getEmails() === $communicationToCompare->getEmails());
    }

    /**
     * @return Emails|null
     */
    public function getEmails(): Emails
    {
        return $this->emails;
    }

    public function withEmails(Emails $emails): Communication
    {
        $clone = clone $this;
        $clone->emails = $emails;
        return $clone;
    }
}