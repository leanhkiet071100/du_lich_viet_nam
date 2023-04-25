<?php

namespace App\Policies;

use App\Models\User;
use App\Models\nguoi_dung;
use Illuminate\Auth\Access\Response;

class NguoiDungPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, nguoi_dung $nguoiDung): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, nguoi_dung $nguoiDung): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, nguoi_dung $nguoiDung): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, nguoi_dung $nguoiDung): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, nguoi_dung $nguoiDung): bool
    {
        //
    }
}
