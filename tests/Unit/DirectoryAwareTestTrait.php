<?php
namespace SnowIO\BrightpearlDataModel\Test\Unit;

trait DirectoryAwareTestTrait
{
    public function getJson(string $filePath): array
    {
        return json_decode(file_get_contents($filePath), $assoc = true);
    }

    protected function getFromTestFileDirectory($fileName)
    {
        return $this->getJson(dirname(__DIR__) . "/resources/{$fileName}");
    }
}
