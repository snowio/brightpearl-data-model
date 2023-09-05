<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

class Description
{
    /** @var string $languageCode */
    private $languageCode;
    /** @var string $text */
    private $text;
    /** @var string $format */
    private $format;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->languageCode = $json['languageCode'];
        $result->text = $json['text'] ?? '';
        $result->format = $json['format'];
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['languageCode'] = $this->languageCode;
        $json['text'] = $this->text ?? '';
        $json['format'] = $this->format;
        return $json;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
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
     * @return string
     */
    public function getText(): string
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
     * @return string
     */
    public function getFormat(): string
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
