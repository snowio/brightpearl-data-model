<?php

namespace SnowIO\BrightpearlDataModel\Order\Parties;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Supplier implements ModelInterface
{
    /** @var string|null $contactId */
    private $contactId;

    /** @var string|null $addressFullName */
    private $addressFullName;
    /** @var string|null $companyName */
    private $companyName;

    /** @var string|null $addressLine1 */
    private $addressLine1;

    /** @var string|null $addressLine2 */
    private $addressLine2;

    /** @var string|null $addressLine3 */
    private $addressLine3;
    /** @var string|null $addressLine4 */
    private $addressLine4;

    /** @var string|null $postalCode */
    private $postalCode;

    /** @var string|null $countryId */
    private $countryId;

    /** @var string|null $countryIsoCode */
    private $countryIsoCode;

    /** @var string|null $telephone */
    private $telephone;
    /** @var string|null $mobileTelephone */
    private $mobileTelephone;

    /** @var string|null $fax */
    private $fax;

    /** @var string|null $email */
    private $email;

    /** @var string|null $country */
    private $country;

    /** @var string|null $countryIsoCode3 */
    private $countryIsoCode3;

    /**
     * @return ModelInterface
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->contactId = $json['contactId'] ?? null;
        $result->addressFullName = $json['addressFullName'] ?? null;
        $result->companyName = $json['companyName'] ?? null;
        $result->addressLine1 = $json['addressLine1'] ?? null;
        $result->addressLine2 = $json['addressLine2'] ?? null;
        $result->addressLine3 = $json['addressLine3'] ?? null;
        $result->addressLine4 = $json['addressLine4'] ?? null;
        $result->postalCode = $json['postalCode'] ?? null;
        $result->country = $json['country'] ?? null;
        $result->countryId = $json['countryId'] ?? null;
        $result->countryIsoCode = $json['countryIsoCode'] ?? null;
        $result->telephone = $json['telephone'] ?? null;
        $result->mobileTelephone = $json['mobileTelephone'] ?? null;
        $result->fax = $json['fax'] ?? null;
        $result->email = $json['email'] ?? null;
        $result->countryIsoCode3 = $json['countryIsoCode3'] ?? null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'contactId' => $this->getContactId(),
            'addressFullName' => $this->getAddressFullName(),
            'companyName' => $this->getCompanyName(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'addressLine4' => $this->getAddressLine4(),
            'postalCode' => $this->getPostalCode(),
            'country' => $this->getCountry(),
            'telephone' => $this->getTelephone(),
            'mobileTelephone' => $this->getMobileTelephone(),
            'fax' => $this->getFax(),
            'email' => $this->getEmail(),
            'countryId' => $this->getCountryId(),
            'countryIsoCode' => $this->getCountryIsoCode(),
            'countryIsoCode3' => $this->getCountryIsoCode3()
        ];
    }

    /**
     * @param ModelInterface $deliveryToCompare
     * @return bool
     */
    public function equals(ModelInterface $deliveryToCompare): bool
    {
        if (!$deliveryToCompare instanceof Delivery) {
            return false;
        }
        if ($this->getContactId() !== $deliveryToCompare->getCountryId()) {
            return false;
        }

        if ($this->getAddressFullName() !== $deliveryToCompare->getAddressFullName()) {
            return false;
        }
        if ($this->getCompanyName() !== $deliveryToCompare->getCompanyName()) {
            return false;
        }
        if ($this->getAddressLine1() !== $deliveryToCompare->getAddressLine1()) {
            return false;
        }
        if ($this->getAddressLine2() !== $deliveryToCompare->getAddressLine2()) {
            return false;
        }
        if ($this->getAddressLine3() !== $deliveryToCompare->getAddressLine3()) {
            return false;
        }
        if ($this->getAddressLine4() !== $deliveryToCompare->getAddressLine4()) {
            return false;
        }
        if ($this->getPostalCode() !== $deliveryToCompare->getPostalCode()) {
            return false;
        }
        if ($this->getCountry() !== $deliveryToCompare->getCountry()) {
            return false;
        }
        if ($this->getCountryId() !== $deliveryToCompare->getCountryId()) {
            return false;
        }
        if ($this->getCountryIsoCode() !== $deliveryToCompare->getCountryIsoCode()) {
            return false;
        }
        if ($this->getCountryIsoCode3() !== $deliveryToCompare->getCountryIsoCode3()) {
            return false;
        }
        if ($this->getTelephone() !== $deliveryToCompare->getTelephone()) {
            return false;
        }
        if ($this->getMobileTelephone() !== $deliveryToCompare->getMobileTelephone()) {
            return false;
        }
        if ($this->getFax() !== $deliveryToCompare->getFax()) {
            return false;
        }
        return $this->getEmail() === $deliveryToCompare->getEmail();
    }

