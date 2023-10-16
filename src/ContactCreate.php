<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication;

class ContactCreate implements ModelInterface
{
    /** @var string|null $salutation */
    private $salutation;
    /** @var string|null $firstName */
    private $firstName;
    /** @var string|null $lastName */
    private $lastName;
    /** @var mixed[]|null $postAddressIds */
    private $postAddressIds;
    /** @var Communication|null $communication */
    private $communication;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->communication = Communication::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->salutation = $json['salutation'] ?? null;
        $result->firstName = $json['firstName'] ?? null;
        $result->lastName = $json['lastName'] ?? null;
        $result->postAddressIds = $json['postAddressIds'] ?? [];
        $result->communication = Communication::fromJson($json['communication'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'salutation' => $this->getSalutation(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'postAddressIds' => $this->getPostAddressIds(),
            'communication' => $this->getCommunication() ? $this->getCommunication()->toJson() : null
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof ContactCreate &&
            $this->salutation === $other->salutation &&
            $this->firstName === $other->firstName &&
            $this->lastName === $other->lastName &&
            $this->postAddressIds === $other->postAddressIds &&
            $this->communication->equals($other->communication);
    }

    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    public function withSalutation(string $salutation): ContactCreate
    {
        $clone = clone $this;
        $clone->salutation = $salutation;
        return $clone;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function withFirstName(string $firstName): ContactCreate
    {
        $clone = clone $this;
        $clone->firstName = $firstName;
        return $clone;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function withLastName(string $lastName): ContactCreate
    {
        $clone = clone $this;
        $clone->lastName = $lastName;
        return $clone;
    }

    public function getPostAddressIds(): ?array
    {
        return $this->postAddressIds;
    }

    public function withPostAddressIds(?array $postAddressIds): ContactCreate
    {
        $clone = clone $this;
        $clone->postAddressIds = $postAddressIds;
        return $clone;
    }

    public function getCommunication(): ?Communication
    {
        return $this->communication;
    }

    public function withCommunication(Communication $communication): ContactCreate
    {
        $clone = clone $this;
        $clone->communication = $communication;
        return $clone;
    }
}
