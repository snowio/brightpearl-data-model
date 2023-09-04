<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\ContactCreate\Communication;

class ContactCreate
{
    /** @var string|null $salutation */
    private $salutation;
    /** @var string|null $firstName */
    private $firstName;
    /** @var string|null $lastName */
    private $lastName;
    /** @var mixed[]|null $postAddressIds */
    private $postAddressIds;
    /** @var \SnowIO\BrightpearlDataModel\ContactCreate\Communication|null $communication */
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
        $communication = Communication::create();
        $result = new self();
        $result->salutation = $json['salutation'] ?? null;
        $result->firstName = $json['firstName'] ?? null;
        $result->lastName = $json['lastName'] ?? null;
        $result->postAddressIds = $json['postAddressIds'] ?? null;
        $result->communication = $communication->fromJson($json['communication']);
        return $result;
    }

    /**
     * @return array<mixed>
     */
    public function toJson(): array
    {
        return ['salutation' => $this->getSalutation() ?? null, 'firstName' => $this->getFirstName(), 'lastName' => $this->getLastName(), 'postAddressIds' => $this->getPostAddressIds(), 'communication' => is_null($this->getCommunication()) ? [] : $this->getCommunication()->toJson()];
    }

    public function equals(ContactCreate $contactCreateToCompare): bool
    {
        if ($this->getSalutation() !== $contactCreateToCompare->getSalutation()) {
            return false;
        }
        if ($this->getFirstName() !== $contactCreateToCompare->getFirstName()) {
            return false;
        }
        if ($this->getLastName() !== $contactCreateToCompare->getLastName()) {
            return false;
        }
        if ($this->getPostAddressIds() !== $contactCreateToCompare->getPostAddressIds()) {
            return false;
        }
        return $this->getCommunication() === $contactCreateToCompare->getCommunication();
    }

    /**
     * @return string|null
     */
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

    /**
     * @return string|null
     */
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

    /**
     * @return string|null
     */
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

    /**
     * @return array<mixed>|null
     */
    public function getPostAddressIds(): ?array
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
