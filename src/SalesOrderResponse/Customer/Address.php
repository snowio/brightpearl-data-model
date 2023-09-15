<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer;

class Address
{
    /** @var string|null $addressFullName */
    protected $addressFullName;
    /** @var string|null $companyName */
    protected $companyName;
    /** @var string|null $addressLine1 */
    protected $addressLine1;
    /** @var string|null $addressLine2 */
    protected $addressLine2;
    /** @var string|null $addressLine3 */
    protected $addressLine3;
    /** @var string|null $addressLine4 */
    protected $addressLine4;
    /** @var string|null $postalCode */
    protected $postalCode;
    /** @var string|null $countryIsoCode */
    protected $countryIsoCode;
    /** @var string|null $telephone */
    protected $telephone;
    /** @var string|null $mobileTelephone */
    protected $mobileTelephone;
    /** @var string|null $email */
    protected $email;
    /** @var string|null $fax */
    protected $fax;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
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
        $result->postalCode = is_string($json['postalcode']) ? $json['postalcode'] : null;
        $result->countryIsoCode = is_string($json['countryIsoCode']) ? $json['countryIsoCode'] : null;
        $result->telephone = is_string($json['telephone']) ? $json['telephone'] : null;
        $result->mobileTelephone = is_string($json['mobileTelephone']) ? $json['mobileTelephone'] : null;
        $result->email = is_string($json['email']) ? $json['email'] : null;
        $result->fax = is_string($json['fax']) ? $json['fax'] : null;
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
            'postalcode' => $this->getPostalCode(),
            'countryIsoCode' => $this->getCountryIsoCode(),
            'telephone' => $this->getTelephone(),
            'mobileTelephone' => $this->getMobileTelephone(),
            'email' => $this->getEmail(),
            'fax' => $this->getFax(),
        ];
    }

    /**
     * @param string|null $addressFullName
     * @return Address
     */
    public function withAddressFullName(?string $addressFullName): Address
    {
        $result = clone $this;
        $result->addressFullName = $addressFullName;
        return $result;
    }

    /**
     * @param string|null $companyName
     * @return Address
     */
    public function withCompanyName(?string $companyName): Address
    {
        $result = clone $this;
        $result->companyName = $companyName;
        return $result;
    }

    /**
     * @param string|null $addressLine1
     * @return Address
     */
    public function withAddressLine1(?string $addressLine1): Address
    {
        $result = clone $this;
        $result->addressLine1 = $addressLine1;
        return $result;
    }

    /**
     * @param string|null $addressLine2
     * @return Address
     */
    public function withAddressLine2(?string $addressLine2): Address
    {
        $result = clone $this;
        $result->addressLine2 = $addressLine2;
        return $result;
    }

    /**
     * @param string|null $addressLine3
     * @return Address
     */
    public function withAddressLine3(?string $addressLine3): Address
    {
        $result = clone $this;
        $result->addressLine3 = $addressLine3;
        return $result;
    }

    /**
     * @param string|null $addressLine4
     * @return Address
     */
    public function withAddressLine4(?string $addressLine4): Address
    {
        $result = clone $this;
        $result->addressLine4 = $addressLine4;
        return $result;
    }

    /**
     * @param string|null $postalCode
     * @return Address
     */
    public function withPostalCode(?string $postalCode): Address
    {
        $result = clone $this;
        $result->postalCode = $postalCode;
        return $result;
    }

    /**
     * @param string|null $countryIsoCode
     * @return Address
     */
    public function withCountryIsoCode(?string $countryIsoCode): Address
    {
        $result = clone $this;
        $result->countryIsoCode = $countryIsoCode;
        return $result;
    }

    /**
     * @param string|null $telephone
     * @return Address
     */
    public function withTelephone(?string $telephone): Address
    {
        $result = clone $this;
        $result->telephone = $telephone;
        return $result;
    }

    /**
     * @param string|null $mobileTelephone
     * @return Address
     */
    public function withMobileTelephone(?string $mobileTelephone): Address
    {
        $result = clone $this;
        $result->mobileTelephone = $mobileTelephone;
        return $result;
    }

    /**
     * @param string|null $email
     * @return Address
     */
    public function withEmail(?string $email): Address
    {
        $result = clone $this;
        $result->email = $email;
        return $result;
    }

    /**
     * @param string|null $fax
     * @return Address
     */
    public function withFax(?string $fax): Address
    {
        $result = clone $this;
        $result->fax = $fax;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @return string|null
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * @return string|null
     */
    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @return string|null
     */
    public function getMobileTelephone(): ?string
    {
        return $this->mobileTelephone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }
}
