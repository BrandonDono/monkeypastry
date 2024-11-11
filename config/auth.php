<?php
return [

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'administrador' => [
            'driver' => 'session',
            'provider' => 'administradores',
        ],

        'empleado' => [
            'driver' => 'session',
            'provider' => 'empleados',
        ],

        'clientes' => [
            'driver' => 'session',
            'provider' => 'clientes',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'administradores' => [
            'driver' => 'eloquent',
            'model' => App\Models\Administrador::class,
        ],

        'empleados' => [
            'driver' => 'eloquent',
            'model' => App\Models\Empleados::class,
        ],

        'clientes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Clientes::class,
        ],
    ],
];
