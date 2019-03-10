<?php

class StubModel
{
  
}

return [
    
    'orm' => [
        'identity' => __FILE__,
        'dev_configuration' => __DIR__ . '/OrmDevelopment.php',
        'configurationGlobPattern' => 'glob://%s/OrmExtension/*',
        'connectionName' => 'production',
        'connection' => [
            'production' => [
                'dsn' => 'mysql:host=jsonapi.net;dbname=idPorn;port=2200',
                'user' => 'admin',
                'password' => 'adminPassword!',
            ],
        ],
        'schemaFile' => 'DatabaseSchema.xml',
        'runtimeDirectory' => [
            // should be only relative path
            'build' => '../om',
            'autoload' => 'autoload.php',
            'metadata' => 'metadata.php',
        ],
    ],
    'extensions' => [
        'sluggable' => [
            \StubModel::class => [
                'slug' => [
                    'properties' => ['name',],
                    'prefix' => null,
                    'suffix' => null,
                    'separator' => '-',
                ],
            ],
            \StubModel::class => [
                'name' => [
                    'properties' => ['name',],
                    'prefix' => null,
                    'suffix' => null,
                    'separator' => '-',
                ],
            ],
        ],
        'timestampable' => [
            \StubModel::class => [
                'created' => ['on' => ['create']],
                'modified' => ['on' => ['update', 'create']],
            ],
            \StubModel::class => [
                'created' => ['on' => ['create']],
                'modified' => ['on' => ['update', 'create']],
            ],
        ],
        'versionable' => [
            \StubModel::class => [
                'properties' => ['version'],
            ],
            \StubModel::class => [
                'properties' => ['version'],
            ],
        ],
        'dataFilter' => [
            \StubModel::class => [
                'name' => [
                    'filters' => [
                        \Subapp\Orm\Filters\ClearHtmlFilter::class => [[]], // clear all
                    ],
                ],
            ],
        ],
        'resourceLogger' => [],
    ],

];
