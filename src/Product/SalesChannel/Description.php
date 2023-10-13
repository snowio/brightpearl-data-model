<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Description implements ModelInterface
{
    /** @var string|null $languageCode */
    private $languageCode;
    /** @var string|null $text */
    private $text;
    /** @var string|null $format */
    private $format;

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
        $result->languageCode = $json['languageCode'] ?? null;
        $result->text = $json['text'] ?? null;
        $result->format = $json['format'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'languageCode' => $this->getLanguageCode(),
            'text' => $this->getText(),
            'format' => $this->getFormat(),
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Description &&
            $this->languageCode === $other->languageCode &&
            $this->text === $other->text &&
            $this->format === $other->format;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function withLanguageCode(string $languageCode): Description
    {
        $clone = clone $this;
        $clone->languageCode = $languageCode;
        return $clone;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function withText(string $text): Description
    {
        $clone = clone $this;
        $clone->text = $text;
        return $clone;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function withFormat(string $format): Description
    {
        $clone = clone $this;
        $clone->format = $format;
        return $clone;
    }
}
