<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;
use SnowIO\BrightpearlDataModel\ModelInterface;

class Communication implements ModelInterface
{
    /** @var Emails|null $emails */
    private $emails;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->emails = Emails::fromJson($json['emails']);
        return $result;
    }

    public function toJson(): array
    {
        return ['emails' => $this->getEmails()->toJson()];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Communication &&
            $this->emails->equals($other->emails);
    }

    public function getEmails(): ?Emails
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
