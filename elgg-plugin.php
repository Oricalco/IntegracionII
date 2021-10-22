<?php

return [
        'entities' => [
                [
                        'type' => 'object',
                        'subtype' => 'proyecto',
                        'searchable' => true,
                ],
        ],
        'actions' => [
                'proyecto/save' => [],
        ],
        'routes' => [
                'view:object:blog' => [
                        'path' => '/proyecto/view/{guid}/{title?}',
                        'resource' => 'proyecto/view',
                        'access' => 'public',
                ],
                'add:object:blog' => [
                        'path' => '/proyecto/add/{guid?}',
                        'resource' => 'proyecto/add',
                        'access' => 'public',
                ],
                'all:object:blog' => [
                        'path' => '/proyecto/all/',
                        'resource' => 'proyecto/all',
                        'access' => 'public',
                ],
                'edit:object:blog' => [
                        'path' => '/proyecto/edit/{guid}/{revision?}',
                        'resource' => 'proyecto/edit',
                        'access' => 'public',
                        'requirements' => [
                                'revision' => '\d+',
                        ],
                ],
        ],
];