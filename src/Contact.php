<?php

namespace SnowIO\BrightpearlDataModel;

class Contact
{
    /** @var int $contactId */
    private $contactId;
    /** @var string|null $primaryEmail */
    private $primaryEmail;
    /** @var string|null $secondaryEmail */
    private $secondaryEmail;
    /** @var string|null $tertiaryEmail */
    private $tertiaryEmail;
    /** @var string|null $firstName */
    private $firstName;
    /** @var string|null $lastName */
    private $lastName;
    /** @var bool|null $isSupplier */
    private $isSupplier;
    /** @var string|null $companyName */
    private $companyName;
    /** @var bool|null $isStaff */
    private $isStaff;
    /** @var bool|null $isCustomer */
    private $isCustomer;
    /** @var string|null $createdOn */
    private $createdOn;
    /** @var string|null $updatedOn */
    private $updatedOn;
    /** @var string|null $lastContactedOn */
    private $lastContactedOn;
    /** @var string|null $lastOrderedOn */
    private $lastOrderedOn;
    /** @var int|null $nominalCode */
    private $nominalCode;
    /** @var bool|null $isPrimary */
    private $isPrimary;
    /** @var string|null $pri */
    private $pri;
    /** @var string|null $sec */
    private $sec;
    /** @var string|null $mob */
    private $mob;
    /** @var string|null $exactCompanyName */
    private $exactCompanyName;
    /** @var string|null $title */
    private $title;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->contactId = $json['contactId'];
        $result->primaryEmail = $json['primaryEmail'] ?? null;
        $result->secondaryEmail = $json['secondaryEmail'] ?? null;
        $result->tertiaryEmail = $json['tertiaryEmail'] ?? null;
        $result->firstName = $json['firstName'] ?? null;
        $result->lastName = $json['lastName'] ?? null;
        $result->isSupplier = $json['isSupplier'] ?? null;
        $result->companyName = $json['companyName'] ?? null;
        $result->isStaff = $json['isStaff'] ?? null;
        $result->isCustomer = $json['isCustomer'] ?? null;
        $result->createdOn = $json['createdOn'] ?? null;
        $result->updatedOn = $json['updatedOn'] ?? null;
        $result->lastContactedOn = $json['lastContactedOn'] ?? null;
        $result->lastOrderedOn = $json['lastOrderedOn'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->isPrimary = $json['isPrimary'] ?? null;
        $result->pri = $json['pri'] ?? null;
        $result->sec = $json['sec'] ?? null;
        $result->mob = $json['mob'] ?? null;
        $result->exactCompanyName = $json['exactCompanyName'] ?? null;
        $result->title = $json['title'] ?? null;

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['contactId'] = $this->getContactId();
        $json['primaryEmail'] = $this->getPrimaryEmail();
        $json['secondaryEmail'] = $this->getSecondaryEmail();
        $json['tertiaryEmail'] = $this->getTertiaryEmail();
        $json['firstName'] = $this->getFirstName();
        $json['lastName'] = $this->getLastName();
        $json['isSupplier'] = $this->getIsSupplier();
        $json['companyName'] = $this->getCompanyName();
        $json['isStaff'] = $this->getIsStaff();
        $json['isCustomer'] = $this->getIsCustomer();
        $json['createdOn'] = $this->getCreatedOn();
        $json['updatedOn'] = $this->getUpdatedOn();
        $json['lastContactedOn'] = $this->getLastContactedOn();
        $json['lastOrderedOn'] = $this->getLastOrderedOn();
        $json['nominalCode'] = $this->getNominalCode();
        $json['isPrimary'] = $this->getIsPrimary();
        $json['pri'] = $this->getPri();
        $json['sec'] = $this->getSec();
        $json['mob'] = $this->getMob();
        $json['exactCompanyName'] = $this->getExactCompanyName();
        $json['title'] = $this->getTitle();

        return $json;
    }

    /**
     * @param Contact $contactToCompare
     * @return bool
     */
    public function equals(Contact $contactToCompare): bool
    {
        return ($this->getContactId() === $contactToCompare->getContactId()) &&
            ($this->getPrimaryEmail() === $contactToCompare->getPrimaryEmail()) &&
            ($this->getSecondaryEmail() === $contactToCompare->getSecondaryEmail()) &&
            ($this->getTertiaryEmail() === $contactToCompare->getTertiaryEmail()) &&
            ($this->getFirstName() === $contactToCompare->getFirstName()) &&
            ($this->getLastName() === $contactToCompare->getLastName()) &&
            ($this->getIsSupplier() === $contactToCompare->getIsSupplier()) &&
            ($this->getCompanyName() === $contactToCompare->getCompanyName()) &&
            ($this->getIsStaff() === $contactToCompare->getIsStaff()) &&
            ($this->getIsCustomer() === $contactToCompare->getIsCustomer()) &&
            ($this->getCreatedOn() === $contactToCompare->getCreatedOn()) &&
            ($this->getUpdatedOn() === $contactToCompare->getUpdatedOn()) &&
            ($this->getLastContactedOn() === $contactToCompare->getLastContactedOn()) &&
            ($this->getLastOrderedOn() === $contactToCompare->getLastOrderedOn()) &&
            ($this->getNominalCode() === $contactToCompare->getNominalCode()) &&
            ($this->getIsPrimary() === $contactToCompare->getIsPrimary()) &&
            ($this->getPri() === $contactToCompare->getPri()) &&
            ($this->getSec() === $contactToCompare->getSec()) &&
            ($this->getMob() === $contactToCompare->getMob()) &&
            ($this->getExactCompanyName() === $contactToCompare->getExactCompanyName()) &&
            ($this->getTitle() === $contactToCompare->getTitle());
    }

