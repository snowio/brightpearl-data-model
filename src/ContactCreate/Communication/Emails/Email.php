<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Email implements ModelInterface
{
    /** @var string|null $email */
    private $email;

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
        $result->email = $json['email'] ?? null;
        return $result;
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Email &&
            $this->email === $other->email;
    }

    public function toJson(): array
    {
        return ['email' => $this->getEmail()];
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function withEmail(?string $email): Email
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }
}
