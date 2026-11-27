<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // İçerikleri görüntüleme
    public function viewAny(User $user): bool
    {
        return true;
    }

    // İçerik ekleme
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    // İçerik düzenleme
    public function update(User $user, Post $post): bool
    {
        if ($user->role == 'admin') {
            return true;
        }

        return $user->role == 'editor'
            && $user->id == $post->user_id;
    }

    // İçerik silme
    public function delete(User $user, Post $post): bool
    {
        return $user->role == 'admin';
    }
}
