<?php

namespace SnowIO\BrightpearlDataModel;

class Contact
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

        $result->contactId = is_numeric($json['contactId']) ? (int) $json['contactId'] : null;
        $result->primaryEmail = is_string($json['primaryEmail']) ? $json['primaryEmail'] : null;
        $result->secondaryEmail = is_string($json['secondaryEmail']) ? $json['secondaryEmail'] : null;
        $result->tertiaryEmail = is_string($json['tertiaryEmail']) ? $json['tertiaryEmail'] : null;
        $result->firstName = is_string($json['firstName']) ? $json['firstName'] : null;
        $result->lastName = is_string($json['lastName']) ? $json['lastName'] : null;
        $result->isSupplier = is_bool($json['isSupplier']) && $json['isSupplier'];
        $result->companyName = is_string($json['companyName']) ? $json['companyName'] : null;
        $result->isStaff = is_bool($json['isStaff']) && $json['isStaff'];
        $result->isCustomer = is_bool($json['isCustomer']) && $json['isCustomer'];
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->updatedOn = is_string($json['updatedOn']) ? $json['updatedOn'] : null;
        $result->lastContactedOn = is_string($json['lastContactedOn']) ? $json['lastContactedOn'] : null;
        $result->lastOrderedOn = is_string($json['lastOrderedOn']) ? $json['lastOrderedOn'] : null;
        $result->nominalCode = is_numeric($json['nominalCode']) ? (int) $json['nominalCode'] : null;
        $result->isPrimary = is_bool($json['isPrimary']) && $json['isPrimary'];
        $result->pri = is_string($json['pri']) ? $json['pri'] : null;
        $result->sec = is_string($json['sec']) ? $json['sec'] : null;
        $result->mob = is_string($json['mob']) ? $json['mob'] : null;
        $result->exactCompanyName = is_string($json['exactCompanyName']) ? $json['exactCompanyName'] : null;
        $result->title = is_string($json['title']) ? $json['title'] : null;

        return $result;
    }

    /**
     * @return array<mixed>
     */
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

    /**
     * @param Contact $contactToCompare
     * @return bool
     */
    public function equals(Contact $contactToCompare): bool
    {
        if ($this->getContactId() !== $contactToCompare->getContactId()) {
            return false;
        }
        if ($this->getPrimaryEmail() !== $contactToCompare->getPrimaryEmail()) {
            return false;
        }
        if ($this->getSecondaryEmail() !== $contactToCompare->getSecondaryEmail()) {
            return false;
        }
        if ($this->getTertiaryEmail() !== $contactToCompare->getTertiaryEmail()) {
            return false;
        }
        if ($this->getFirstName() !== $contactToCompare->getFirstName()) {
            return false;
        }
        if ($this->getLastName() !== $contactToCompare->getLastName()) {
            return false;
        }
        if ($this->getIsSupplier() !== $contactToCompare->getIsSupplier()) {
            return false;
        }
        if ($this->getCompanyName() !== $contactToCompare->getCompanyName()) {
            return false;
        }
        if ($this->getIsStaff() !== $contactToCompare->getIsStaff()) {
            return false;
        }
        if ($this->getIsCustomer() !== $contactToCompare->getIsCustomer()) {
            return false;
        }
        if ($this->getCreatedOn() !== $contactToCompare->getCreatedOn()) {
            return false;
        }
        if ($this->getUpdatedOn() !== $contactToCompare->getUpdatedOn()) {
            return false;
        }
        if ($this->getLastContactedOn() !== $contactToCompare->getLastContactedOn()) {
            return false;
        }
        if ($this->getLastOrderedOn() !== $contactToCompare->getLastOrderedOn()) {
            return false;
        }
        if ($this->getNominalCode() !== $contactToCompare->getNominalCode()) {
            return false;
        }
        if ($this->getIsPrimary() !== $contactToCompare->getIsPrimary()) {
            return false;
        }
        if ($this->getPri() !== $contactToCompare->getPri()) {
            return false;
        }
        if ($this->getSec() !== $contactToCompare->getSec()) {
            return false;
        }
        if ($this->getMob() !== $contactToCompare->getMob()) {
            return false;
        }
        if ($this->getExactCompanyName() !== $contactToCompare->getExactCompanyName()) {
            return false;
        }
        if ($this->getTitle() !== $contactToCompare->getTitle()) {
            return false;
        }
        return $this->getTitle() === $contactToCompare->getTitle();
    }

    /**
     * @return int|null
     */
    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    /**
     * @param int $contactId
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
     */
    public function withTitle(?string $title): Contact
    {
        $clone = clone $this;
        $clone->title = $title;
        return $clone;
    }
}
