<?php

namespace App\Livewire\Main;

use Livewire\Component;
use App\Models\Post;

class LikeButton extends Component
{
    public Post $post;

    public function toggleLike() {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }
        $user = auth()->user();

        if ($user->hasLiked($this->posts)) {
            $user->likes()->detach($this->post);
            return;
        }

        $user->likes()->attach($this->post);
    }
    public function render()
    {
        return view('livewire.main.like-button');
    }
}