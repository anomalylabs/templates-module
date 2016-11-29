<?php

return [
    'name'        => [
        'name'         => 'Name',
        'instructions' => [
            'groups'    => 'Specify a short descriptive name for this template group.',
            'templates' => 'Specify a short descriptive name for this template.',
        ],
    ],
    'slug'        => [
        'name'         => 'Slug',
        'instructions' => 'The slug is used when identifying templates.',
    ],
    'description' => [
        'name'         => 'Description',
        'instructions' => [
            'groups'    => 'Briefly describe this template group.',
            'templates' => 'Briefly describe this template.',
        ],
    ],
    'group'       => [
        'name' => 'Group',
    ],
    'content'     => [
        'name'         => 'Content',
        'instructions' => 'Manage the template content.',
        'warning'      => 'When in debug mode you can modify the storage file directly.',
    ],
    'type'        => [
        'name' => 'Type',
    ],
    'uri'         => [
        'name'         => 'URI',
        'instructions' => 'Specify the URI path/pattern for this route.',
    ],
    'template'    => [
        'name'         => 'Template',
        'instructions' => 'Specify the template to load for this route.',
    ],
];
