<?php

return [
    'sidebar' => [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => 'admin.index',
            'active_pattern' => 'admin.index',
            'roles' => ['Administrador', 'Contador'],
        ],
        [
            'name' => 'Citas',
            'icon' => 'fa-solid fa-calendar-days',
            'route' => 'admin.appointments.index',
            'active_pattern' => 'admin.appointments.*',
            'roles' => ['Administrador', 'Contador'],
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => 'admin.users.index',
            'active_pattern' => 'admin.users.*',
            'roles' => ['Administrador'],
        ],
        [
            'name' => 'Clientes',
            'icon' => 'fa-solid fa-user-group',
            'route' => 'admin.clients.index',
            'active_pattern' => 'admin.clients.*',
            'roles' => ['Administrador', 'Contador'],
        ],
        [
            'name' => 'Empleados',
            'icon' => 'fa-solid fa-user-tie',
            'route' => 'admin.employees.index',
            'active_pattern' => 'admin.employees.*',
            'roles' => ['Administrador'],
        ],
        [
            'name' => 'Servicios',
            'icon' => 'fa-solid fa-briefcase',
            'route' => 'admin.services.index',
            'active_pattern' => 'admin.services.*',
            'roles' => ['Administrador'],
        ],
        [
            'name' => 'Calendario',
            'icon' => 'fa-solid fa-calendar-days',
            'route' => 'admin.index', 
            'active_pattern' => 'admin.calendar.*',
            'roles' => ['Contador'],
        ],
    ]
];