    /**
     * @param string $contactId
     * @return Supplier
     */
    public function withContactId(string $contactId): ModelInterface
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    /**
     * @param string $countryIsoCode3
     * @return $this
     */
    public function withCountryIsoCode3(string $countryIsoCode3): ModelInterface
    {
        $clone = clone $this;
        $clone->countryIsoCode3 = $countryIsoCode3;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCountryIsoCode3(): ?string
    {
        return $this->countryIsoCode3;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function withCountry(string $country):ModelInterface
    {
        $clone = clone $this;
        $clone->country = $country;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    /**
     * @param string $addressFullName
     * @return $this
     */
    public function withAddressFullName(string $addressFullName): ModelInterface
    {
        $clone = clone $this;
        $clone->addressFullName = $addressFullName;
        return $clone;
    }

    /**
     * @return string
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return $this
     */
    public function withCompanyName(string $companyName): ModelInterface
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
        return $clone;
    }

    /**
     * @return string
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     * @return $this
     */
    public function withAddressLine1(string $addressLine1): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine1 = $addressLine1;
        return $clone;
    }

    /**
     * @return string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     * @return $this
     */
    public function withAddressLine2(string $addressLine2): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine2 = $addressLine2;
        return $clone;
    }

    /**
     * @return string
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * @param string $addressLine3
     * @return $this
     */
    public function withAddressLine3(string $addressLine3): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine3 = $addressLine3;
        return $clone;
    }

    /**
     * @return string
     */
    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    /**
     * @param string $addressLine4
     * @return $this
     */
    public function withAddressLine4(string $addressLine4): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine4 = $addressLine4;
        return $clone;
    }

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return $this
     */
    public function withPostalCode(string $postalCode): ModelInterface
    {
        $clone = clone $this;
        $clone->postalCode = $postalCode;
        return $clone;
    }

    /**
     * @return string
     */
    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    /**
     * @param string $countryId
     * @return $this
     */
    public function withCountryId(string $countryId): ModelInterface
    {
        $clone = clone $this;
        $clone->countryId = $countryId;
        return $clone;
    }

    /**
     * @return string
     */
    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    /**
     * @param string $countryIsoCode
     * @return $this
     */
    public function withCountryIsoCode(string $countryIsoCode): ModelInterface
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
        return $clone;
    }

    /**
     * @return string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return $this
     */
    public function withTelephone(string $telephone): ModelInterface
    {
        $clone = clone $this;
        $clone->telephone = $telephone;
        return $clone;
    }

    /**
     * @return string
     */
    public function getMobileTelephone(): ?string
    {
        return $this->mobileTelephone;
    }

    /**
     * @param string $mobileTelephone
     * @return $this
     */
    public function withMobileTelephone(string $mobileTelephone): ModelInterface
    {
        $clone = clone $this;
        $clone->mobileTelephone = $mobileTelephone;
        return $clone;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function withEmail(string $email): ModelInterface
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }

    /**
     * @return string
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function withFax(string $fax): ModelInterface
    {
        $clone = clone $this;
        $clone->fax = $fax;
        return $clone;
    }
}
