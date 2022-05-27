<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{
    Permissao,
    User
};

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
    public function boot()
    {
        $this->registerPolicies();

        //
        $permissoes = Permissao::all();
        foreach($permissoes as $permissao){
            Gate::define($permissao->nome, function(User $user) use($permissao){
                return $user->temPermissao($permissao->nome);
            });
        }

        Gate::define('owner', function(User $user, $objeto){
            return $user->id === $objeto->user->id;
        });

        Gate::before(function(User $user){
            if($user->isAdmin()){
                return true;
            }
        });
    }
}
