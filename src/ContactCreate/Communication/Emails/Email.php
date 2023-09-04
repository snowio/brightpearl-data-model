<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;

class Email
{
    /** @var mixed|string|null $email */
    private $email;

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
        $result->email = $json['email'] ?? null;
        return $result;
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        return ['email' => $this->email ?? null];
    }

    /**
     * @return mixed|string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function withEmail(?string $email): Email
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }
}
