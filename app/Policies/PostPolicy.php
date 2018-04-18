<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    public function before(User $user, $ability)
    {
        if (session('statut') == 'admin') {
            return true;
        }
    }
    
    public function change(User $user, $post)
    {
        return $user->id == $post->user_id;
    }
}
