<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Post;

#[Title("Management post list")]
#[Layout('layouts.app')]
class PostTable extends Component
{
    use WithPagination;
    public $title = 'Post List...';
    public $perPage = 7;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';

    public function setSort($colName) {
        if ($this->sortBy = $colName) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $colName;
        $this->sortDir = 'ASC';
    }

    public function deletePost($id) {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->delete();
    }
    public function render()
    {
        return view('livewire.admin.posts.post-table',[
            'posts' => Post::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage)]);
    }
}
