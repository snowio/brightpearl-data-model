<?php

namespace SnowIO\BrightpearlDataModel\ContactCreate\Communication\Emails;

class Email
{
    /** @var string|null $email */
    private $email;

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
        $result->email = is_string($json['email']) ? $json['email'] : null;
        return $result;
    }

    /**
     * @param Email $emailToCompare
     * @return bool
     */
    public function equals(Email $emailToCompare): bool
    {
        return $this->getEmail() === $emailToCompare->getEmail();
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return ['email' => $this->getEmail()];
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Email
     */
    public function withEmail(?string $email): Email
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }
}
