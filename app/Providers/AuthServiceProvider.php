<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Beds;
use App\Models\Collection;
use App\Models\Customerservice;
use App\Models\Design;
use App\Models\Main;
use App\Models\Mattress;
use App\Models\Curbstones;
use App\Models\Pouffes;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Beds::class => PostPolicy::class,
        Collection::class => PostPolicy::class,
        Customerservice::class => PostPolicy::class,
        Main::class => PostPolicy::class,
        Design::class => PostPolicy::class,
        Mattress::class => PostPolicy::class,
        Curbstones::class => PostPolicy::class,
        Pouffes::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);
    }
}
