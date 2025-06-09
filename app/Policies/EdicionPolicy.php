<?php

namespace App\Policies;

use App\Models\Edicion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EdicionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //si es admin ve las ediciones pero si el docente no tiene ningun grupo no le deja ver nada directamente tiene que tener alguna edicion en la que sus grupos este relacionado con este usuario en mi caso tutor
        return $user->isAdmin() || $user->isTutor();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Edicion $edicion): bool
    {
        return true; //se encarga el before
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin(); //solo el administrador crea una edicion los demas no
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Edicion $edicion): bool
    { //solo puede editar la edicion el administrador
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Edicion $edicion): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Edicion $edicion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Edicion $edicion): bool
    {
        //
    }
}
