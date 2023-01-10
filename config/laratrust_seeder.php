<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'lapangan' => 'c,r,u,d',
            'saldo' => 'c,r,u,d',
            'profile' => 'c,r,u,d'
        ],
        'pengelola' => [
            'lapangan' => 'c,r,u,d',
            'saldo' => 'c,r',
            'profile' => 'r,u'
        ],
        'member' => [
            'profile' => 'r,u',
            'lapangan' => 'r,u',
            'saldo' => 'c,r,u'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
