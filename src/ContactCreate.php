<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication;

class ContactCreate
{
    /** @var string|null $salutation */
    private $salutation;
    /** @var string|null  $firstName */
    private $firstName;
    /** @var string|null  $lastName */
    private $lastName;
    /** @var array<mixed> $postAddressIds */
    private $postAddressIds;
    /** @var Communication $communication */
    private $communication;

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
        $result->salutation = $json['salutation'] ?? null;
        $result->firstName = $json['firstName'] ?? null;
        $result->lastName = $json['lastName'] ?? null;
        $result->postAddressIds = $json['postAddressIds'] ?? null;
        $result->communication = Communication::fromJson($json['communication']);
        return $result;
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        $json = [];
        $json['salutation'] = $this->getSalutation() ?? null;
        $json['firstName'] = $this->getFirstName();
        $json['lastName'] = $this->getLastName();
        $json['postAddressIds'] = $this->getPostAddressIds();
        $json['communication'] = $this->getCommunication();
        return $json;
    }

    public function equals(ContactCreate $contactCreateToCompare): bool
    {
        return ($this->getSalutation() === $contactCreateToCompare->getSalutation()) &&
            ($this->getFirstName() === $contactCreateToCompare->getFirstName()) &&
            ($this->getLastName() === $contactCreateToCompare->getLastName()) &&
            ($this->getPostAddressIds() === $contactCreateToCompare->getPostAddressIds()) &&
            ($this->getCommunication() === $contactCreateToCompare->getCommunication());
    }

    /**
     * @return string|null
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    public function withSalutation(string $salutation): ContactCreate
    {
        $clone = clone $this;
        $clone->salutation = $salutation;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function withFirstName(string $firstName): ContactCreate
    {
        $clone = clone $this;
        $clone->firstName = $firstName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function withLastName(string $lastName): ContactCreate
    {
        $clone = clone $this;
        $clone->lastName = $lastName;
        return $clone;
    }

    /**
     * @return array<mixed>|null
     */
    public function getPostAddressIds()
    {
        return $this->postAddressIds;
    }

    /**
     * @param array<mixed> $postAddressIds
     */
    public function withPostAddressIds(array $postAddressIds): ContactCreate
    {
        $clone = clone $this;
        $clone->postAddressIds = $postAddressIds;
        return $clone;
    }

    public function getCommunication(): Communication
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