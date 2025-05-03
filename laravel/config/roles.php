<?php

return [
    'roles' => [
        'user' => [
            'permissions' => [
                'view posts',
                'add comments'
            ],
            'role_level' => 1,
        ],

        'writer' => [
            'permissions' => [
                'add posts',
                'edit posts'
            ],
            'role_level' => 2,
        ],

        'admin' => [
            'permissions' => [
                'view users',
                'add users',
                'edit users',
            ],
            'role_level' => 3,
        ],
    ],
];
