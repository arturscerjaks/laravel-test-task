<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Attribute;
use App\Models\User;

class AttributePolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Attribute $attribute): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Attribute $attribute): bool
    {
        return true;
    }
}
