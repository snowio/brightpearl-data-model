<?php

namespace SnowIO\BrightpearlDataModel;

class Contact implements ModelInterface
{
    /** @var int|null $contactId */
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
        $result->contactId = $json['contactId'] ?? null;
        $result->primaryEmail = $json['primaryEmail'] ?? null;
        $result->secondaryEmail = $json['secondaryEmail'] ?? null;
        $result->tertiaryEmail = $json['tertiaryEmail'] ?? null;
        $result->firstName = $json['firstName'] ?? null;
        $result->lastName = $json['lastName'] ?? null;
        $result->isSupplier = $json['isSupplier'] ?? null;
        $result->companyName = $json['companyName'] ?? null;
        $result->isStaff = $json['isStaff'] ?? null;
        $result->isCustomer = $json['isCustomer'];
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

    public function toJson(): array
    {
        return [
            'contactId' => $this->getContactId(),
            'primaryEmail' => $this->getPrimaryEmail(),
            'secondaryEmail' => $this->getSecondaryEmail(),
            'tertiaryEmail' => $this->getTertiaryEmail(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'isSupplier' => $this->getIsSupplier(),
            'companyName' => $this->getCompanyName(),
            'isStaff' => $this->getIsStaff(),
            'isCustomer' => $this->getIsCustomer(),
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'lastContactedOn' => $this->getLastContactedOn(),
            'lastOrderedOn' => $this->getLastOrderedOn(),
            'nominalCode' => $this->getNominalCode(),
            'isPrimary' => $this->getIsPrimary(),
            'pri' => $this->getPri(),
            'sec' => $this->getSec(),
            'mob' => $this->getMob(),
            'exactCompanyName' => $this->getExactCompanyName(),
            'title' => $this->getTitle()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Contact &&
            $this->contactId === $other->contactId &&
            $this->primaryEmail === $other->primaryEmail &&
            $this->secondaryEmail === $other->secondaryEmail &&
            $this->tertiaryEmail === $other->tertiaryEmail &&
            $this->firstName === $other->firstName &&
            $this->lastName === $other->lastName &&
            $this->isSupplier === $other->isSupplier &&
            $this->companyName === $other->companyName &&
            $this->isStaff === $other->isStaff &&
            $this->isCustomer === $other->isCustomer &&
            $this->createdOn === $other->createdOn &&
            $this->updatedOn === $other->updatedOn &&
            $this->lastContactedOn === $other->lastContactedOn &&
            $this->lastOrderedOn === $other->lastOrderedOn &&
            $this->nominalCode === $other->nominalCode &&
            $this->isPrimary === $other->isPrimary &&
            $this->pri === $other->pri &&
            $this->sec === $other->sec &&
            $this->mob === $other->mob &&
            $this->exactCompanyName === $other->exactCompanyName &&
            $this->title === $other->title;
    }

    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    public function withContactId(int $contactId): Contact
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    public function getPrimaryEmail(): ?string
    {
        return $this->primaryEmail;
    }

    public function withPrimaryEmail(?string $primaryEmail): Contact
    {
        $clone = clone $this;
        $clone->primaryEmail = $primaryEmail;
        return $clone;
    }

    public function getSecondaryEmail(): ?string
    {
        return $this->secondaryEmail;
    }

    public function withSecondaryEmail(?string $secondaryEmail): Contact
    {
        $clone = clone $this;
        $clone->secondaryEmail = $secondaryEmail;
        return $clone;
    }

    public function getTertiaryEmail(): ?string
    {
        return $this->tertiaryEmail;
    }

    public function withTertiaryEmail(?string $tertiaryEmail): Contact
    {
        $clone = clone $this;
        $clone->tertiaryEmail = $tertiaryEmail;
        return $clone;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function withFirstName(?string $firstName): Contact
    {
        $clone = clone $this;
        $clone->firstName = $firstName;
        return $clone;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function withLastName(?string $lastName): Contact
    {
        $clone = clone $this;
        $clone->lastName = $lastName;
        return $clone;
    }

    public function getIsSupplier(): ?bool
    {
        return $this->isSupplier;
    }

    public function withIsSupplier(?bool $isSupplier): Contact
    {
        $clone = clone $this;
        $clone->isSupplier = $isSupplier;
        return $clone;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function withCompanyName(?string $companyName): Contact
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
        return $clone;
    }

    public function getIsStaff(): ?bool
    {
        return $this->isStaff;
    }

    public function withIsStaff(?bool $isStaff): Contact
    {
        $clone = clone $this;
        $clone->isStaff = $isStaff;
        return $clone;
    }

    public function getIsCustomer(): ?bool
    {
        return $this->isCustomer;
    }

    public function withIsCustomer(?bool $isCustomer): Contact
    {
        $clone = clone $this;
        $clone->isCustomer = $isCustomer;
        return $clone;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function withCreatedOn(?string $createdOn): Contact
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    public function withUpdatedOn(?string $updatedOn): Contact
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    public function getLastContactedOn(): ?string
    {
        return $this->lastContactedOn;
    }

    public function withLastContactedOn(?string $lastContactedOn): Contact
    {
        $clone = clone $this;
        $clone->lastContactedOn = $lastContactedOn;
        return $clone;
    }

    public function getLastOrderedOn(): ?string
    {
        return $this->lastOrderedOn;
    }

    public function withLastOrderedOn(?string $lastOrderedOn): Contact
    {
        $clone = clone $this;
        $clone->lastOrderedOn = $lastOrderedOn;
        return $clone;
    }

    public function getNominalCode(): ?int
    {
        return $this->nominalCode;
    }

    public function withNominalCode(?int $nominalCode): Contact
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
        return $clone;
    }

    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    public function withIsPrimary(?bool $isPrimary): Contact
    {
        $clone = clone $this;
        $clone->isPrimary = $isPrimary;
        return $clone;
    }

    public function getPri(): ?string
    {
        return $this->pri;
    }

    public function withPri(?string $pri): Contact
    {
        $clone = clone $this;
        $clone->pri = $pri;
        return $clone;
    }

    public function getSec(): ?string
    {
        return $this->sec;
    }

    public function withSec(?string $sec): Contact
    {
        $clone = clone $this;
        $clone->sec = $sec;
        return $clone;
    }

    public function getMob(): ?string
    {
        return $this->mob;
    }

    public function withMob(?string $mob): Contact
    {
        $clone = clone $this;
        $clone->mob = $mob;
        return $clone;
    }

    public function getExactCompanyName(): ?string
    {
        return $this->exactCompanyName;
    }

    public function withExactCompanyName(?string $exactCompanyName): Contact
    {
        $clone = clone $this;
        $clone->exactCompanyName = $exactCompanyName;
        return $clone;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function withTitle(?string $title): Contact
    {
        $clone = clone $this;
        $clone->title = $title;
        return $clone;
    }
}