    /**
     * @return int
     */
    public function getContactId(): int
    {
        return $this->contactId;
    }

    /**
     * @param int $contactId
     * @return Contact
     */
    public function withContactId(int $contactId): Contact
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPrimaryEmail(): ?string
    {
        return $this->primaryEmail;
    }

    /**
     * @param string|null $primaryEmail
     * @return Contact
     */
    public function withPrimaryEmail(?string $primaryEmail): Contact
    {
        $clone = clone $this;
        $clone->primaryEmail = $primaryEmail;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getSecondaryEmail(): ?string
    {
        return $this->secondaryEmail;
    }

    /**
     * @param string|null $secondaryEmail
     * @return Contact
     */
    public function withSecondaryEmail(?string $secondaryEmail): Contact
    {
        $clone = clone $this;
        $clone->secondaryEmail = $secondaryEmail;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTertiaryEmail(): ?string
    {
        return $this->tertiaryEmail;
    }

    /**
     * @param string|null $tertiaryEmail
     * @return Contact
     */
    public function withTertiaryEmail(?string $tertiaryEmail): Contact
    {
        $clone = clone $this;
        $clone->tertiaryEmail = $tertiaryEmail;
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
     * @param string|null $firstName
     * @return Contact
     */
    public function withFirstName(?string $firstName): Contact
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
     * @param string|null $lastName
     * @return Contact
     */
    public function withLastName(?string $lastName): Contact
    {
        $clone = clone $this;
        $clone->lastName = $lastName;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function getIsSupplier(): ?bool
    {
        return $this->isSupplier;
    }

    /**
     * @param bool|null $isSupplier
     * @return Contact
     */
    public function withIsSupplier(?bool $isSupplier): Contact
    {
        $clone = clone $this;
        $clone->isSupplier = $isSupplier;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     * @return Contact
     */
    public function withCompanyName(?string $companyName): Contact
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function getIsStaff(): ?bool
    {
        return $this->isStaff;
    }

    /**
     * @param bool|null $isStaff
     * @return Contact
     */
    public function withIsStaff(?bool $isStaff): Contact
    {
        $clone = clone $this;
        $clone->isStaff = $isStaff;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function getIsCustomer(): ?bool
    {
        return $this->isCustomer;
    }

    /**
     * @param bool|null $isCustomer
     * @return Contact
     */
    public function withIsCustomer(?bool $isCustomer): Contact
    {
        $clone = clone $this;
        $clone->isCustomer = $isCustomer;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    /**
     * @param string|null $createdOn
     * @return Contact
     */
    public function withCreatedOn(?string $createdOn): Contact
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    /**
     * @param string|null $updatedOn
     * @return Contact
     */
    public function withUpdatedOn(?string $updatedOn): Contact
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getLastContactedOn(): ?string
    {
        return $this->lastContactedOn;
    }

    /**
     * @param string|null $lastContactedOn
     * @return Contact
     */
    public function withLastContactedOn(?string $lastContactedOn): Contact
    {
        $clone = clone $this;
        $clone->lastContactedOn = $lastContactedOn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getLastOrderedOn(): ?string
    {
        return $this->lastOrderedOn;
    }

    /**
     * @param string|null $lastOrderedOn
     * @return Contact
     */
    public function withLastOrderedOn(?string $lastOrderedOn): Contact
    {
        $clone = clone $this;
        $clone->lastOrderedOn = $lastOrderedOn;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getNominalCode(): ?int
    {
        return $this->nominalCode;
    }

    /**
     * @param int|null $nominalCode
     * @return Contact
     */
    public function withNominalCode(?int $nominalCode): Contact
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    /**
     * @param bool|null $isPrimary
     * @return Contact
     */
    public function withIsPrimary(?bool $isPrimary): Contact
    {
        $clone = clone $this;
        $clone->isPrimary = $isPrimary;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPri(): ?string
    {
        return $this->pri;
    }

    /**
     * @param string|null $pri
     * @return Contact
     */
    public function withPri(?string $pri): Contact
    {
        $clone = clone $this;
        $clone->pri = $pri;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getSec(): ?string
    {
        return $this->sec;
    }

    /**
     * @param string|null $sec
     * @return Contact
     */
    public function withSec(?string $sec): Contact
    {
        $clone = clone $this;
        $clone->sec = $sec;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getMob(): ?string
    {
        return $this->mob;
    }

    /**
     * @param string|null $mob
     * @return Contact
     */
    public function withMob(?string $mob): Contact
    {
        $clone = clone $this;
        $clone->mob = $mob;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getExactCompanyName(): ?string
    {
        return $this->exactCompanyName;
    }

    /**
     * @param string|null $exactCompanyName
     * @return Contact
     */
    public function withExactCompanyName(?string $exactCompanyName): Contact
    {
        $clone = clone $this;
        $clone->exactCompanyName = $exactCompanyName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Contact
     */
    public function withTitle(?string $title): Contact
    {
        $clone = clone $this;
        $clone->title = $title;
        return $clone;
    }
}
