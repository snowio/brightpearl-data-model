<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;

class Communication
{
    /** @var Emails|null $emails */
    private $emails;

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
        $emails = Emails::create();
        $result = new self();
        if (!is_array($json['emails'])) {
            return $result;
        }
        $result->emails = $emails->fromJson($json['emails']);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        if (is_null($this->getEmails())) {
            return ['emails' => null];
        }
        return ['emails' => $this->getEmails()->toJson()];
    }

    /**
     * @return Emails|null
     */
    public function getEmails(): ?Emails
    {
        return $this->emails;
    }

    /**
     * @param Emails $emails
     * @return Communication
     */
    public function withEmails(Emails $emails): Communication
    {
        $clone = clone $this;
        $clone->emails = $emails;
        return $clone;
    }
}
