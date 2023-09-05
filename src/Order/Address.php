<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Address
{
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
    /** @var string|null $countryIsoCode */
    private $countryIsoCode;
    /** @var string|null $telephone */
    private $telephone;
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

        $result->addressFullName = is_string($json['addressFullName']) ? $json['addressFullName'] : null;
        $result->companyName = is_string($json['companyName']) ? $json['companyName'] : null;
        $result->addressLine1 = is_string($json['addressLine1']) ? $json['addressLine1'] : null;
        $result->addressLine2 = is_string($json['addressLine2']) ? $json['addressLine2'] : null;
        $result->addressLine3 = is_string($json['addressLine3']) ? $json['addressLine3'] : null;
        $result->addressLine4 = is_string($json['addressLine4']) ? $json['addressLine4'] : null;
        $result->postalCode = is_string($json['postalCode']) ? $json['postalCode'] : null;
        $result->countryIsoCode = is_string($json['countryIsoCode']) ? $json['countryIsoCode'] : null;
        $result->telephone = is_string($json['telephone']) ? $json['telephone'] : null;
        $result->email = is_string($json['email']) ? $json['email'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'addressFullName' => $this->getAddressFullName(),
            'companyName' => $this->getCompanyName(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'addressLine4' => $this->getAddressLine4(),
            'postalCode' => $this->getPostalCode(),
            'countryIsoCode' => $this->getCountryIsoCode(),
            'telephone' => $this->getTelephone(),
            'email' => $this->getEmail()
        ];
    }

    /**
     * @param Address $addressToCompare
     * @return bool
     */
    public function equals(Address $addressToCompare): bool
    {
        if ($this->getAddressFullName() !== $addressToCompare->getAddressFullName()) {
            return false;
        }
        if ($this->getCompanyName() !== $addressToCompare->getCompanyName()) {
            return false;
        }
        if ($this->getAddressLine1() !== $addressToCompare->getAddressLine1()) {
            return false;
        }
        if ($this->getAddressLine2() !== $addressToCompare->getAddressLine2()) {
            return false;
        }
        if ($this->getAddressLine3() !== $addressToCompare->getAddressLine3()) {
            return false;
        }
        if ($this->getAddressLine4() !== $addressToCompare->getAddressLine4()) {
            return false;
        }
        if ($this->getPostalCode() !== $addressToCompare->getPostalCode()) {
            return false;
        }
        if ($this->getCountryIsoCode() !== $addressToCompare->getCountryIsoCode()) {
            return false;
        }
        if ($this->getEmail() !== $addressToCompare->getEmail()) {
            return false;
        }
        return $this->getTelephone() === $addressToCompare->getTelephone();
    }

    /**
     * @return string|null
     */
    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    /**
     * @param string|null $addressFullName
     * @return Address
     */
    public function withAddressFullName(?string $addressFullName): Address
    {
        $clone = clone $this;
        $clone->addressFullName = $addressFullName;
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
     * @return Address
     */
    public function withCompanyName(?string $companyName): Address
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param string|null $addressLine1
     * @return Address
     */
    public function withAddressLine1(?string $addressLine1): Address
    {
        $clone = clone $this;
        $clone->addressLine1 = $addressLine1;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param string|null $addressLine2
     * @return Address
     */
    public function withAddressLine2(?string $addressLine2): Address
    {
        $clone = clone $this;
        $clone->addressLine2 = $addressLine2;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * @param string|null $addressLine3
     * @return Address
     */
    public function withAddressLine3(?string $addressLine3): Address
    {
        $clone = clone $this;
        $clone->addressLine3 = $addressLine3;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    /**
     * @param string|null $addressLine4
     * @return Address
     */
    public function withAddressLine4(?string $addressLine4): Address
    {
        $clone = clone $this;
        $clone->addressLine4 = $addressLine4;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     * @return Address
     */
    public function withPostalCode(?string $postalCode): Address
    {
        $clone = clone $this;
        $clone->postalCode = $postalCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    /**
     * @param string|null $countryIsoCode
     * @return Address
     */
    public function withCountryIsoCode(?string $countryIsoCode): Address
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     * @return Address
     */
    public function withTelephone(?string $telephone): Address
    {
        $clone = clone $this;
        $clone->telephone = $telephone;
        return $clone;
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
     * @return Address
     */
    public function withEmail(?string $email): Address
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }
}
