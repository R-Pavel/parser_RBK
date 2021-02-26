<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use WebDevEtc\BlogEtc\Gates;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define(Gates\GateTypes::MANAGE_BLOG_ADMIN, static function (?Model $user) {
            // Implement your logic here, for example:
            return $user && $user->email === 'your-admin-user@your-site.com';
            // Or something like `$user->is_admin === true`
        });
        //
    }
}
