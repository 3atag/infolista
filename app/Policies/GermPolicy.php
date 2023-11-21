<?php

namespace App\Policies;

use App\Models\Germ;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GermPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Infectologo']);
    }


    /*     public function view(User $user, Germ $germ): bool
    {
        //
    } */


    /*     public function create(User $user): bool
    {
        //
    } */


    /*     public function update(User $user, Germ $germ): bool
    {
        //
    } */


    /*     public function delete(User $user, Germ $germ): bool
    {
        //
    } */


    /*     public function restore(User $user, Germ $germ): bool
    {
        //
    } */


    /*     public function forceDelete(User $user, Germ $germ): bool
    {
        //
    } */
}
