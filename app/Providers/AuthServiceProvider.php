<?php

namespace ChopBox\Providers;

use ChopBox\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'ChopBox\Model' => 'ChopBox\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
        $gate->define('update-chop', function ($user, $chop) {
            return $user->id === $chop->user_id;
        });

        $gate->define('edit-profile', function($user, $id) {
            $userToEdit  = User::find($id);
            return $user->id == $userToEdit->id;
        });


        $gate->define('edit-comment', function($user, $comment) {
            return $user->id = $comment->user->id;
        });

    }
}