<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class InertiaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();
    }

    public function registerInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => auth()->check() ? auth()->user()->toArray() : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => session('success'),
                    'error' => session('error'),
                ];
            },
            'sidebar' => function () {
                return [
                    ['name' => 'Dashboard', 'href' => url('/dashboard'), 'icon' => 'fas fa-tachometer-alt'],
                    ['name' => 'About', 'href' => url('/about')],
                    [
                        'name' => 'Manager',
                        'children' => [
                            ['name' => 'Users', 'href' => route('users.index'), 'icon'=> 'fa fa-users'],
                        ]
                    ],
                ];
            },
        ]);
    }

    public function boot()
    {
        //
    }
}
