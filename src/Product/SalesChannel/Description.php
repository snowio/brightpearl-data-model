<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

class Description
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

        $result->languageCode = is_string($json['languageCode']) ? $json['languageCode'] : null;
        $result->text = is_string($json['text']) ? $json['text'] : null;
        $result->format = is_string($json['format']) ? $json['format'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'languageCode' => $this->getLanguageCode(),
            'text' => $this->getText(),
            'format' => $this->getFormat(),
        ];
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     * @return Description
     */
    public function withLanguageCode(string $languageCode): Description
    {
        $clone = clone $this;
        $clone->languageCode = $languageCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Description
     */
    public function withText(string $text): Description
    {
        $clone = clone $this;
        $clone->text = $text;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Description
     */
    public function withFormat(string $format): Description
    {
        $clone = clone $this;
        $clone->format = $format;
        return $clone;
    }
}
