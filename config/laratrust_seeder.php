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
        'administrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'records' => 'c,r,u,d',
            'report' => 'c,r,u,d',
            'profile' => 'r,u,d',
            'orders' => 'r,u,d',
        ],
        'customer' => [
            'product-menu' => 'r,u',
            'cart' => 'c,r,u,d'
        ],
    ],
    'permission_structure' => [
        'administrator' => [
            'product-menu' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
