<?php

namespace App\Policies;

use App\Models\Isolation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IsolationPolicy
{

    /* public function viewAny(User $user): bool
    {
        //
    } */


    /* public function view(User $user, Isolation $isolation): bool
    {
        //
    } */


    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Infectologo', 'Supervisor']);
    }


    public function update(User $user, Isolation $isolation): bool
    {
        return $user->hasAnyRole(['Admin', 'Infectologo', 'Supervisor']);
    }


    public function delete(User $user, Isolation $isolation): bool
    {
        return $user->hasAnyRole(['Admin', 'Infectologo', 'Supervisor']);
    }


    /* public function restore(User $user, Isolation $isolation): bool
    {
        //
    } */


    /* public function forceDelete(User $user, Isolation $isolation): bool
    {
        //
    } */
}
