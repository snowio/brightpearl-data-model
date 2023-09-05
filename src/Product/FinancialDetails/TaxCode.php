<?php

namespace SnowIO\BrightpearlDataModel\Product\FinancialDetails;

class TaxCode
{
    /** @var int $id */
    private $id;
    /** @var string $code */
    private $code;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->id = $json['id'];
        $result->code = $json['code'];

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['id'] = $this->id;
        $json['code'] = $this->code;

        return $json;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TaxCode
     */
    public function withId(int $id): TaxCode
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return TaxCode
     */
    public function withCode(string $code): TaxCode
    {
        $clone = clone $this;
        $clone->code = $code;
        return $clone;
    }
}
