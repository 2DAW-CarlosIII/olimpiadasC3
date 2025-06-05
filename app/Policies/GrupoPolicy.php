<?php

namespace App\Policies;

use App\Models\Grupo;
use App\Models\User;
use App\Models\Edicion;
use Illuminate\Auth\Access\Response;

class GrupoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isTutor();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Grupo $grupo): bool
    {
        return $user->isTutor($grupo) || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Grupo $grupo): bool
    {
        return $user->isTutor($grupo) || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Grupo $grupo): bool
    {
        return $user->isTutor($grupo);
    }

    //para que no le salga los grupos que hay en una edicion que no le corresponde porque no tiene ningun grupo en el que es tutor y ademas no le saldran porque el index solo le va a mostrar los grupos en los que es tutor pero le sale ya la informacion que existe esa edicion(solo el nombre) lo cual cuanto menos datos sepa mejor
    public function soloVerGruposEdicion(User $user, Edicion $edicion) : bool
    {
        return $edicion->grupos()->where('tutor', $user->id)->exists() || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Grupo $grupo): bool
    {
        return $user->isTutor($grupo);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Grupo $grupo): bool
    {
        return $user->isTutor($grupo);
    }

    public function createUsersMoodle(User $user): bool
    {
        return $user->isAdmin();
    }
}
