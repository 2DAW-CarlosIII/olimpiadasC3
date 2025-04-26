<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Edicion;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('inscripcionStore', function (?User $user) { /*si no hay un usuario registrado sera null*/
            $edicion = Edicion::getEdicionActual();
            $tiempoActual = now();
            $esEdicionValida = $edicion->fecha_apertura <= $tiempoActual && $edicion->fecha_cierre >= $tiempoActual;
            return $esEdicionValida || ($user && $user->esAdministrador());
        });
    }
}
