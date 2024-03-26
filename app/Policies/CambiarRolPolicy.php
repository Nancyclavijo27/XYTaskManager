<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CambiarRolPolicy
{
    use HandlesAuthorization;

    public function cambiar(User $user)
    {
        return $user->role === 'super_admin'; // Solo el super admin puede cambiar roles
    }
}
