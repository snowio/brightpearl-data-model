<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;

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

    /**
     * @return ModelInterface
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->addressLine1 = is_string($json['addressLine1']) ? $json['addressLine1'] : null;
        $result->addressLine2 = is_string($json['addressLine2']) ? $json['addressLine2'] : null;
        $result->addressLine3 = is_string($json['addressLine3']) ? $json['addressLine3'] : null;
        $result->addressLine4 = is_string($json['addressLine4']) ? $json['addressLine4'] : null;
        $result->postalCode = is_string($json['postalCode']) ? $json['postalCode'] : null;
        $result->countryIsoCode = is_string($json['countryIsoCode']) ? $json['countryIsoCode'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @param PostalAddress $postalAddressToCompare
     * @return bool
     */
    public function equals(ModelInterface $postalAddressToCompare): bool
    {
        if ($this->getAddressLine1() !== $postalAddressToCompare->getAddressLine1()) {
            return false;
        }

        if ($this->getAddressLine2() !== $postalAddressToCompare->getAddressLine2()) {
            return false;
        }

        if ($this->getAddressLine3() !== $postalAddressToCompare->getAddressLine3()) {
            return false;
        }

        if ($this->getAddressLine4() !== $postalAddressToCompare->getAddressLine4()) {
            return false;
        }

        if ($this->getPostalCode() !== $postalAddressToCompare->getPostalCode()) {
            return false;
        }

        return $this->getCountryIsoCode() === $postalAddressToCompare->getCountryIsoCode();
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
     * @return PostalAddress
     */
    public function withAddressLine1(?string $addressLine1): PostalAddress
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
     * @return PostalAddress
     */
    public function withAddressLine2(?string $addressLine2): PostalAddress
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
     * @return PostalAddress
     */
    public function withAddressLine3(?string $addressLine3): PostalAddress
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
     * @return PostalAddress
     */
    public function withAddressLine4(?string $addressLine4): PostalAddress
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
     * @return PostalAddress
     */
    public function withPostalCode(?string $postalCode): PostalAddress
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
     * @return PostalAddress
     */
    public function withCountryIsoCode(?string $countryIsoCode): PostalAddress
    {
        $clone = clone $this;
        $clone->countryIsoCode = $countryIsoCode;
        return $clone;
    }
}
