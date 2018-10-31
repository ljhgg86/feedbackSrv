<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Models\Fbcontent;
use App\Models\Role;
use App\Models\User;
use App\Policies\FbcontentPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Fbcontent::class => 'App\Policies\FbcontentPolicy',
        Role::class => 'App\Policies\RolePolicy',
        User::class => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        // Passport::tokensExpireIn(now()->addDays(15));
        // Passport::refreshTokensExpireIn(now()->addDays(30));

        //
    }
}
