<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach (config('permissions.permissions') as $premission) {
            Gate::define($premission, function ($auth) use ($premission) {
                return $auth->hasApilty($premission);
            });
        }

        Gate::define('users2', function ($auth) {
            return $auth->hasApilty('users');
        });
    }
}
