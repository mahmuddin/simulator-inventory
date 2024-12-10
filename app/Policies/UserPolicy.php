<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    public function delete(User $user)
    {
        return $user->email === 'mahmuddinnf@gmail.com';
    }
}
