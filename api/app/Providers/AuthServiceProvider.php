<?php
declare(strict_types=1);
namespace App\Providers;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function (User $user, $ability) {
            return $user->hasRole(UserType::SUPER_ADMIN->value) ? true : null;
        });

        Gate::define('update-kit', function (User $user) {
            return $user->hasRole(UserType::TRAINEE->value)
                        ? Response::allow()
                        : Response::deny('Only trainees can update kit');
        });
    }
}
