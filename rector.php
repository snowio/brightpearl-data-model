<?php

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::CODE_QUALITY,
        SetList::TYPE_DECLARATION
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_73);
    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');
    $rectorConfig->paths([__DIR__ . '/src']);
    $rectorConfig->skip([
        __DIR__ . '/tests/*',
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class
    ]);
};
