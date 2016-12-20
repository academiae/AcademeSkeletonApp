<?php

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$aggregator = new ConfigAggregator(
    [
        Zend\Expressive\ConfigProvider::class,
        Zend\Component\ConfigProvider::class,
        CodingMatters\ExpressiveErrorHandler\ConfigProvider::class,
        CodingMatters\ExpressiveWebHelper\ConfigProvider::class,
        new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
        new PhpFileProvider('config/development.config.php') // only override if development mode is ENABLED
    ],
    __DIR__ . '/../data/cache/application.config.php'
);

return $aggregator->getMergedConfig();
