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
    /** @var Communication|null $communication */
    private $communication;

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
        $communication = Communication::create();
        $result = new self();
        $result->salutation = is_string($json['salutation']) ? $json['salutation'] : null;
        $result->firstName = is_string($json['firstName']) ? $json['firstName'] : null;
        $result->lastName = is_string($json['lastName']) ? $json['lastName'] : null;
        $result->postAddressIds = is_array($json['postAddressIds']) ? $json['postAddressIds'] : [];
        $result->communication = $communication->fromJson(is_array($json['communication']) ? $json['communication'] : []);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $communication = is_null($this->getCommunication()) ? [] : $this->getCommunication()->toJson();
        return [
            'salutation' => $this->getSalutation(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'postAddressIds' => $this->getPostAddressIds(),
            'communication' => $communication
        ];
    }

    /**
     * @param ContactCreate $contactCreateToCompare
     * @return bool
     */
    public function equals(ContactCreate $contactCreateToCompare): bool
    {
        if ($this->getFirstName() !== $contactCreateToCompare->getFirstName()) {
            return false;
        }
        if ($this->getLastName() !== $contactCreateToCompare->getLastName()) {
            return false;
        }
        if ($this->getPostAddressIds() !== $contactCreateToCompare->getPostAddressIds()) {
            return false;
        }
        if ($this->getSalutation() !== $contactCreateToCompare->getSalutation()) {
            return false;
        }
        return !(!is_null($this->getCommunication()) && !is_null($contactCreateToCompare->getCommunication()) && !$this->getCommunication()->equals($contactCreateToCompare->getCommunication()));
    }

    /**
     * @return string|null
     */
    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     * @return ContactCreate
     */
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

    /**
     * @param string $firstName
     * @return ContactCreate
     */
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

    /**
     * @param string $lastName
     * @return ContactCreate
     */
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
     * @param array<mixed>|null $postAddressIds
     */
    public function withPostAddressIds(?array $postAddressIds): ContactCreate
    {
        $clone = clone $this;
        $clone->postAddressIds = $postAddressIds;
        return $clone;
    }

    /**
     * @return Communication|null
     */
    public function getCommunication(): ?Communication
    {
        return $this->communication;
    }

    /**
     * @param Communication $communication
     * @return ContactCreate
     */
    public function withCommunication(Communication $communication): ContactCreate
    {
        $clone = clone $this;
        $clone->communication = $communication;
        return $clone;
    }
}

