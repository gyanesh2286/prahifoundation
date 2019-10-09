<?php

return [

    'demo' => [
        // enable/disable demo mode
        'enabled' => env('DEMO_ENABLED', false),

        // allow routes with the following methods or uris in demo mode
        'whitelist' => [
            'methods' => ['get'],
            'routes' => ['admin/login', 'admin/logout'],
        ],

        // demo user credentials (populates login form in demo mode)
        'user' => [
            'email' => env('DEMO_USER_EMAIL', 'admin@example.com'),
            'password' => env('DEMO_USER_PASSWORD', 'admin123'),
        ],
    ],

    // controllers used by package
    'controllers' => [
        'activity_log' => 'Kjjdion\LaravelAdminPanel\Controllers\ActivityLogController',
        'auth' => [
            'change_password' => 'Kjjdion\LaravelAdminPanel\Controllers\Auth\ChangePasswordController',
            'forgot_password' => 'Kjjdion\LaravelAdminPanel\Controllers\Auth\ForgotPasswordController',
            'login' => 'Kjjdion\LaravelAdminPanel\Controllers\Auth\LoginController',
            'profile' => 'Kjjdion\LaravelAdminPanel\Controllers\Auth\ProfileController',
            'reset_password' => 'Kjjdion\LaravelAdminPanel\Controllers\Auth\ResetPasswordController',
        ],
        'backend' => 'App\Http\Controllers\Admin\BackendController',
        'doc' => 'Kjjdion\LaravelAdminPanel\Controllers\DocController',
        'role' => 'Kjjdion\LaravelAdminPanel\Controllers\RoleController',
        'user' => 'Kjjdion\LaravelAdminPanel\Controllers\UserController',
        'member' => 'Kjjdion\LaravelAdminPanel\Controllers\MemberController',
        'district' => 'Kjjdion\LaravelAdminPanel\Controllers\DistrictController',
        'hospital' => 'Kjjdion\LaravelAdminPanel\Controllers\HospitalController',
    ],

    // models used by package
    'models' => [
        'activity_log' => 'Kjjdion\LaravelAdminPanel\Models\ActivityLog',
        'doc' => 'Kjjdion\LaravelAdminPanel\Models\Doc',
        'permission' => 'Kjjdion\LaravelAdminPanel\Models\Permission',
        'role' => 'Kjjdion\LaravelAdminPanel\Models\Role',
        'role_user' => 'Kjjdion\LaravelAdminPanel\Models\RoleUser',
        'setting' => 'Kjjdion\LaravelAdminPanel\Models\Setting',
        'district' => 'Kjjdion\LaravelAdminPanel\Models\District',
        'districts' => 'Kjjdion\LaravelAdminPanel\Models\Districts',
        'states' => 'Kjjdion\LaravelAdminPanel\Models\States',
    ],

];