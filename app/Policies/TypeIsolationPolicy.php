<?php

namespace App\Policies;

use App\Models\User;

class TypeIsolationPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Infectologo']);
    }


    /* public function view(User $user, TypeIsolation $typeIsolation): bool
    {
        //
    } */


    /* public function create(User $user): bool
    {
        //
    } */


    /* public function update(User $user, TypeIsolation $typeIsolation): bool
    {
        //
    } */


    /* public function delete(User $user, TypeIsolation $typeIsolation): bool
    {
        //
    } */


    /* public function restore(User $user, TypeIsolation $typeIsolation): bool
    {
        //
    } */


    /* public function forceDelete(User $user, TypeIsolation $typeIsolation): bool
    {
        //
    } */
}
