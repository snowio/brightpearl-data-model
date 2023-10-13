<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit\Delivery;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Address implements ModelInterface
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
    /** @var string|null $postCode */
    private $postCode;
    /** @var string|null $countryIsoCode */
    private $countryIsoCode;
    /** @var string|null $telephone */
    private $telephone;
    /** @var string|null $mobileTelephone */
    private $mobileTelephone;
    /** @var string|null $email */
    private $email;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->addressFullName = $json['addressFullName'] ?? null;
        $result->companyName = $json['companyName'] ?? null;
        $result->addressLine1 = $json['addressLine1'] ?? null;
        $result->addressLine2 = $json['addressLine2'] ?? null;
        $result->addressLine3 = $json['addressLine3'] ?? null;
        $result->addressLine4 = $json['addressLine4'] ?? null;
        $result->postCode =  $json['postcode'] ?? null;
        $result->countryIsoCode = $json['countryIsoCode'] ?? null;
        $result->telephone = $json['telephone'] ?? null;
        $result->mobileTelephone = $json['mobileTelephone'] ?? null;
        $result->email = $json['email'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'addressFullName' => $this->getAddressFullName(),
            'companyName' => $this->getCompanyName(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'addressLine4' => $this->getAddressLine4(),
            'postcode' => $this->getPostalCode(),
            'countryIsoCode' => $this->getCountryIsoCode(),
            'telephone' => $this->getTelephone(),
            'mobileTelephone' => $this->getMobileTelephone(),
            'email' => $this->getEmail(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return ($other instanceof Address) &&
            ($this->addressFullName === $other->addressFullName) &&
            ($this->companyName === $other->companyName) &&
            ($this->addressLine1 === $other->addressLine1) &&
            ($this->addressLine2 === $other->addressLine2) &&
            ($this->addressLine3 === $other->addressLine3) &&
            ($this->addressLine4 === $other->addressLine4) &&
            ($this->postCode === $other->postCode) &&
            ($this->countryIsoCode === $other->countryIsoCode) &&
            ($this->telephone === $other->telephone) &&
            ($this->mobileTelephone === $other->mobileTelephone) &&
            ($this->email === $other->email);
    }

    public function withAddressFullName(?string $addressFullName): Address
    {
        $result = clone $this;
        $result->addressFullName = $addressFullName;
        return $result;
    }

    public function withCompanyName(?string $companyName): Address
    {
        $result = clone $this;
        $result->companyName = $companyName;
        return $result;
    }

    public function withAddressLine1(?string $addressLine1): Address
    {
        $result = clone $this;
        $result->addressLine1 = $addressLine1;
        return $result;
    }

    public function withAddressLine2(?string $addressLine2): Address
    {
        $result = clone $this;
        $result->addressLine2 = $addressLine2;
        return $result;
    }

    public function withAddressLine3(?string $addressLine3): Address
    {
        $result = clone $this;
        $result->addressLine3 = $addressLine3;
        return $result;
    }

    public function withAddressLine4(?string $addressLine4): Address
    {
        $result = clone $this;
        $result->addressLine4 = $addressLine4;
        return $result;
    }

    public function withPostalCode(?string $postalCode): Address
    {
        $result = clone $this;
        $result->postCode = $postalCode;
        return $result;
    }

    public function withCountryIsoCode(?string $countryIsoCode): Address
    {
        $result = clone $this;
        $result->countryIsoCode = $countryIsoCode;
        return $result;
    }

    public function withTelephone(?string $telephone): Address
    {
        $result = clone $this;
        $result->telephone = $telephone;
        return $result;
    }

    public function withMobileTelephone(?string $mobileTelephone): Address
    {
        $result = clone $this;
        $result->mobileTelephone = $mobileTelephone;
        return $result;
    }

    public function withEmail(?string $email): Address
    {
        $result = clone $this;
        $result->email = $email;
        return $result;
    }

    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    public function getPostalCode(): ?string
    {
        return $this->postCode;
    }

    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function getMobileTelephone(): ?string
    {
        return $this->mobileTelephone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
