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

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Supplier &&
            $this->contactId === $other->contactId &&
            $this->addressFullName === $other->addressFullName &&
            $this->companyName === $other->companyName &&
            $this->addressLine1 === $other->addressLine1 &&
            $this->addressLine2 === $other->addressLine2 &&
            $this->addressLine3 === $other->addressLine3 &&
            $this->addressLine4 === $other->addressLine4 &&
            $this->postalCode === $other->postalCode &&
            $this->country === $other->country &&
            $this->telephone === $other->telephone &&
            $this->mobileTelephone === $other->mobileTelephone &&
            $this->fax === $other->fax &&
            $this->email === $other->email &&
            $this->countryId === $other->countryId &&
            $this->countryIsoCode === $other->countryIsoCode &&
            $this->countryIsoCode3 === $other->countryIsoCode3;
    }

    public function withContactId(string $contactId): ModelInterface
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    public function withCountryIsoCode3(string $countryIsoCode3): ModelInterface
    {
        $clone = clone $this;
        $clone->countryIsoCode3 = $countryIsoCode3;
        return $clone;
    }

    public function getCountryIsoCode3(): ?string
    {
        return $this->countryIsoCode3;
    }

    public function withCountry(string $country):ModelInterface
    {
        $clone = clone $this;
        $clone->country = $country;
        return $clone;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getAddressFullName(): ?string
    {
        return $this->addressFullName;
    }

    public function withAddressFullName(string $addressFullName): ModelInterface
    {
        $clone = clone $this;
        $clone->addressFullName = $addressFullName;
        return $clone;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function withCompanyName(string $companyName): ModelInterface
    {
        $clone = clone $this;
        $clone->companyName = $companyName;
        return $clone;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function withAddressLine1(string $addressLine1): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine1 = $addressLine1;
        return $clone;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function withAddressLine2(string $addressLine2): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine2 = $addressLine2;
        return $clone;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function withAddressLine3(string $addressLine3): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine3 = $addressLine3;
        return $clone;
    }

    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    public function withAddressLine4(string $addressLine4): ModelInterface
    {
        $clone = clone $this;
        $clone->addressLine4 = $addressLine4;
        return $clone;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function withPostalCode(string $postalCode): ModelInterface
    {
        $clone = clone $this;
        $clone->postalCode = $postalCode;
        return $clone;
    }

    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    public function withCountryId(string $countryId): ModelInterface
    {
        $clone = clone $this;
        $clone->countryId = $countryId;
        return $clone;
    }

    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    public function withCountryIsoCode(string $countryIsoCode): ModelInterface
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
        return $clone;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function withTelephone(string $telephone): ModelInterface
    {
        $clone = clone $this;
        $clone->telephone = $telephone;
        return $clone;
    }

    public function getMobileTelephone(): ?string
    {
        return $this->mobileTelephone;
    }

    public function withMobileTelephone(string $mobileTelephone): ModelInterface
    {
        $clone = clone $this;
        $clone->mobileTelephone = $mobileTelephone;
        return $clone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function withEmail(string $email): ModelInterface
    {
        $clone = clone $this;
        $clone->email = $email;
        return $clone;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function withFax(string $fax): ModelInterface
    {
        $clone = clone $this;
        $clone->fax = $fax;
        return $clone;
    }
}
