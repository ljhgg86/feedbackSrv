<?php

namespace App\Providers;

<<<<<<< HEAD
use Laravel\Passport\Passport;
use App\Models\Fbcontent;
use App\Models\Role;
use App\Models\User;
use App\Policies\FbcontentPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
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
<<<<<<< HEAD
        Fbcontent::class => 'App\Policies\FbcontentPolicy',
        Role::class => 'App\Policies\RolePolicy',
        User::class => 'App\Policies\UserPolicy',
=======
        'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
<<<<<<< HEAD
        Passport::routes();
        // Passport::tokensExpireIn(now()->addDays(15));
        // Passport::refreshTokensExpireIn(now()->addDays(30));
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b

        //
    }
}
