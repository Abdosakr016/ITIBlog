<?php

namespace App\Providers;

use App\Models\categories;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        categories::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_admin', function (User $user) {
            return $user->role == "admin";
        });
        Gate::define('is_author', function (User $user) {
            return $user->role == "author";
        });
        Gate::define('is_editor', function (User $user) {
            return $user->role == "editor";
        });
        Gate::define('is_visitor', function (User $user) {
            return $user->role == "visitor";
        });
    }
}
