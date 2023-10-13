<?php

namespace SnowIO\BrightpearlDataModel;

class PostalAddress implements ModelInterface
{
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

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->addressLine1 = $json['addressLine1'] ?? null;
        $result->addressLine2 = $json['addressLine2'] ?? null;
        $result->addressLine3 = $json['addressLine3'] ?? null;
        $result->addressLine4 = $json['addressLine4'] ?? null;
        $result->postalCode = $json['postalCode'] ?? null;
        $result->countryIsoCode = $json['countryIsoCode'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'addressLine1' => $this->addressLine1,
            'addressLine2' => $this->addressLine2,
            'addressLine3' => $this->addressLine3,
            'addressLine4' => $this->addressLine4,
            'postalCode' => $this->postalCode,
            'countryIsoCode' => $this->countryIsoCode
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof PostalAddress &&
            $this->addressLine1 === $other->addressLine1 &&
            $this->addressLine2 === $other->addressLine2 &&
            $this->addressLine3 === $other->addressLine3 &&
            $this->addressLine4 === $other->addressLine4 &&
            $this->postalCode === $other->postalCode &&
            $this->countryIsoCode === $other->countryIsoCode;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function withAddressLine1(?string $addressLine1): PostalAddress
    {
        $clone = clone $this;
        $clone->addressLine1 = $addressLine1;
        return $clone;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function withAddressLine2(?string $addressLine2): PostalAddress
    {
        $clone = clone $this;
        $clone->addressLine2 = $addressLine2;
        return $clone;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function withAddressLine3(?string $addressLine3): PostalAddress
    {
        $clone = clone $this;
        $clone->addressLine3 = $addressLine3;
        return $clone;
    }

    public function getAddressLine4(): ?string
    {
        return $this->addressLine4;
    }

    public function withAddressLine4(?string $addressLine4): PostalAddress
    {
        $clone = clone $this;
        $clone->addressLine4 = $addressLine4;
        return $clone;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function withPostalCode(?string $postalCode): PostalAddress
    {
        $clone = clone $this;
        $clone->postalCode = $postalCode;
        return $clone;
    }

    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }

    public function withCountryIsoCode(?string $countryIsoCode): PostalAddress
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
        return $clone;
    }
}
