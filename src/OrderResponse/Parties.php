<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

class Parties
{
    /** @var int|null $contactId */
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
    /** @var string|null $country */
    private $country;
    /** @var string|null $telephone */
    private $telephone;
    /** @var string|null $mobileTelephone */
    private $mobileTelephone;
    /** @var string|null $fax */
    private $fax;
    /** @var string|null $email */
    private $email;
    /** @var int|null $countryId */
    private $countryId;
    /** @var string|null $countryIsoCode */
    private $countryIsoCode;
    /** @var string|null $countryIsoCode3 */
    private $countryIsoCode3;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string,mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->contactId = is_numeric($json['contactId']) ? (int)$json['contactId'] : null;
        $result->addressFullName = is_string($json['addressFullName']) ? $json['addressFullName'] : null;
        $result->companyName = is_string($json['companyName']) ? $json['companyName'] : null;
        $result->addressLine1 = is_string($json['addressLine1']) ? $json['addressLine1'] : null;
        $result->addressLine2 = is_string($json['addressLine2']) ? $json['addressLine2'] : null;
        $result->addressLine3 = is_string($json['addressLine3']) ? $json['addressLine3'] : null;
        $result->addressLine4 = is_string($json['addressLine4']) ? $json['addressLine4'] : null;
        $result->postalCode = is_string($json['postalCode']) ? $json['postalCode'] : null;
        $result->country = is_string($json['country']) ? $json['country'] : null;
        $result->telephone = is_string($json['telephone']) ? $json['telephone'] : null;
        $result->mobileTelephone = is_string($json['mobileTelephone']) ? $json['mobileTelephone'] : null;
        $result->fax = is_string($json['fax']) ? $json['fax'] : null;
        $result->email = is_string($json['email']) ? $json['email'] : null;
        $result->countryId = is_numeric($json['countryId']) ? (int)$json['countryId'] : null;
        $result->countryIsoCode = is_string($json['countryIsoCode']) ? $json['countryIsoCode'] : null;
        $result->countryIsoCode3 = is_string($json['countryIsoCode3']) ? $json['countryIsoCode3'] : null;

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
     * @param int $contactId
     * @return $this
     */
    public function withContactId(int $contactId): Parties
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    /**
     * @param string $addressFullName
     * @return $this
     */
    public function withAddressFullName(string $addressFullName): Parties
    {
        $clone = clone $this;
        $clone->addressFullName = $addressFullName;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    /**
     * @param string $companyName
     * @return $this
     */
    public function withCompanyName(string $companyName): Parties
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
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
     * @param string $addressLine1
     * @return $this
     */
    public function withAddressLine1(string $addressLine1): Parties
    {
        $clone = clone $this;
        $clone->addressLine1 = $addressLine1;
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
     * @param string $addressLine2
     * @return $this
     */
    public function withAddressLine2(string $addressLine2): Parties
    {
        $clone = clone $this;
        $clone->addressLine2 = $addressLine2;
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
     * @param string $addressLine3
     * @return $this
     */
    public function withAddressLine3(string $addressLine3): Parties
    {
        $clone = clone $this;
        $clone->addressLine3 = $addressLine3;
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
     * @param string $addressLine4
     * @return $this
     */
    public function withAddressLine4(string $addressLine4): Parties
    {
        $clone = clone $this;
        $clone->addressLine4 = $addressLine4;
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
     * @param string $postalCode
     * @return $this
     */
    public function withPostalCode(string $postalCode): Parties
    {
        $clone = clone $this;
        $clone->postalCode = $postalCode;
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
     * @param string $country
     * @return $this
     */
    public function withCountry(string $country): Parties
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
     * @param string $telephone
     * @return $this
     */
    public function withTelephone(string $telephone): Parties
    {
        $clone = clone $this;
        $clone->telephone = $telephone;
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
     * @param string $mobileTelephone
     * @return $this
     */
    public function withMobileTelephone(string $mobileTelephone): Parties
    {
        $clone = clone $this;
        $clone->mobileTelephone = $mobileTelephone;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getMobileTelephone(): ?string
    {
        return $this->mobileTelephone;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function withFax(string $fax): Parties
    {
        $clone = clone $this;
        $clone->fax = $fax;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function withEmail(string $email): Parties
    {
        $clone = clone $this;
        $clone->email = $email;
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
     * @param int $countryId
     * @return $this
     */
    public function withCountryId(int $countryId): Parties
    {
        $clone = clone $this;
        $clone->countryId = $countryId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    /**
     * @param string $countryIsoCode
     * @return $this
     */
    public function withCountryIsoCode(string $countryIsoCode): Parties
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
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
     * @param string $countryIsoCode3
     * @return $this
     */
    public function withCountryIsoCode3(string $countryIsoCode3): Parties
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
}
